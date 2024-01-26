<?php

namespace App\Services\Auth;

use App\Enums\RoleEnum;
use App\Mail\RegistrationMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\Auth\RegisterRequest;
use App\Contracts\Interfaces\StudentInterface;

class RegisterService
{

    /**
     * handleRegistration
     *
     * @param  RegisterRequest $request
     * @param  UserInterface $user
     * @return void
     */
    public function handleRegistration(RegisterRequest $request, UserInterface $user, StudentInterface $student)
    {

        $data = $request->validated();

        $users = $user->store($data);
        event(new Registered($users));

        $users->assignRole(RoleEnum::STUDENT);

        // Mail::to($request->email)->send(new RegistrationMail(['email'=> $request->email, 'name' => $request->name, 'id' => $request->id]));
        $student->store([
            'user_id' => $users->id,
            'classroom_id' => $data['classroom_id'],
        ]);

    }
}
