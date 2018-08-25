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