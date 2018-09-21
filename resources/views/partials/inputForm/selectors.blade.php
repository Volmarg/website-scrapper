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