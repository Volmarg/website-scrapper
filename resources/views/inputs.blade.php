@extends('templates/layout')

@section('container')

    <hr/>

    @input
    @slot('up')
        {!! Form::open(['route'=>'formFetcher']) !!}

        <section class="justify-content-center formWrapper">


            @include('partials/inputForm/formOptions')
            @include('partials/inputForm/keywords')
            @include('partials/inputForm/selectors')
            @include('partials/inputForm/searchType')


            <section class="submitForm formRowElements">
                {!! Form::submit('submit') !!}
                {!! Form::close() !!}
            </section>

        </section>


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