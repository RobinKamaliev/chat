<?php

declare(strict_types=1);

namespace App\User\Services\Auth;

use App\User\Dto\LoginUserDto;
use App\User\Exceptions\IncorrectLoginOrPasswordException;
use App\User\Exceptions\UserNotFoundException;
use App\User\Models\User;
use App\User\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

final readonly class LoginUserService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @throws IncorrectLoginOrPasswordException|UserNotFoundException
     */
    public function run(LoginUserDto $loginUserDto): LoginUserDto
    {
        $user = $this->userRepository->login($loginUserDto);

        if (!Hash::check($loginUserDto->getPassword(), $user->getAuthPassword())) {
            throw new IncorrectLoginOrPasswordException();
        }

        return $loginUserDto->setAccessToken($this->getAccessToken($user));
    }

    private function getAccessToken(User $user): string
    {
        return $user->createToken('access-token')->plainTextToken;
    }
}