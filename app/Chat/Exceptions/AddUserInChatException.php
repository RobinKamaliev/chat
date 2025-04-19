<?php

declare(strict_types=1);

namespace App\Chat\Exceptions;

use App\Exceptions\HttpException;
use Symfony\Component\HttpFoundation\Response;

final class AddUserInChatException extends HttpException
{
    public $message = 'Ошибка при добавления пользователя в чат.';

    public $code = Response::HTTP_INTERNAL_SERVER_ERROR;
}
