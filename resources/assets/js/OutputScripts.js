class OutputScripts {

    constructor() {

    }

    loadOutputScripts() {
        $(document).ready(function () {
            let DataTables = new DataTablesInvoker();

            DataTables.invokeDataTables();
        })
    };

}