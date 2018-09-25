{!! Form::open(['route'=>'formFetcher']) !!}

@include('partials/inputForm/keywords')
@include('partials/inputForm/selectors')
@include('partials/inputForm/searchType')

<section class="submitForm formRowElements">
    {!! Form::submit('submit') !!}
    {!! Form::close() !!}
</section>

