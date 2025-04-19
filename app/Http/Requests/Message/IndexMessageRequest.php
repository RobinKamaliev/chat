<?php

declare(strict_types=1);

namespace App\Http\Requests\Message;

use App\Message\Dto\IndexMessageDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class IndexMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
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
            'chatId.required' => 'Поле chatId обязательно для заполнения.',
            'chatId.int' => 'Поле chatId должно быть целым числом.',
            'chatId.exists' => 'Указанный чат не найден.',
        ];
    }


    public function toDto(): IndexMessageDto
    {
        return (new IndexMessageDto())
            ->setChatId((int)$this->route('chatId'))
            ->setUserId(auth()->id());
    }

    public function bodyParameters(): array
    {
        return [
            'chatId' => [
                'type' => 'integer',
                'description' => 'ID чата, для которого нужно получить сообщения',
            ]
        ];
    }
}
