<?php

namespace App\Services\AuthServices;

use App\Exceptions\TreatedException;
use App\Models\User;
use App\Services\Email\SendEmailService;
use App\Services\UserServices\GetUserByIdService;
use App\Services\UserServices\UpdateUserService;

class UpdatePasswordService
{
    public function __construct(
        protected GetUserByIdService $getUserByIdService,
        protected UpdateUserService $updateUserService,
        protected SendEmailService $sendEmailService
    ) {}

    public function updatePassword(int $userId, array $data): bool
    {
        $user = $this->getUserById($userId);

        $this->validateOldPassword($user->password, $data['oldPassword']);
        $updated = $this->updateUserPassword($userId, $data['newPassword']);

        if ($updated) {
            $this->notifyUser($user->email, $user->fullName);
        }

        return $updated;
    }

    private function getUserById(int $userId): User
    {
        return $this->getUserByIdService->getById($userId);
    }

    private function validateOldPassword(string $currentPassword, string $oldPassword): void
    {
        if ($currentPassword !== $this->hashPassword($oldPassword)) {
            throw new TreatedException(
                'Não foi possível atualizar a senha. Verifique as credenciais e tente novamente',
                400
            );
        }
    }

    private function updateUserPassword(int $userId, string $newPassword): bool
    {
        return $this->updateUserService->update($userId, [
            'password' => $newPassword
        ]);
    }

    private function notifyUser(string $email, string $name): void
    {
        $this->sendEmailService->send(
            to: $email,
            subject: 'GEBI - Sua senha foi alterada!',
            template: 'email.auth.password-changed',
            data: ['name' => $name]
        );
    }

    private function hashPassword(string $password): string
    {
        return md5($password);
    }
}
