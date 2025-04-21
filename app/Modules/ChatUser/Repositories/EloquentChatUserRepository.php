<?php

declare(strict_types=1);

namespace App\Modules\ChatUser\Repositories;

use App\Modules\Chat\Dto\CreateChatDto;
use App\Modules\ChatUser\Models\ChatUser;

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
