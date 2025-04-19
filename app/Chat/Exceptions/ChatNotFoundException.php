<?php

declare(strict_types=1);

namespace App\Chat\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

final class ChatNotFoundException extends Exception
{
    public $message = 'Чат не найден.';

    public $code = Response::HTTP_NOT_FOUND;
}