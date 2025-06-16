<?php

namespace App\Infrastructure\Persistence\Repositories;

use App\Domain\User\Entities\UserEntity;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Models\User;

class UserRepository implements UserRepositoryInterface
{

    public function create(array $data): UserEntity
    {
        $user = User::create($data);

        return new UserEntity(
            id: $user->id,
            name: $user->name,
            email: $user->email
        );
    }

    public function findUserById(mixed $id): UserEntity
    {
        $user = User::find($id);

        return new UserEntity(
            id: $user->id,
            name: $user->name,
            email: $user->email
        );
    }

    public function updateUser(mixed $id, array $data): bool
    {
        $user = User::find($id);

        if (!$user) return false;

        return $user->update($data);
    }

    public function deleteUser(mixed $id): bool
    {
        $user = User::find($id);

        if (!$user) return false;

        return $user->delete();
    }
}
