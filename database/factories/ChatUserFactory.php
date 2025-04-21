<?php

namespace Database\Factories;

use App\Modules\Chat\Models\Chat;
use App\Modules\ChatUser\Models\ChatUser;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChatUserFactory extends Factory
{
    protected $model = ChatUser::class;

    public function definition(): array
    {
        return [
            'chat_id' => Chat::factory(),
            'user_id' => User::factory(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
