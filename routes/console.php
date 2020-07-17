<?php

use Illuminate\Foundation\Inspiring;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Artisan;
>>>>>>> a1fa5ea8a9beb6ec036c9c3d8a72106fea3231e0

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
