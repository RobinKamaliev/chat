<?php

declare(strict_types=1);

namespace App\Chat\Providers;

use App\Chat\Repositories\EloquentChatRepository;
use App\Chat\Repositories\ChatRepositoryInterface;
use Illuminate\Support\ServiceProvider;

final class ChatServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ChatRepositoryInterface::class, EloquentChatRepository::class);
    }
}