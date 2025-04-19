<?php

declare(strict_types=1);

namespace App\User\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

final class UserNotFoundException extends Exception
{
    public $message = 'Пользователь не найден.';

    public $code = Response::HTTP_NOT_FOUND;
}