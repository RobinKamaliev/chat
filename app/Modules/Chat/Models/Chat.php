<?php

declare(strict_types=1);

namespace App\Modules\Chat\Models;

use App\Modules\Message\Models\Message;
use App\Modules\User\Models\User;
use Database\Factories\ChatFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    protected static function newFactory(): ChatFactory
    {
        return ChatFactory::new();
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
