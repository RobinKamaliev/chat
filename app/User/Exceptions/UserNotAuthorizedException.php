<?php

declare(strict_types=1);

namespace App\User\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

final class UserNotAuthorizedException extends Exception
{
    public $message = 'Пользователь не авторизован.';

    public $code = Response::HTTP_BAD_REQUEST;
}