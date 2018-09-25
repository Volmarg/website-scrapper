{!! Form::open(['route'=>'formFetcher']) !!}

@include('partials/inputForm/keywords')
@include('partials/inputForm/selectors')

<section class="submitForm formRowElements">
    {!! Form::submit('submit') !!}
    {!! Form::close() !!}
</section>
