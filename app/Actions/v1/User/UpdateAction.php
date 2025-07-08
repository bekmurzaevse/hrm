<?php

namespace App\Actions\v1\User;

use App\Dto\v1\User\UpdateDto;
use App\Exceptions\ApiResponseException;
use App\Http\Resources\v1\User\UserResource;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class UpdateAction
{
    use ResponseTrait;

    public function __invoke(int $id, UpdateDto $dto): JsonResponse
    {
        try {
            $user = User::findOrFail($id);
            $user->update([
                'first_name' => $dto->firstName,
                'last_name' => $dto->lastName,
                'email' => $dto->email,
                'phone' => $dto->phone,
                'password' => $dto->password,
            ]);

            return static::toResponse(
                message: 'User Updated',
                data: new UserResource($user)
            );
        } catch (ModelNotFoundException $ex) {
            throw new ApiResponseException('User Not Found', 404);
        }
    }
}
