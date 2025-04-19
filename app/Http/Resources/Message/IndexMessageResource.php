<?php

declare(strict_types=1);

namespace App\Http\Resources\Message;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class IndexMessageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'messageId' => $this->id,
            'timestamp' => $this->created_at,
            'text' => $this->text,
            'sender' => [
                'userId' => $this->user->id,
                'email' => $this->user->email,
                'first_name' => $this->user->first_name,
                'last_name' => $this->user->last_name,
            ]
        ];
    }
}