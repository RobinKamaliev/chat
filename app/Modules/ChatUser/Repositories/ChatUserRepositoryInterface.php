<?php

declare(strict_types=1);

namespace App\Modules\ChatUser\Repositories;

use App\Modules\Chat\Dto\CreateChatDto;

interface ChatUserRepositoryInterface
{
    public function firstOrCreate(CreateChatDto $createChatDto): void;
}
