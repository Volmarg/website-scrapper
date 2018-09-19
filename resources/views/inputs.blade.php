@extends('templates/layout')

@section('container')

    <hr/>

    @input
    @slot('up')
        {!! Form::open(['route'=>'formFetcher']) !!}


        <!-- new template test !-->
        <section class="justify-content-center formWrapper">
            <section class="searchTypeSwitch">
                Single Links | Pagination - js based load
            </section>

            <!-- ~~~~~~~// Keywords start !-->
            <section class="keywords formRow">
                <h3> Keywords </h3>

                <section class="keywordsForms formRowElements">

                    <section class="acceptForms">
                        <b>Acceptable Keywords</b>
                        <div class="form-group">
                            {!! Form::label ('acceptKeywordsBody','Enter acceptable keywords for body') !!}
                            {!! Form::textarea('acceptKeywordsBody','',['rows'=>'1'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('acceptKeywordsOther','Enter acceptable keywords for other page element') !!}
                            {!! Form::textarea('acceptKeywordsOther','',['rows'=>'1']) !!}
                        </div>
                    </section>

                    <section class="rejectForms">
                        <b>Rejectable Keywords</b>
                        <div class="form-group">
                            {!! Form::label ('rejectKeywordsBody','Enter rejectable keywords for body') !!}
                            {!! Form::textarea('rejectKeywordsBody','',['rows'=>'1']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label ('rejectKeywordsOther','Enter rejectable keywords for other page element') !!}
                            {!! Form::textarea('rejectKeywordsOther','',['rows'=>'1']) !!}
                        </div>

                    </section>

                </section>


            </section>
            <!-- ~~~~~~~// Keywords end !-->

            <!-- ~~~~~~~// Selectors  start !-->
            <section class="selectors formRow">
                <h3> Selectors</h3>

                <section class="selectorsForms formRowElements" style="display:flex;">
                    <section class="main">
                        <div class="form-group">
                            {!! Form::label('querySelectorMain', 'Query Selector - main body for example') !!}
                            {!! Form::text('querySelectorMain') !!}
                        </div>
                    </section>

                    <section class="others">
                        <div class="form-group">
                            {!! Form::label('querySelectorOther', 'Query Selector - header for example') !!}
                            {!! Form::text('querySelectorOther') !!}
                        </div>
                    </section>
                </section>
            </section>
            <!-- ~~~~~~~// Selectors end !-->

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
                </section>

            </section>
            <!-- ~~~~~~~// Search type end !-->

            <section class="formRow">
                <h3> Additional search </h3>
                <section class="searchTypeForms formRowElements">
                    <section>
                        <b>PRCE match</b>
                        <div class="form-group">
                            {!! Form::label('PRCE','Select or add your PRCE flags') !!}
                            {!! Form::radio('PRCE',"$email_PRCE_pattern",'',['data-id'=>'PRCE_radio']) !!}
                            {!! Form::radio('PRCE','customPRCE','',['id'=>'customPRCE']) !!}
                            <span id="customPRCE_Wrapper" class="hiddenElement"></span>
                        </div>
                    </section>
                    <section>
                        <b>Additional Rules</b>
                        <div class="form-group">
                            {!! Form::label('contentLength','Enter content length') !!}
                            {!! Form::text('contentLength') !!}
                        </div>
                    </section>
                </section>
            </section>

            <section class="submitForm formRowElements">
                {!! Form::submit('submit') !!}
                {!! Form::close() !!}
            </section>
        </section>


        <!-- new template test !-->


    @endslot

    @slot('left')




    @endslot

    @slot('right')


    @endslot

    @slot('down')

    @endslot

    @endinput

    <hr/>

@endsection