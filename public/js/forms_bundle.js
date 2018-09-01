function formEvents(){

    this.insertCustomPRCEField=function(targets,events){

          $(targets.radioID).on('click',function(){
            $(targets.wrapperID) .css('display','block')
                .html(targets.elementToInsert);

              events.copyInput_toRadio(
                  targets.inputID,
                  targets.radioID
              );
        });
    }

    this.removeCustomPRCEField=function(clickTarget,removeTarget){
            $(clickTarget).each(function () {
                $(this).on('click',function () {
                    $(removeTarget).html('');
                })
            })
        }

    this.copyUserInsertedPRCE=function(copyFrom,copyInto){
        $(copyFrom).on('input',function () {
            $(copyInto).val($(this).val());
        })

    }

}
function htmlElements(){

    this.input=function(){
        var inputElement=$('<input name="PRCE" id="customPRCE_Input" placeholder="insert custom PRCE">');
        return inputElement;
    }


}

function customPRCE_FieldEvents(){
    var elements = new htmlElements();
    var events = new formEvents();
    var wrapperID='#customPRCE_Wrapper';
    var radioID='#customPRCE';

    events.insertCustomPRCEField(
        {
            'radioID': radioID,
            'wrapperID': wrapperID,
            'inputID': '#customPRCE_Input',
            'elementToInsert': elements.input()
        },
        {
            'copyInput_toRadio':events.copyUserInsertedPRCE
        }
    );

    events.removeCustomPRCEField('[data-id^="PRCE_radio"]',wrapperID);


}


function loadInputFormScripts() {
    customPRCE_FieldEvents();
};
