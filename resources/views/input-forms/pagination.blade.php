{!! Form::open(['route'=>'paginationFetch']) !!}

@include('partials/inputForm/keywords')
@include('partials/inputForm/selectors')
@include('partials/inputForm/pagination')

<section class="submitForm formRowElements">
    {!! Form::submit('submit') !!}
    {!! Form::close() !!}
</section>
