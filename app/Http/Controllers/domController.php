<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class domController extends Controller
{
    public $dom;

    public function __construct($html)
    {

        $this->dom=new \domDocument;
        $this->dom->loadHTML($html);
        $this->dom->preserveWhiteSpace=false;
    }

    public function findElement(){
/*
 * <div v-show="showBody" class="content user-content" data-reply-body>
<div v-pre><p><a href='/@bart'>@bart</a> I don’t really think you have a grasp of events and listeners.</p>
<p>What you’re trying to do is change the state on an entity. Events shouldn’t be manipulating state. An event is saying something happened in your application, and a listener reacts to that event happening.</p>
<p>It’s difficult to suggest a better alternative to your problem as you’re just giving us “action” as “reject” as names. What’s an “action”? What is being accepted/rejected?</p>
</div>
</div>
 */
    }
}
