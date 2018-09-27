<h3> Pagination option </h3>

<section class="keywords formRow">

    <b> Pagination parameters</b>
    <section class="keywordsForms formRowElements">


        <section class="">

            <div class="form-group">
                {!! Form::label('startPage','Enter first pagination page number') !!}
                {!! Form::textarea('startPage','',['rows'=>'1']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('endPage','Enter last pagination page number') !!}
                {!! Form::textarea('endPage','',['rows'=>'1']) !!}
            </div>

        </section>

        <section class="">

            <div class="form-group">
                {!! Form::label('pageIterator','Enter the page iterator number (p=10,p=20,p=30 ->10)') !!}
                {!! Form::textarea('pageIterator','',['rows'=>'1']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('pagesPattern','Enter pagination pattern in form: <paginationParam>') !!}
                {!! Form::textarea('pagesPattern','',['rows'=>'1']) !!}
            </div>

        </section>

    </section>


</section>


<section class="keywords formRow">
    <section class="keywordsForms formRowElements">
        <section class="">
            <b> Pagination Links</b>
            <div class="form-group">
                {!! Form::label('pagination_links','Enter pagination based links in form <yourLink>&paginationParam={!pagination!}') !!}
                {!! Form::textarea('pagination_links','',['rows'=>'1']) !!}
            </div>

        </section>
    </section>
</section>