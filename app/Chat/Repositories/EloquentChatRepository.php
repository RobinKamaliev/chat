<?php

declare(strict_types=1);

namespace App\Chat\Repositories;

use App\Chat\Dto\CreateChatDto;
use App\Chat\Exceptions\ChatNotFoundException;
use App\Chat\Models\Chat;
use App\Message\Dto\IndexMessageDto;
use Illuminate\Support\Collection;

final class EloquentChatRepository implements ChatRepositoryInterface
{
    public function getChatsLast(int $userId, int $paginate): Collection
    {
        return Chat::query()
            ->select('chats.id', 'chats.name as chat_name')
            ->with([
                'users:id,first_name,last_name',
            ])
            ->withMax('messages', 'created_at')
            ->whereHas('users', function ($q) use ($userId) {
                $q->where('users.id', $userId);
            })
            ->orderByDesc('messages_max_created_at')
            ->paginate($paginate)
            ->getCollection();
    }

    public function firstOrCreate(CreateChatDto $createChatDto): void
    {
        Chat::query()
            ->firstOrCreate([
                'id' => $createChatDto->getChatId(),
            ]);
    }

    /**
     * @throws ChatNotFoundException
     */
    public function findByUserIdAndChatId(IndexMessageDto $indexMessageDto): Chat
    {
        $chat = Chat::query()
            ->whereHas('users', static fn($q) => $q->where('user_id', $indexMessageDto->getUserId()))
            ->find($indexMessageDto->getChatId());

        if (!$chat) {
            throw new ChatNotFoundException();
        }

        return $chat;
    }
}