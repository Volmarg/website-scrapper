<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Output extends Controller
{
    public $filtered_content;

    public function __construct($filtered_content)
    {
        $this->filtered_content = $filtered_content;
    }

    public function renderOutput()
    {
        $this->passToView();
    }

    protected function passToView()
    {
        $content = $this->filtered_content;

        echo view('outputs', compact('content'));
    }
}
