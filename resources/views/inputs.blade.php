@extends('templates/layout')

@section('container')

    <hr/>

    @input
    @slot('up')


        <section class="justify-content-center formWrapper">
            @include('partials/inputForm/formOptions')

            <div id="formTypeAjaxLoader">
                @include('input-forms/singlePages')
            </div>
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


