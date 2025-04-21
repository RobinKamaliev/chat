<?php

declare(strict_types=1);

namespace App\Modules\Message\Repositories;

use App\Modules\Chat\Models\Chat;
use App\Modules\Message\Dto\CreateMessageDto;
use App\Modules\Message\Models\Message;
use Illuminate\Support\Collection;

interface MessageRepositoryInterface
{
    public function create(CreateMessageDto $createMessageDto): Message;

    public function getMassagesFromChat(Chat $chat, int $paginate): Collection;
}
