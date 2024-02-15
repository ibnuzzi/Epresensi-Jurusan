<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Services\Auth\RegisterService;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\Auth\RegisterRequest;
use App\Contracts\Interfaces\StudentInterface;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Contracts\Interfaces\ClassroomInterface;

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
    private UserInterface $user;
    private ClassroomInterface $classroom;
    private StudentInterface $student;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterService $service, UserInterface $user, ClassroomInterface $classroom, StudentInterface $student)
    {
        $this->service = $service;
        $this->user = $user;
        $this->classroom = $classroom;
        $this->student = $student;
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return View
     */
    public function showRegistrationForm(): View
    {
        $classrooms = $this->classroom->get();

        return view('auth.register', compact('classrooms'));
    }

    /**
     * Handle school registration form
     *
     * @param RegisterRequest $request
     */

    public function register(RegisterRequest $request)
    {
        $this->service->handleRegistration($request, $this->user, $this->student);

        return view('auth.login')->with('success', trans('Berhasil Register Silahkan Login'));
    }
}
