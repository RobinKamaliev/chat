<?php

declare(strict_types=1);

namespace App\Modules\ChatUser\Providers;

use App\Modules\ChatUser\Repositories\ChatUserRepositoryInterface;
use App\Modules\ChatUser\Repositories\EloquentChatUserRepository;
use Illuminate\Support\ServiceProvider;

final class ChatUserServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ChatUserRepositoryInterface::class, EloquentChatUserRepository::class);
    }
}
