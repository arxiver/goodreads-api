<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/
/*Broadcast::channel('channel', function() {
    // ...
    return true;
}, ['guards' => ['api']]);*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
}/*, ['guards' => ['api']]*/);

Broadcast::channel('user.{id}',function(){
    return true;
}, ['guards' => ['api']]);