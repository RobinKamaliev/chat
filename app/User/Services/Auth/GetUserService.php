<?php

declare(strict_types=1);

namespace App\User\Services\Auth;

use App\User\Dto\GetUserDto;
use App\User\Repositories\UserRepositoryInterface;
use Illuminate\Support\Collection;

final readonly class GetUserService
{
    private const PAGINATE_USERS = 20;

    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function run(): Collection
    {
        return $this->userRepository->getUsers(
            $this->buildGetUserDto()
        );
    }

    private function buildGetUserDto(): GetUserDto
    {
        return (new GetUserDto())
            ->setPaginate(self::PAGINATE_USERS);
    }
}