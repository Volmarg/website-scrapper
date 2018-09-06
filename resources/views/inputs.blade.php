@extends('templates/layout')

@section('container')

    <hr/>

    @input
    @slot('up')
        {!! Form::open(['route'=>'formFetcher']) !!}
    @endslot

    @slot('left')
        <b>Acceptable Keywords</b>
        <div class="form-group">
            {!! Form::label ('acceptKeywordsBody','Enter acceptable keywords for body') !!}
            {!! Form::textarea('acceptKeywordsBody','',['rows'=>'1']) !!}
        </div>
        <div class="form-group">
            {!! Form::label ('acceptKeywordsOther','Enter acceptable keywords for other page element') !!}
            {!! Form::textarea('acceptKeywordsOther','',['rows'=>'1']) !!}
        </div>
        <b>Rejectable Keywords</b>
        <div class="form-group">
            {!! Form::label ('rejectKeywordsBody','Enter rejectable keywords for body') !!}
            {!! Form::textarea('rejectKeywordsBody','',['rows'=>'1']) !!}
        </div>
        <div class="form-group">
            {!! Form::label ('rejectKeywordsOther','Enter rejectable keywords for other page element') !!}
            {!! Form::textarea('rejectKeywordsOther','',['rows'=>'1']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('links','Enter single links') !!}
            {!! Form::textarea('links','',['rows'=>'1']) !!}
        </div>
        <b> Pagination</b>
        <div class="form-group">
            {!! Form::label('pagination_links','Enter pagination based links') !!}
            {!! Form::textarea('pagination_links','',['rows'=>'1']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Pagination','Pagination limiters') !!}
            {!! Form::text('Pagination') !!}
        </div>


    @endslot

    @slot('right')

    <b>Selectors</b>
        <div class="form-group">
            {!! Form::label('querySelectorBody', 'Query Selector - main body for example') !!}
            {!! Form::text('querySelectorBody') !!}
        </div>
        <div class="form-group">
            {!! Form::label('querySelectorOther', 'Query Selector - header for example') !!}
            {!! Form::text('querySelectorOther') !!}
        </div>

    <b>PRCE match</b>
        <div class="form-group">
            {!! Form::label('PRCE','Select or add your PRCE flags') !!}
            {!! Form::radio('PRCE',"$email_PRCE_pattern",'',['data-id'=>'PRCE_radio']) !!}
            {!! Form::radio('PRCE','customPRCE','',['id'=>'customPRCE']) !!}
            <span id="customPRCE_Wrapper" class="hiddenElement"></span>
        </div>

    <b>Additional Rules</b>
        <div class="form-group">
            {!! Form::label('contentLength','Enter content length') !!}
            {!! Form::text('contentLength') !!}
        </div>
    @endslot

    @slot('down')
        {!! Form::submit('submit') !!}
        {!! Form::close() !!}
    @endslot

    @endinput

    <hr/>

@endsection