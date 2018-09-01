<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scrapped_data extends Model
{

    /*
     * Unknow class, check if its used somewhere and delete
     */
    public function testowa(){
        dd('test');
    }


    //test2
}

$c=new scrapped_data();
$c->testowa();
