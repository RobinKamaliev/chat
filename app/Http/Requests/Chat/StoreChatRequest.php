<?php

declare(strict_types=1);

namespace App\Http\Requests\Chat;

use App\Modules\Chat\Dto\CreateChatDto;
use Illuminate\Foundation\Http\FormRequest;

final class StoreChatRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'userId' => 'required|int',
            'chatId' => 'required|int',
        ];
    }

    public function messages(): array
    {
        return [
            'userId.required' => 'Поле userId обязательно для заполнения.',
            'userId.int' => 'Поле userId должно быть целым числом.',
            'chatId.required' => 'Поле chatId обязательно для заполнения.',
            'chatId.int' => 'Поле chatId должно быть целым числом.',
        ];
    }


    public function toDto(): CreateChatDto
    {
        return (new CreateChatDto())
            ->setChatId((int)$this->input('chatId'))
            ->setUserId((int)$this->input('userId'));
    }
}
