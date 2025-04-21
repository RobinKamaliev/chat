<?php

declare(strict_types=1);

namespace App\Modules\Message\Services;

use App\Modules\Message\Dto\CreateMessageDto;
use App\Modules\Message\Models\Message;
use App\Modules\Message\Repositories\MessageRepositoryInterface;

final readonly class CreateMessageService
{
    public function __construct(private MessageRepositoryInterface $messageRepository)
    {
    }

    public function run(CreateMessageDto $createMessageDto): Message
    {
        return $this->messageRepository->create($createMessageDto);
    }
}
