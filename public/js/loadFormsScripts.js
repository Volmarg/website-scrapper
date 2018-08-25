
function loadInputFormScripts() {
    $.getScript("/js/forms/lib/htmlElements.js", function () {
        $.getScript("/js/forms/lib/formEvents.js", function () {
            $.getScript("/js/forms/inputFormScripts.js", function () {

                customPRCE_FieldEvents();
            });
        });
    })
};
