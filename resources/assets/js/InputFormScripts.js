class InputFormScripts{

    constructor() {

    }

    loadInputFormScripts() {
        $(document).ready(function () {
            let LayoutSwitch = new LayoutSwitcher();
            let TextExtAttach = new TextExtInvoker();

            LayoutSwitch.attachClickEvent();
            TextExtAttach.attachTextExtToInputs();
        })
    };

}

