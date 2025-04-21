<?php

declare(strict_types=1);

namespace App\Modules\User\Services\Auth;

use App\Modules\User\Dto\LoginUserDto;
use App\Modules\User\Exceptions\IncorrectLoginOrPasswordException;
use App\Modules\User\Exceptions\UserNotFoundException;
use App\Modules\User\Models\User;
use App\Modules\User\Repositories\UserRepositoryInterface;
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
