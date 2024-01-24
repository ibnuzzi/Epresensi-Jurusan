<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Services\Auth\RegisterService;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    private RegisterService $service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterService $service, UserInterface $user)
    {
        $this->service = $service;
        $this->user = $user;
        $this->middleware('guest');
    }

    /**
     * Handle school registration form
     *
     * @param RegisterRequest $request
     */

    public function register(RegisterRequest $request)
    {
        $this->service->handleRegistration($request, $this->user);

        return redirect()->back()->with('success', trans('auth.register_success'));
    }
}
