<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    \App\Modules\User\Providers\UserServiceProvider::class,
    \App\Modules\Chat\Providers\ChatServiceProvider::class,
    \App\Modules\ChatUser\Providers\ChatUserServiceProvider::class,
    \App\Modules\Message\Providers\MessageServiceProvider::class,
];
