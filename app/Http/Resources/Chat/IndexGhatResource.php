<?php

declare(strict_types=1);

namespace App\Http\Resources\Chat;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class IndexGhatResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'chatId' => $this->id,
            'timestamp' => $this->messages_max_created_at,
            'userNames' => $this->users
                ->map(static fn($user) => $user->first_name . ' ' . $user->last_name)
                ->implode(', '),
            'chatName' => $this->chat_name,
        ];
    }
}
