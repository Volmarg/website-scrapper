<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fakePage extends Model
{
    /*
     * Used just as dummy data passed via DB
     * remove it afterwards, same goes with migration
     */

    public function returnContent(){

        return $this->select('*')->get()->toArray();
    }
}
