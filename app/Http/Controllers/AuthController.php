<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RegistrationConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as PasswordRules;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showAdminLogin()
    {
        if (auth()->check() && auth()->user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $portal = $request->input('portal', 'user');

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors(['email' => 'These credentials do not match our records.']);
        }

        $request->session()->regenerate();
        $user = Auth::user();

        if ($portal === 'admin' || $user->isAdmin()) {
            if (! $user->isAdmin()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()
                    ->withInput($request->only('email', 'remember'))
                    ->withErrors(['email' => 'You do not have administrator access.']);
            }

            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->route('appointment.index')
            ->with('success', 'Welcome back, '.$user->name.'!');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', PasswordRules::defaults()],
        ]);

        $plainPassword = $validated['password'];

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $plainPassword,
            'role' => 'user',
        ]);

        try {
            Mail::to($user->email)->send(new RegistrationConfirmation($user, $plainPassword));
        } catch (\Throwable $exception) {
            // If mail fails, continue without breaking the registration flow.
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('appointment.index')
            ->with('success', 'Account created! A welcome email has been sent to your inbox.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('appointment.index');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => ['required', 'email']]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __($status));
        }

        return back()->withErrors(['email' => __($status)]);
    }
}
