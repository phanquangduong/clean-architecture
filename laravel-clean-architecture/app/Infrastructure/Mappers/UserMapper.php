<?php

namespace App\Infrastructure\Mappers;

use App\Domain\User\Entities\UserEntity;
use App\Infrastructure\Persistence\Models\User;

class UserMapper
{
    public static function toEntity(User $model): UserEntity
    {
        return new UserEntity(
            id: $model->id,
            name: $model->name,
            email: $model->email
        );
    }
}
