<?php

declare(strict_types=1);

namespace App\Chat\Services;

use App\Chat\Dto\CreateChatDto;
use App\Chat\Dto\ResultCreateChatDto;
use App\Chat\Exceptions\AddUserInChatException;
use App\Chat\Repositories\ChatRepositoryInterface;
use App\ChatUser\Repositories\ChatUserRepositoryInterface;
use App\User\Exceptions\UserNotAuthorizedException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

final readonly class AddUserInChatService
{
    public function __construct(
        private ChatRepositoryInterface     $chatRepository,
        private ChatUserRepositoryInterface $chatUserRepository,
    ) {
    }

    /**
     * @throws AddUserInChatException
     * @throws UserNotAuthorizedException
     */
    public function run(CreateChatDto $createChatDto): ResultCreateChatDto
    {
        if (!auth()) {
            throw new UserNotAuthorizedException();
        }

        try {
            DB::beginTransaction();
            $this->chatRepository->firstOrCreate($createChatDto);
            $this->chatUserRepository->firstOrCreate($createChatDto);

            $this->createChatUser($createChatDto);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e);

            throw new AddUserInChatException();
        }

        return $this->buildResultCreateChatDto(
            $createChatDto->getChatId()
        );
    }

    private function createChatUser(CreateChatDto $createChatDto): void
    {
        $createChatDto->setUserId(auth()->id());
        $this->chatUserRepository->firstOrCreate($createChatDto);
    }

    private function buildResultCreateChatDto(int $chatDto): ResultCreateChatDto
    {
        return (new ResultCreateChatDto())
            ->setChatId($chatDto);
    }
}
