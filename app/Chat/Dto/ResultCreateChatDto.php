<?php

declare(strict_types=1);

namespace App\Chat\Dto;

final class ResultCreateChatDto
{
    private int $chatId;

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
