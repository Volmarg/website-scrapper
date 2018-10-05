<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class InputForms extends Controller
{
    public function setForms(){
        return view('inputs');
    }
}