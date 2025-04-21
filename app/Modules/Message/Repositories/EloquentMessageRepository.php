<?php

declare(strict_types=1);

namespace App\Modules\Message\Repositories;

use App\Modules\Chat\Models\Chat;
use App\Modules\Message\Dto\CreateMessageDto;
use App\Modules\Message\Models\Message;
use Illuminate\Support\Collection;

final class EloquentMessageRepository implements MessageRepositoryInterface
{
    public function create(CreateMessageDto $createMessageDto): Message
    {
        return Message::query()->create([
            'chat_id' => $createMessageDto->getChatId(),
            'user_id' => $createMessageDto->getUserId(),
            'text' => $createMessageDto->getMessage(),
        ]);
    }

    public function getMassagesFromChat(Chat $chat, int $paginate): Collection
    {
        return $chat->messages()
            ->with('user')
            ->orderByDesc('created_at')
            ->paginate($paginate)
            ->getCollection();
    }
}
