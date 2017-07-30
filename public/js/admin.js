$(document).ready(function () {
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/French.json",
        }

    });


    var table = $('#datatables').DataTable();

    // Delete a record
    table.on('click', '.remove', function (e) {
        $tr = $(this).closest('tr');
        table.row($tr).remove().draw();
        e.preventDefault();
    });

    $('.card .material-datatables label').addClass('form-group');

    $('#TypeValidation').validate({
        errorPlacement: function(error, element) {
            $(element).parent('div').addClass('has-error');
        }
    });
});
