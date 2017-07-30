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
        var id = $(this).data("id");
        var token = $(this).data("token");
        var tr = $(this).closest('tr');
        swal({
            title: 'Êtes-vous sur ?',
            text: "C'est une suppression définitive !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler',
            buttonsStyling: false
        }).then(function () {
            $.ajax({
                url: "/admin/articles/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_method": 'DELETE',
                    "_token": token,
                },
                success: function () {
                    table.row(tr).remove().draw();
                    e.preventDefault();
                    $.notify({
                        icon: "done",
                        message: "Article supprimé"

                    },{
                        type: "success",
                        timer: 3000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                },
                fail: function () {
                    $.notify({
                        icon: "danger",
                        message: "Erreur : article non supprimé"

                    },{
                        type: "danger",
                        timer: 3000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        }
                    });
                }
            });
        });


    });

    $('.card .material-datatables label').addClass('form-group');

    $('#TypeValidation').validate({
        errorPlacement: function (error, element) {
            $(element).parent('div').addClass('has-error');
        }
    });
});
