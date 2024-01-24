<?php

namespace App\Http\Controllers\Auth;

use App\Services\Auth\LoginService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    private LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    /**
     * Handle user login.
     *
     * This function is responsible for handling user login requests.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request The incoming login request.
     */
    public function login(LoginRequest $request)
    {
        return $this->loginService->handleLogin($request);
    }

    /**
     * Handle user logout.
     *
     * This function is responsible for handling user logout requests. It deletes the current user's access token,
     * effectively logging the user out of the system.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
