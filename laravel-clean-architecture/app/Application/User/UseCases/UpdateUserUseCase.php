<?php

namespace App\Application\User\UseCases;

use App\Domain\User\Repositories\UserRepositoryInterface;

class UpdateUserUseCase
{
    protected UserRepositoryInterface $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function updateUser(mixed $id, array $data): bool
    {
        return $this->userRepo->updateUser($id, $data);
    }
}
