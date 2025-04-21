<?php

declare(strict_types=1);

namespace App\Modules\ChatUser\Models;

use Database\Factories\ChatUserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class ChatUser extends Model
{
    use HasFactory;

    protected $table = 'chat_user';
    protected $fillable = [
        'chat_id',
        'user_id',
    ];

    protected static function newFactory(): ChatUserFactory
    {
        return ChatUserFactory::new();
    }
}
