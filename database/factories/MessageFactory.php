<?php

namespace Database\Factories;

use App\Modules\Chat\Models\Chat;
use App\Modules\Message\Models\Message;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    protected $model = Message::class;

    public function definition(): array
    {
        return [
            'chat_id' => Chat::factory(),
            'user_id' => User::factory(),
            'text' => fake()->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
