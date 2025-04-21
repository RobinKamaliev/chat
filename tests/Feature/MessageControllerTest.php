<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Modules\Chat\Exceptions\ChatNotFoundException;
use App\Modules\Chat\Models\Chat;
use App\Modules\ChatUser\Models\ChatUser;
use App\Modules\Message\Models\Message;
use App\Modules\User\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class MessageControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_the_application_returns_a_successful_response(): void
    {
        $chat = Chat::factory()->create();

        $this->getJson(route('chats.messages.index', ['chatId' => $chat->id]))
            ->assertUnauthorized();
    }

    public function test_it_can_get_messages_for_chat(): void
    {
        $user = User::factory()->create();
        $chat = Chat::factory()->create();
        ChatUser::factory()->create([
            'chat_id' => $chat->id,
            'user_id' => $user->id,
        ]);
        Message::factory()->count(3)->create([
            'chat_id' => $chat->id,
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($user)
            ->getJson(route('chats.messages.index', ['chatId' => $chat->id]));

        $response->assertOk()
            ->assertJsonStructure([
                '*' => [
                    'messageId',
                    'timestamp',
                    'text',
                    'sender' => [
                        'userId',
                        'email',
                        'first_name',
                        'last_name',
                    ],
                ]
            ])
            ->assertJsonCount(3);
    }

    public function test_chat_not_found_exception(): void
    {
        $authUser = User::factory()->create();
        $chat = Chat::factory()->create();

        $response = $this->actingAs($authUser)
            ->getJson(route('chats.messages.index', ['chatId' => $chat->id]));

        $response->assertNotFound()
            ->assertJson([
                'error' => (new ChatNotFoundException())->getMessage(),
                'exception' => ChatNotFoundException::class
            ]);
    }
}
