<?php

namespace App\Application\User\UseCases;

use App\Domain\User\Entities\UserEntity;
use App\Domain\User\Repositories\UserRepositoryInterface;

class GetUserByIdUseCase
{
    protected UserRepositoryInterface $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getUserById(mixed $id): UserEntity
    {
        return $this->userRepo->findUserById($id);
    }
}
