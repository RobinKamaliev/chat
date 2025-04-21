<?php

declare(strict_types=1);

namespace App\Modules\User\Services\Auth;

use App\Modules\User\Dto\CreateUserDto;
use App\Modules\User\Models\User;
use App\Modules\User\Repositories\UserRepositoryInterface;

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
