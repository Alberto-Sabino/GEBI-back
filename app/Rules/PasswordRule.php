<?php

namespace App\Rules;

use App\Traits\PasswordTrait;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordRule implements ValidationRule
{
    use PasswordTrait;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value,  Closure $fail): void
    {
        if (! $this->isPasswordValid($value)) {
            $fail("A senha deve conter, no mínimo: 8 caracteres, uma letra minúscula, uma letra maiúscula e um número");
        }
    }
}
