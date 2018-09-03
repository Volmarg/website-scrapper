<?php
/**
 * Created by PhpStorm.
 * User: Volmarg Reiso
 * Date: 03.09.2018
 * Time: 18:06
 */

namespace App\Http\Controllers\FormInput;
use Illuminate\Http\Request;


class FormFetch
{
    public $request_array=array(),$raw_request;


    public function getInput(Request $request){
        $this->requestToArray($request);
        $this->inputsToArrays();
    }

    public function requestToArray($request){
        $this->raw_request=$request->toArray();

    }

    protected function inputsToArrays(){
        foreach($this->raw_request as $key => $value){
            $this->request_array[$key]=json_decode($value);
        }
    }



}