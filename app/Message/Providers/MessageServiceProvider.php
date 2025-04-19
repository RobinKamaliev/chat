<?php

declare(strict_types=1);

namespace App\Message\Providers;

use App\Message\Repositories\EloquentMessageRepository;
use App\Message\Repositories\MessageRepositoryInterface;
use Illuminate\Support\ServiceProvider;

final class MessageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(MessageRepositoryInterface::class, EloquentMessageRepository::class);
    }
}