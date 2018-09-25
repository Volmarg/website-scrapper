class LayoutSwitcher {

    constructor() {

    }

    switchFormLayout(id) {
        $.get("inputForm-" + id, function (data, status) {
            $("#formTypeAjaxLoader").html(data);
            let TextExtAttach = new TextExtInvoker();
            TextExtAttach.attachTextExtToInputs();
        });

    }

    attachClickEvent() {

        $('button').each(function () {
            $(this).on('click', function () {
                let that = new LayoutSwitcher();
                that.switchFormLayout($(this).attr('id'));
            })
        });
    }

}
