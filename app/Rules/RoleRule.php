<?php

namespace App\Rules;

use Closure;
use App\Enums\RoleEnum;
use App\Rules\RoleRule;
use Illuminate\Contracts\Validation\Rule;

class RoleRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return in_array($value, [
            RoleEnum::ADMIN->value,RoleEnum::STUDENT->value
        ]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Role tidak valid';
    }
}
