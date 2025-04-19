<?php

declare(strict_types=1);

namespace App\Http\Resources\Message;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class StoreMessageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'chatId' => $this->chat_id,
            'userId' => $this->user_id,
            'text' => $this->text,
        ];
    }
}
