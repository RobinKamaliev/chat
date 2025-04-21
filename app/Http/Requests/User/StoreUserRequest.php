<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Modules\User\Dto\CreateUserDto;
use Illuminate\Foundation\Http\FormRequest;

final class StoreUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'firstName.required' => 'Поле "Имя" обязательно для заполнения.',
            'firstName.string' => 'Поле "Имя" должно быть строкой.',
            'lastName.required' => 'Поле "Фамилия" обязательно для заполнения.',
            'lastName.string' => 'Поле "Фамилия" должно быть строкой.',
            'email.required' => 'Поле "Email" обязательно для заполнения.',
            'email.email' => 'Введите корректный адрес электронной почты.',
            'email.unique' => 'Этот адрес электронной почты уже используется.',
            'password.required' => 'Поле "Пароль" обязательно для заполнения.',
            'password.string' => 'Пароль должен быть строкой.',
            'password.min' => 'Пароль должен содержать минимум 6 символов.',
        ];
    }

    public function toDto(): CreateUserDto
    {
        return (new CreateUserDto())
            ->setFirstName($this->input('firstName'))
            ->setLastName($this->input('lastName'))
            ->setEmail($this->input('email'))
            ->setPassword($this->input('password'));
    }
}
