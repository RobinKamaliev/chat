<?php

namespace App\Http;

use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Middleware\ThrottleRequests;

class Kernel
{
    public function __invoke(Middleware $middleware): void
    {
        $middleware->append(ThrottleRequests::class . ':global');
    }
}