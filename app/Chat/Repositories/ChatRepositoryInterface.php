<?php

declare(strict_types=1);

namespace App\Chat\Repositories;

use App\Chat\Dto\CreateChatDto;
use App\Chat\Models\Chat;
use App\Message\Dto\IndexMessageDto;
use Illuminate\Support\Collection;

interface ChatRepositoryInterface
{
    public function getChatsLast(int $userId, int $paginate): Collection;

    public function firstOrCreate(CreateChatDto $createChatDto): void;

    public function findByUserIdAndChatId(IndexMessageDto $indexMessageDto): Chat;
}