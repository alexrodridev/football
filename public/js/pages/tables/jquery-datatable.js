$(function () {
    $('.js-basic-example').DataTable({
        responsive: true,
        "language": {
            "lengthMenu": "Mostrando _MENU_ por pagina",
            "zeroRecords": "Nada disponível - desculpe!",
            "info": "Exibindo pagina _PAGE_ de _PAGES_",
            "infoEmpty": "Nada encontrado",
            "infoFiltered": "(Filtrado do total de _MAX_ seguidores)"
        }
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});