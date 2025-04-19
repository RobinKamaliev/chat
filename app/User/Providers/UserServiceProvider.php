<?php

declare(strict_types=1);

namespace App\User\Providers;

use App\User\Repositories\EloquentUserRepository;
use App\User\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

final class UserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
    }
}
