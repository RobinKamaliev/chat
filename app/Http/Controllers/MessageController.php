<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Message\IndexMessageRequest;
use App\Http\Requests\Message\StoreMessageRequest;
use App\Http\Resources\Message\IndexMessageResource;
use App\Http\Resources\Message\StoreMessageResource;
use App\Message\Services\CreateMessageService;
use App\Message\Services\IndexMessageService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final class MessageController extends Controller
{
    public function index(IndexMessageRequest $indexMessageRequest, IndexMessageService $service): JsonResponse
    {
        return response()->json(
            IndexMessageResource::collection(
                $service->run(
                    $indexMessageRequest->toDto()
                )
            )
        );
    }

    public function store(StoreMessageRequest $storeMessageRequest, CreateMessageService $service): JsonResponse
    {
        return response()->json(
            StoreMessageResource::make(
                $service->run(
                    $storeMessageRequest->toDto()
                )
            ), Response::HTTP_CREATED
        );
    }
}
