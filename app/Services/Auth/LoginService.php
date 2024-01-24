<?php

namespace App\Services\Auth;

use App\Http\Requests\Auth\LoginRequest;

class LoginService
{
    /**
     * handleLogin
     *
     * @param  mixed $request
     * @return voidl
     */
    public function handleLogin(LoginRequest $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->roles->pluck('name')[0] == 'admin') {
                return to_route('home');
            } else {
                return to_route('welcome');
            }
        } else {
            return redirect()->back()->withErrors(trans('auth.login_failed'))->withInput();
        }
    }
}
