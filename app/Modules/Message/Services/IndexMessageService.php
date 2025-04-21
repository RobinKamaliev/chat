<?php

declare(strict_types=1);

namespace App\Modules\Message\Services;

use App\Modules\Chat\Repositories\ChatRepositoryInterface;
use App\Modules\Message\Dto\IndexMessageDto;
use App\Modules\Message\Repositories\MessageRepositoryInterface;
use Illuminate\Support\Collection;

final readonly class IndexMessageService
{
    private const PAGINATE_MESSAGES = 20;

    public function __construct(
        private MessageRepositoryInterface $messageRepository,
        private ChatRepositoryInterface    $chatRepository,
    )
    {
    }

    public function run(IndexMessageDto $indexMessageDto): Collection
    {
        $chat = $this->chatRepository->findByUserIdAndChatId($indexMessageDto);

        return $this->messageRepository->getMassagesFromChat($chat, self::PAGINATE_MESSAGES);
    }
}
