<?php

declare(strict_types=1);

namespace App\ChatUser\Providers;

use App\ChatUser\Repositories\EloquentChatUserRepository;
use App\ChatUser\Repositories\ChatUserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

final class ChatUserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ChatUserRepositoryInterface::class, EloquentChatUserRepository::class);
    }
}