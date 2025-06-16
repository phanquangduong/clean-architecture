<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\UserEntity;
use App\Infrastructure\Persistence\Models\User;

interface UserRepositoryInterface

{
    public function create(array $data): UserEntity;

    public function findUserById(mixed $id): UserEntity;

    public function updateUser(mixed $id, array $data): bool;

    public function deleteUser(mixed $id): bool;
}
