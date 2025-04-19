<?php

declare(strict_types=1);

namespace App\Http\Requests\Message;

use App\Message\Dto\CreateMessageDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class StoreMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'message' => 'required|string',
            'chatId' => [
                'required',
                'int',
                Rule::exists('chats', 'id'),
            ],
        ];
    }

    public function validationData(): array
    {
        return array_merge($this->all(), [
            'chatId' => $this->route('chatId'),
        ]);
    }

    public function messages(): array
    {
        return [
            'message.required' => 'Поле message обязательно для заполнения.',
            'message.string' => 'Поле message должно быть строкой.',
            'chatId.required' => 'Поле chatId обязательно для заполнения.',
            'chatId.int' => 'Поле chatId должно быть целым числом.',
            'chatId.exists' => 'Указанный чат не найден.',
        ];
    }


    public function toDto(): CreateMessageDto
    {
        return (new CreateMessageDto())
            ->setChatId((int)$this->route('chatId'))
            ->setMessage($this->input('message'))
            ->setUserId(auth()->id());
    }
}
