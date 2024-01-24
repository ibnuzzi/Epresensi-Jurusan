<?php

namespace App\Services\Auth;

use App\Enums\RoleEnum;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterService
{

    /**
     * handleRegistration
     *
     * @param  RegisterRequest $request
     * @param  UserInterface $user
     * @return void
     */
    public function handleRegistration(RegisterRequest $request, UserInterface $user)
    {
        $data = $request->validated();
        $password = bcrypt($data['password']);

        $student = $user->store([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $password,
        ]);
        
        $student->assignRole(RoleEnum::STUDENT);
    }
}
