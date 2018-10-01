<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
#INFO: REMOVE IT
class scrapped_data extends Model
{


    public function testowa(){
        dd('test');
    }


}

$c=new scrapped_data();
$c->testowa();
