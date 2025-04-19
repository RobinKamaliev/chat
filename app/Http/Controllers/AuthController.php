<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Resources\User\CreateUserResource;
use App\Http\Resources\User\LoginUserResource;
use App\User\Exceptions\IncorrectLoginOrPasswordException;
use App\User\Exceptions\UserNotFoundException;
use App\User\Services\Auth\CreateUserService;
use App\User\Services\Auth\LoginUserService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class AuthController extends Controller
{
    public function register(StoreUserRequest $storeUserRequest, CreateUserService $createUserService): JsonResponse
    {
        return response()->json(
            CreateUserResource::make(
                $createUserService->run(
                    $storeUserRequest->toDto()
                )
            ), Response::HTTP_CREATED
        );
    }

    /**
     * @throws IncorrectLoginOrPasswordException
     * @throws UserNotFoundException
     */
    public function login(LoginUserRequest $loginUserRequest, LoginUserService $loginUserService): JsonResponse
    {
        return response()->json(
            LoginUserResource::make(
                $loginUserService->run(
                    $loginUserRequest->toDto()
                )
            )
        );
    }
}