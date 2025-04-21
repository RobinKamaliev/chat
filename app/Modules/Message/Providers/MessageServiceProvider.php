<?php

declare(strict_types=1);

namespace App\Modules\Message\Providers;

use App\Modules\Message\Repositories\EloquentMessageRepository;
use App\Modules\Message\Repositories\MessageRepositoryInterface;
use Illuminate\Support\ServiceProvider;

final class MessageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(MessageRepositoryInterface::class, EloquentMessageRepository::class);
    }
}
