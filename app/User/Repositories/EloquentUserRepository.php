<?php

declare(strict_types=1);

namespace App\User\Repositories;

use App\User\Dto\GetUserDto;
use App\User\Dto\LoginUserDto;
use App\User\Exceptions\UserNotFoundException;
use App\User\Models\User;
use App\User\Dto\CreateUserDto;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

final class EloquentUserRepository implements UserRepositoryInterface
{
    public function create(CreateUserDto $createUserDto): User
    {
        return User::query()->create([
            'first_name' => $createUserDto->getFirstName(),
            'last_name' => $createUserDto->getLastName(),
            'email' => $createUserDto->getEmail(),
            'password' => Hash::make($createUserDto->getPassword()),
        ]);
    }

    /**
     * @throws UserNotFoundException
     */
    public function login(LoginUserDto $loginUserDto): User
    {
        $user = User::query()
            ->where(
                'email',
                $loginUserDto->getEmail()
            )
            ->first();

        if (!$user) {
            throw new UserNotFoundException();
        }

        return $user;
    }

    public function getUsers(GetUserDto $getUserDto): Collection
    {
        return User::query()
            ->paginate($getUserDto->getPaginate())
            ->getCollection();
    }
}
