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
    /**
     * Получить список сообщений для чата.
     *
     * Возвращает сообщения для указанного чата, с поддержкой пагинации.
     *
     * @group Сообщения
     * @authenticated
     *
     * @urlParam chatId int required ID чата, для которого нужно получить сообщения
     * @queryParam page int Пагинация: номер страницы (по умолчанию 1)
     * @queryParam per_page int Количество элементов на странице (по умолчанию 15)
     *
     * @response 200 {
     *   "data": [
     *     {
     *       "messageId": 1,
     *       "timestamp": "2024-01-01T12:00:00Z",
     *       "text": "Привет!",
     *       "sender": {
     *         "userId": 2,
     *         "email": "user@example.com",
     *         "first_name": "Иван",
     *         "last_name": "Иванов"
     *       }
     *     }
     *   ],
     *   "links": {
     *     "first": "http://localhost/api/chats/{chatId}/messages?page=1",
     *     "last": "http://localhost/api/chats/{chatId}/messages?page=5",
     *     "prev": null,
     *     "next": "http://localhost/api/chats/{chatId}/messages?page=2"
     *   },
     *   "meta": {
     *     "current_page": 1,
     *     "from": 1,
     *     "last_page": 5,
     *     "per_page": 15,
     *     "to": 15,
     *     "total": 75
     *   }
     * }
     */
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

    /**
     * Создать новое сообщение.
     *
     * Отправляет новое сообщение в чат.
     *
     * @group Сообщения
     * @authenticated
     *
     * @urlParam chatId int required ID чата, в который отправляется сообщение
     *
     * @bodyParam text string required Текст сообщения
     * @bodyParam sender_id int required ID пользователя, отправляющего сообщение
     *
     * @response 201 {
     *   "chatId": 1,
     *   "userId": 2,
     *   "text": "Как дела?"
     * }
     */
    public function store(StoreMessageRequest $storeMessageRequest, CreateMessageService $service): JsonResponse
    {
        return response()->json(
            StoreMessageResource::make(
                $service->run(
                    $storeMessageRequest->toDto()
                )
            ),
            Response::HTTP_CREATED
        );
    }
}
