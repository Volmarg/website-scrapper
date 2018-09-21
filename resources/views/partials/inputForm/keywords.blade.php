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