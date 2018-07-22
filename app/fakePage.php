<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fakePage extends Model
{
    public function returnContent(){

        return $this->select('*')->get()->toArray();
    }
}
