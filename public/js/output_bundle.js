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
class DataTablesInvoker {

    constructor() {

    }

    invokeDataTables() {
        $(document).ready(function () {

            //Enabling fileds filtering in dataTable
            $('#example thead tr').clone(true).appendTo('#example thead');
            $('#example thead tr:eq(1) th').each(function (i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');

                $('input', this).on('keyup change', function () {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });

            // attaching dataTable with options to given table
            var table = $('#fast_report_table').dataTable({
                "orderCellsTop": true,
                "fixedHeader": true,
                dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel', 'pdf'
                ],
                "pageLength": 10,
                "language": {
                    "processing": "Przetwarzanie...",
                    "search": "Szukaj:",
                    "lengthMenu": "Pokaż _MENU_ pozycji",
                    "info": "Pozycje od _START_ do _END_ z _TOTAL_ łącznie",
                    "infoEmpty": "Pozycji 0 z 0 dostępnych",
                    "infoFiltered": "(filtrowanie spośród _MAX_ dostępnych pozycji)",
                    "infoPostFix": "",
                    "loadingRecords": "Wczytywanie...",
                    "zeroRecords": "Nie znaleziono pasujących pozycji",
                    "emptyTable": "Brak danych",
                    "paginate": {
                        "first": "Pierwsza",
                        "previous": "Poprzednia",
                        "next": "Następna",
                        "last": "Ostatnia"
                    },
                    "aria": {
                        "sortAscending": ": aktywuj, by posortować kolumnę rosnąco",
                        "sortDescending": ": aktywuj, by posortować kolumnę malejąco"
                    }
                }
            });
        });
    }
}