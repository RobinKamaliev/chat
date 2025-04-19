<?php

declare(strict_types=1);

namespace App\User\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

final class IncorrectLoginOrPasswordException extends Exception
{
    public $message = 'Не верный логин или пароль.';

    public $code = Response::HTTP_BAD_REQUEST;
}