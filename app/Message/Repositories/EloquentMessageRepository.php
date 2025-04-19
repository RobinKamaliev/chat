<?php

declare(strict_types=1);

namespace App\Message\Repositories;

use App\Chat\Models\Chat;
use App\Message\Dto\CreateMessageDto;
use App\Message\Models\Message;
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
