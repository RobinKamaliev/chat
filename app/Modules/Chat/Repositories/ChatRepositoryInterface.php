<?php

declare(strict_types=1);

namespace App\Modules\Chat\Repositories;

use App\Modules\Chat\Dto\CreateChatDto;
use App\Modules\Chat\Models\Chat;
use App\Modules\Message\Dto\IndexMessageDto;
use Illuminate\Support\Collection;

interface ChatRepositoryInterface
{
    public function getChatsLast(int $userId, int $paginate): Collection;

    public function firstOrCreate(CreateChatDto $createChatDto): void;

    public function findByUserIdAndChatId(IndexMessageDto $indexMessageDto): Chat;
}
