<?php

namespace Unisharp\Laravelfilemanager\Handlers;

use Cartalyst\Sentinel\Native\Facades\Sentinel;

class ConfigHandler
{
    public function userField()
    {
//        return auth()->user()->id;
        $user = Sentinel::check();
        return $user->id;
    }
}
