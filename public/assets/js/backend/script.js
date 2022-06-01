$("#DTable").DataTable({
    order: [
        [0, 'desc']
    ],
    "language": {
        "lengthMenu": "Show _MENU_",
    },
    "dom": "<'row'" +
        "<'col-6 d-flex align-items-center justify-conten-start'l>" +
        "<'col-6 d-flex align-items-center justify-content-end'f>" +
        ">" +

        "<'table-responsive'tr>" +

        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
});