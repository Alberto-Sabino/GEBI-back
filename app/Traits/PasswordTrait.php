<?php

namespace App\Traits;

trait PasswordTrait
{
    public function generateRandomPassword(): string
    {
        $password = '';
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $digits = '0123456789';
        $all = $upper . $lower . $digits;

        // Ensure at least one of each required character
        $password .= $upper[random_int(0, strlen($upper) - 1)];
        $password .= $lower[random_int(0, strlen($lower) - 1)];
        $password .= $digits[random_int(0, strlen($digits) - 1)];

        // Fill the rest with random characters
        for ($i = 3; $i < 8; $i++) {
            $password .= $all[random_int(0, strlen($all) - 1)];
        }

        // Shuffle to randomize character positions
        return str_shuffle($password);
    }

    public function validate(string $password): bool
    {
        return preg_match('/[A-Z]/', $password) &&
            preg_match('/[a-z]/', $password) &&
            preg_match('/[0-9]/', $password);
    }
}
