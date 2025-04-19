<?php

declare(strict_types=1);

namespace App\Message\Services;

use App\Message\Dto\CreateMessageDto;
use App\Message\Models\Message;
use App\Message\Repositories\MessageRepositoryInterface;

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