<?php

declare(strict_types=1);

namespace App\Http\Resources\Chat;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class StoreChatResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'chatId' => $this->getChatId(),
        ];
    }
}