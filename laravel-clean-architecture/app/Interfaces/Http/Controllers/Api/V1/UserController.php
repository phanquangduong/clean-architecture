<?php

namespace App\Interfaces\Http\Controllers\Api\V1;

use App\Application\User\UseCases\CreateUserUseCase;
use App\Application\User\UseCases\DeleteUserUseCase;
use App\Application\User\UseCases\GetUserByIdUseCase;
use App\Application\User\UseCases\UpdateUserUseCase;
use App\Interfaces\Http\Requests\User\CreateUserRequest;
use App\Interfaces\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\Response;

class UserController
{


    protected CreateUserUseCase $createUserUC;
    protected GetUserByIdUseCase $getUserByIdUC;
    protected UpdateUserUseCase $updateUserUC;
    protected DeleteUserUseCase $deleteUserUC;

    public function __construct(
        CreateUserUseCase $createUserUC,
        GetUserByIdUseCase $getUserByIdUC,
        UpdateUserUseCase $updateUserUC,
        DeleteUserUseCase $deleteUserUC
    ) {
        $this->createUserUC = $createUserUC;
        $this->getUserByIdUC = $getUserByIdUC;
        $this->updateUserUC = $updateUserUC;
        $this->deleteUserUC = $deleteUserUC;
    }

    public function createUser(CreateUserRequest $request)
    {
        $user = $this->createUserUC->createUser($request->validated());

        return response()->json(
            [
                'success' => true,
                'data' => $user,
            ],
            Response::HTTP_CREATED
        );
    }

    public function getUserById(string $id)
    {
        $user = $this->getUserByIdUC->getUserById($id);

        return response()->json(
            [
                'success' => true,
                'data' => $user
            ],
            Response::HTTP_OK
        );
    }

    public function updateUser(UpdateUserRequest $request, string $id)
    {
        $updated = $this->updateUserUC->updateUser($id, $request->validated());

        if (!$updated) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Update failed'
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'Update successfully',
            ],
            Response::HTTP_OK
        );
    }

    public function deleteUser(string $id)
    {
        $deleted = $this->deleteUserUC->deleteUser($id);

        if (!$deleted) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Delete failed'
                ],
                Response::HTTP_INTERNAL_SERVER_ERROR
            );
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'Delete successfully'
            ],
            Response::HTTP_OK
        );
    }
}
