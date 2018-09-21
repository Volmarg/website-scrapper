<!-- ~~~~~~~// Search type start !-->
<section class="selectors formRow">

    <h3> Search type </h3>
    <section class="searchTypeForms formRowElements">


        <section id="searchBySingleLinks">
            <div class="form-group">
                {!! Form::label('links','Enter single links') !!}
                {!! Form::textarea('links','') !!}
            </div>
        </section>

<!--
        <section id="searchByPagination">
            <b> Pagination</b>
            <div class="form-group">
                {!! Form::label('pagination_links','Enter pagination based links') !!}
                {!! Form::textarea('pagination_links','',['rows'=>'1']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('Pagination','Pagination limiters') !!}
                {!! Form::text('Pagination') !!}
            </div>

        </section>
!-->
    </section>

</section>
<!-- ~~~~~~~// Search type end !-->