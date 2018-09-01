<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputForms extends Controller
{
    public function setFormsAttributes(){
        $email_PRCE_pattern='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i';

        return view('inputs',compact('email_PRCE_pattern'));
    }
}
