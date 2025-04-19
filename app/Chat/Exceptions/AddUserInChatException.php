<?php

declare(strict_types=1);

namespace App\Chat\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

final class AddUserInChatException extends Exception
{
    public $message = 'Ошибка при добавления пользователя в чат.';

    public $code = Response::HTTP_INTERNAL_SERVER_ERROR;
}