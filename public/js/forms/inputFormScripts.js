
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

