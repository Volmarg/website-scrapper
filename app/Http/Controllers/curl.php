<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\curlingEvent;

class curl extends Controller
{
    public function getContent(){

        event(new curlingEvent());


    }
}
