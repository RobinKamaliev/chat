<?php

declare(strict_types=1);

namespace App\Chat\Services;

use App\Chat\Repositories\ChatRepositoryInterface;
use App\User\Exceptions\UserNotAuthorizedException;
use Illuminate\Support\Collection;

final readonly class IndexChatService
{
    private const PAGINATE_CHAT = 20;

    public function __construct(private ChatRepositoryInterface $chatRepository)
    {
    }

    /**
     * @throws UserNotAuthorizedException
     */
    public function run(): Collection
    {
        $user = auth();

        if (!$user) {
            throw new UserNotAuthorizedException();
        }

        return $this->chatRepository->getChatsLast($user->id(), self::PAGINATE_CHAT);
    }
}
