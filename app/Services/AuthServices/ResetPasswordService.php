<?php

namespace App\Services\AuthServices;

use App\Services\Email\SendEmailService;
use App\Services\UserServices\GetUserByIdService;
use App\Services\UserServices\UpdateUserService;
use App\Traits\PasswordTrait;
use App\Exceptions\TreatedException;
use App\Models\User;

class ResetPasswordService
{
    use PasswordTrait;

    public function __construct(
        protected GetUserByIdService $getUserByIdService,
        protected UpdateUserService $updateUserService,
        protected SendEmailService $sendEmailService
    ) {}

    public function resetPassword(int $userId): bool
    {
        $user = $this->getUserById($userId);

        $newPassword = $this->generateNewPassword();
        $updated = $this->updatePassword($userId, $newPassword);

        if ($updated) {
            $this->notifyUser($user->email, $user->fullName, $newPassword);
        }

        return $updated;
    }

    /**
     * Obtém o usuário pelo ID
     */
    private function getUserById(int $userId): User
    {
        return $this->getUserByIdService->getById($userId);
    }

    private function generateNewPassword(): string
    {
        return $this->generateRandomPassword();
    }

    private function updatePassword(int $userId, string $newPassword): bool
    {
        return $this->updateUserService->update($userId, [
            'password' => $newPassword
        ]);
    }

    private function notifyUser(string $email, string $name, string $password): void
    {
        $this->sendEmailService->send(
            to: $email,
            subject: 'GEBI - Recuperação de senha',
            template: 'email.auth.password-reset',
            data: [
                'name' => $name,
                'password' => $password
            ]
        );
    }
}
