<?php

declare(strict_types=1);

namespace App\ChatUser\Repositories;

use App\Chat\Dto\CreateChatDto;

interface ChatUserRepositoryInterface
{
    public function firstOrCreate(CreateChatDto $createChatDto): void;
}
