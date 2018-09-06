<?php
/**
 * Created by PhpStorm.
 * User: Volmarg Reiso
 * Date: 03.09.2018
 * Time: 18:06
 */

namespace App\Http\Controllers\FormInput;
use Illuminate\Http\Request;
use App\Http\Controllers\ProcessControll;


class FormFetch
{
    public $request_array=array(),$raw_request;


    public function getInput(Request $request){

        $this->requestToArray($request);
        $this->inputsToArrays();

        $process_controll=new ProcessControll($this->request_array);
        $process_controll->start();
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