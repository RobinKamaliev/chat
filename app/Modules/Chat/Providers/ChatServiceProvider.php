<?php

declare(strict_types=1);

namespace App\Modules\Chat\Providers;

use App\Modules\Chat\Repositories\ChatRepositoryInterface;
use App\Modules\Chat\Repositories\EloquentChatRepository;
use Illuminate\Support\ServiceProvider;

final class ChatServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ChatRepositoryInterface::class, EloquentChatRepository::class);
    }
}
