<?php

namespace App\Application\User\UseCases;

use App\Domain\User\Entities\UserEntity;
use App\Domain\User\Repositories\UserRepositoryInterface;

class CreateUserUseCase
{
    protected UserRepositoryInterface $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function createUser(array $data): UserEntity
    {
        return $this->userRepo->create($data);
    }
}
