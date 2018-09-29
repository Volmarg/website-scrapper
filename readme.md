<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<h2>What works atm.</h2>

<ul>
<li>Scrapping data from single pages,</li>
<li>Scrapping data from pagination based input,</li>
<li>Marking found content on pages</li>
<li>Rejecting/Accepting given pages depending on inserted keywords</li>
<li>Generating fast report with all the links and content types </li>
<li>Sorting fast report </li>
<li>Exporting fast report into for example CSV</li>
</ul>

<h2> Known unfixable bugs </h2>

<ul>
    <li>Case 1:
        <ul>
            <li>Let's say You enter link which has like 5 redirects</li>
            <li>At this point the finall destination page will be extracted, and so far that's ok</li>
            <li>Problem is that the destination page can be rendered in JavaScript and this point there is nothing that can be done</li>
            <li>There are even the same similar subcases
                <ul>
                    <li>Content in Iframe</li>
                    <li>Page waiting for user to click</li>
                </ul>
            </li>
        </ul>
    </li>
</ul>


<i>
<p> Well ok, some can be fixed but I don't need this to work, and don't want to spend more time on it... </h4>
<p> Script in this form already saves me weeks of time so that's enough</h5>
</i>



<h2>Used packages</h2>
<ul>
<li><a href="https://github.com/wasinger/htmlpagedom">htmlpagedom as domDocument extension</a> ,
</li>
<li><a href="https://datatables.net/">Datatables</a></li>
</ul>

<h2>Used tools</h2>
<ul>
<li>Windows
           <ul>
               <li>GIT</li>
               <li>PHP storm,</li>
               <li>Xdebug</li>
               <li>Composer</li>
               <li>Wrike,</li>
               <li>Mindjet,</li>
               <li>Vagrant,</li>
               <li>Larvel DebugBar,</li>
           </ul>
</li>

<li>Linux
           <ul>
           <li>Docker,</li>
           <li><a href="http://laradock.io/">LaraDock</a></li>
           </ul>
</li>

</ul>


<h2>Used designs</h2>
<ul>
</ul>

<h2>Tech Stack</h2>
<ul>
<li>PHP,</li>
<li>Laravel 5.6,
    <ul>
        <li>Dump Server from 5.7 </li>
    </ul>
</li>
<li>CSS,</li>
<li>SCSS,</li>
<li>JS,</li>
<li>JQ,</li>
<li>MySQL,</li>
</ul>