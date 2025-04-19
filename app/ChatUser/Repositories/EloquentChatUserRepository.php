<?php

declare(strict_types=1);

namespace App\ChatUser\Repositories;

use App\Chat\Dto\CreateChatDto;
use App\ChatUser\Models\ChatUser;

final class EloquentChatUserRepository implements ChatUserRepositoryInterface
{
    public function firstOrCreate(CreateChatDto $createChatDto): void
    {
        ChatUser::firstOrCreate([
            'user_id' => $createChatDto->getUserId(),
            'chat_id' => $createChatDto->getChatId(),
        ]);
    }
}