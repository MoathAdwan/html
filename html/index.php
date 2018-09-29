<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Encode From MP4 to MP3 System</h1>
            <button id="btn-add" class="btn btn-primary">Add new</button>
            <br><br>
            <table id="files-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>IFileName</th>
                    <th>IFilePath</th>
                    <th>OFileName</th>
                    <th>OFilePath</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>

            </table>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="filesModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="filesForm" action="actions.php" method="post" enctype="multipart/form-data" >
                        <div class="input-group">
                            <input id="file" type="file" name="file" accept=".mp4" required>
                            <input type="hidden" name="id" value="">
                        </div>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button id="formSubmit" type="button" class="btn btn-primary" >Save</button>
                </div>

            </div>
        </div>
    </div>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/datatables.min.js"></script>
<script src="js/jquery.form.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>