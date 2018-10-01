<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<h1> Website Scrapper </h1>
<h2>  Version 1.0 finished <sub>#1.0.36</sub></h2>
<pre> Only fixing some bugs in free time now</pre>

<p>
This tool was created in order to save myself lot of time spent on manual searching 'things' on some websites, so instead of manually checking each single page, now the script does around 80% of work for me.
</p>

<b>Just an example</b>
1. Let's say we got this website: <a href="https://oferia.pl/zlecenia/programowanie-it">Oferia</a>
2. Now we are interested in offers listed in the middle, so we would need to read every single page to find what might interest us
3. Instead we prepare some parameters by analysing website a bit like:
<ul>
    <li><b>Full pager link</b>: https://oferia.pl/zlecenia/programowanie-it?strona={page_number}</li> 
    <li><b>Pager pattern</b>: {page_number}	</li> 
    <li><b>First page that interest us</b>: 1</li> 
    <li><b>Last page that interest us</b>: 3</li> 
    <li><b>Pagination iteration</b>: 1 (if page 1 would have s=10, page 2 s=30, then iteration is 20)</li> 
    <li><b>CSS selectors that will indicate links for subpages</b>: .listing-order-name</li> 
    <li><b>CSS selector for main page content</b>: .cardOrderName</li> 
    <li><b>CSS selector for other page content that might interest us</b>: <li>.orderMainContent
    <li><b>Keywords by which we want to filter pages</b>:
        <ul>
            <li><b>Rejectable</b>: javascript, js, react, angular</li>
            <li><b>Acceptable</b>: html, php, laravel, jquery</li>
        </ul>
    </li> 
</ul>
4. As result we get report table based on JS datatable plugin<br/>
5. Data can be exported to Excel file:

<h2>What works</h2>

<ul>
<li>Scrapping data from single pages,</li>
<li>Scrapping data from pagination based input,</li>
<li>Marking found content on pages</li>
<li>Rejecting/Accepting given pages depending on inserted keywords</li>
<li>Generating report with all the links and content types </li>
<li>Sorting fast report </li>
<li>Exporting report into for example CSV</li>
</ul>

<h2> Known bugs and other things to change</h2>

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
    <li>
    Case 2:
    <ul>
        <li> Slow execution time </li>
    </ul>
    </li>
    Case 3:
    <ul>
        <li> GUI </li>
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