<?php

namespace App\Application\User\UseCases;

use App\Domain\User\Repositories\UserRepositoryInterface;

class DeleteUserUseCase
{
    protected UserRepositoryInterface $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function deleteUser(mixed $id): bool
    {
        return $this->userRepo->deleteUser($id);
    }
}
