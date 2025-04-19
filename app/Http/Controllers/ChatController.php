<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Chat\Exceptions\AddUserInChatException;
use App\Chat\Services\AddUserInChatService;
use App\Chat\Services\IndexChatService;
use App\Http\Requests\Chat\StoreChatRequest;
use App\Http\Resources\Chat\IndexGhatResource;
use App\Http\Resources\Chat\StoreChatResource;
use App\User\Exceptions\UserNotAuthorizedException;
use Exception;
use Illuminate\Http\JsonResponse;

class ChatController extends Controller
{
    /**
     * @throws Exception
     */
    public function index(IndexChatService $indexChatService): JsonResponse
    {
        return response()->json(
            IndexGhatResource::collection(
                $indexChatService->run()
            )
        );
    }

    /**
     * @throws AddUserInChatException
     * @throws UserNotAuthorizedException
     */
    public function store(StoreChatRequest $storeChatRequest, AddUserInChatService $addUserInChatService): JsonResponse
    {
        return response()->json(
            StoreChatResource::make(
                $addUserInChatService->run(
                    $storeChatRequest->toDto()
                )
            )
        );
    }
}
