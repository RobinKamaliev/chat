<?php

declare(strict_types=1);

namespace App\ChatUser\Models;

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
}
