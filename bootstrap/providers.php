<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
    App\User\Providers\UserServiceProvider::class,
    App\Chat\Providers\ChatServiceProvider::class,
    App\ChatUser\Providers\ChatUserServiceProvider::class,
    App\Message\Providers\MessageServiceProvider::class,
];
