<?php

declare(strict_types=1);

namespace App\User\Services\Auth;

use App\User\Dto\CreateUserDto;
use App\User\Models\User;
use App\User\Repositories\UserRepositoryInterface;

final readonly class CreateUserService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function run(CreateUserDto $createUserDto): User
    {
        return $this->userRepository->create($createUserDto);
    }
}