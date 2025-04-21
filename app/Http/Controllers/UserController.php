<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\User\GetUserResource;
use App\Modules\User\Services\Auth\GetUserService;
use Illuminate\Http\JsonResponse;

final class UserController extends Controller
{
    public function index(GetUserService $getUserService): JsonResponse
    {
        return response()->json(
            GetUserResource::collection(
                $getUserService->run()
            )
        );
    }
}
