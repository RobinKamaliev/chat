<?php

declare(strict_types=1);

namespace App\Message\Repositories;


use App\Chat\Models\Chat;
use App\Message\Dto\CreateMessageDto;
use App\Message\Models\Message;
use Illuminate\Support\Collection;

interface MessageRepositoryInterface
{
    public function create(CreateMessageDto $createMessageDto): Message;

    public function getMassagesFromChat(Chat $chat, int $paginate): Collection;
}