<?php

declare(strict_types=1);

namespace App\Modules\Chat\Dto;

final class CreateChatDto
{
    private int $userId;
    private int $chatId;

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getChatId(): int
    {
        return $this->chatId;
    }

    public function setChatId(int $chatId): self
    {
        $this->chatId = $chatId;

        return $this;
    }
}
