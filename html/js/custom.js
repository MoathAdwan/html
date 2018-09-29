$(document).ready(function () {
    var table = $('#files-table').DataTable({
        "ajax": "datatable.php",
        "columns": [
            {"data": "ifilename"},
            {"data": "ifilepath"},
            {"data": "ofilename"},
            {"data": "ofilepath"},
            {"data": "status"},
            {
                "data": "file_id",
                "width": "180px",
                "render": function (data, type, row) {
                    return '<button class="btn btn-info btn-sm btn-edit"  data-id="' + data + '">Edit</button>'
                        + ' <button class="btn btn-danger btn-sm btn-delete"  data-id="' + data + '">Delete</button>'
                        + ' <button class="btn btn-success btn-sm btn-encode"  data-id="' + data + '">Encode</button>';
                }
            }
        ]
    });

    $('#btn-add').click(function () {
        $('#filesModal .modal-title').text('Add new file');
        $('#filesModal').modal();
    })

    $('#formSubmit').click(function () {

        $('#filesForm').ajaxSubmit({
            success: function () {
                table.ajax.reload(null, false);
                $('#filesModal').modal('hide');
            }
        })
    });

    $('body').on("click", ".btn-edit", function () {
        $('#filesModal .modal-title').text('Edit file');
        $('#filesModal').modal();
        $('input[name="id"]').val($(this).data('id'));

    });

    $('body').on("click", ".btn-delete", function () {
        var result = confirm('Are you sure you want to delete this file ?');
        if (result) {
            $.ajax({
                url: "actions.php?delete_file_id=" + $(this).data('id'),
                success: function () {
                    table.ajax.reload(null, false);
                }
            })
        }
    })

    $('body').on("click", ".btn-encode", function () {
        $.ajax({
            url: "actions.php?encode_file_id=" + $(this).data('id'),
            success: function () {
                table.ajax.reload(null, false);
            }
        })
    })
});