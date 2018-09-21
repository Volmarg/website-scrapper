<section class="formRow">
    <h3> Additional search </h3>
    <section class="searchTypeForms formRowElements">
    <!--
  <section>
            <b>PRCE match</b>
            <div class="form-group">
                {!! Form::label('PRCE','Select or add your PRCE flags') !!}
    {!! Form::radio('PRCE',"$email_PRCE_pattern",'',['data-id'=>'PRCE_radio']) !!}
    {!! Form::radio('PRCE','customPRCE','',['id'=>'customPRCE']) !!}
            <span id="customPRCE_Wrapper" class="hiddenElement"></span>
        </div>
    </section>
    !-->
        <section>
            <b>Additional Rules</b>
            <div class="form-group">
                {!! Form::label('contentLength','Enter content length') !!}
                {!! Form::text('contentLength') !!}
            </div>
        </section>
    </section>
</section>