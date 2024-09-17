<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class Service
{
    public function processLogin($data, $request)
    {
        if (!Auth::attempt($data, $request->boolean('remember')))
        {
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);

        }

        $request->session()->regenerate();
    }

    public function sendPasswordResetLink($data)
    {
        $status = Password::sendResetLink($data);

        if ($status === Password::RESET_LINK_SENT)
        {
            return back()->with('status', __($status));
        }

        return back()->withInput($data->only('email'))
            ->withErrors(['email' => __($status)]);
    }

    public function resetPassword($data)
    {
        $status = Password::reset(
            $data->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($data) {
                $user->forceFill([
                    'password' => Hash::make($data->password),
                    'remember_token' => Str::random(60)
                ])->save();
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        }

        return back()->withInput($data->only('email'))
            ->withErrors(['email' => __($status)]);
    }

}
