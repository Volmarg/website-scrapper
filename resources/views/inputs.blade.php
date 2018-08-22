@extends('templates/layout')

@section('container')

    @input
    @slot('up')
        {!! Form::open(['route'=>'curler']) !!}
    @endslot

    @slot('left')
        <div class="form-group">
            {!! Form::label ('keywords','Enter acceptable keywords') !!}
            {!! Form::textarea('keywords') !!}
        </div>
        <div class="form-group">
            {!! Form::label('links','Enter links') !!}
            {!! Form::textarea('links') !!}
        </div>
    @endslot

    @slot('right')
        <div class="form-group">
            {!! Form::label('querySelector', 'Query Selector - main body for example') !!}
            {!! Form::text('querySelector') !!}
        </div>
        <div class="form-group">
            {!! Form::label('contentLength','Enter minimum length of content') !!}
            {!! Form::text('contentLength') !!}
        </div>
        <div class="form-group">
            {!! Form::label('PRCE','Select or add your PRCE flags') !!}
            {!! Form::radio('PRCE','opcja 1') !!}
            {!! Form::radio('PRCE','opcja 2') !!}
            {!! Form::radio('PRCE','opcja 3',['id'=>'prceCustom ']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('Pagination','Pagination limiters') !!}
            {!! Form::text('Pagination') !!}
        </div>
    @endslot

    @slot('down')
        {!! Form::close() !!}
    @endslot

    @endinput

@endsection