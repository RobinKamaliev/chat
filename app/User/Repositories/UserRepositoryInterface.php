<?php

declare(strict_types=1);

namespace App\User\Repositories;

use App\User\Dto\CreateUserDto;
use App\User\Dto\GetUserDto;
use App\User\Dto\LoginUserDto;
use App\User\Exceptions\UserNotFoundException;
use App\User\Models\User;
use Illuminate\Support\Collection;

interface UserRepositoryInterface
{
    public function create(CreateUserDto $createUserDto): User;

    /**
     * @throws UserNotFoundException
     */
    public function login(LoginUserDto $loginUserDto): User;

    public function getUsers(GetUserDto $getUserDto): Collection;
}