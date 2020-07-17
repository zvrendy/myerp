<?php

<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Broadcast;

>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0
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

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
