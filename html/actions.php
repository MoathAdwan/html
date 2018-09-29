<?php

include 'db_conn.php';

if (isset($_FILES['file'])) {
    $_ifilepath = "home/input/";
    $_ifilename = basename($_FILES["file"]["name"]);
    if ($_POST['id'] == "") {
        $_addQuery = "INSERT INTO tbl_files (ifilename,ifilepath) VALUES ('$_ifilename','$_ifilepath')";
        if (mysqli_query($conn, $_addQuery)) {
            $_jsonData = array(
                "result" => TRUE,
                "action" => 'add'
            );
            echo json_encode($_jsonData);
        }

    } else {
        $_fileId = $_POST['id'];
        $_editQuery = "UPDATE  tbl_files SET ifilename = '$_ifilename',ifilepath = '$_ifilepath',
ofilename = 'NULL',ofilepath = 'NULL',status='1' WHERE file_id = '$_fileId'";
        if (mysqli_query($conn, $_editQuery)) {
            $_jsonData = array(
                "result" => TRUE,
                "action" => 'edit'
            );
            echo json_encode($_jsonData);
        }
    }

} elseif (isset($_GET['delete_file_id'])) {
    $_fileId = $_GET['delete_file_id'];
    $_deleteQuery = "DELETE FROM tbl_files WHERE file_id='$_fileId'";
    mysqli_query($conn, $_deleteQuery);

} elseif (isset($_GET['encode_file_id'])) {
    $_fileId = $_GET['encode_file_id'];
    $_selectQuery = "SELECT ifilename,ifilepath FROM tbl_files WHERE file_id = '$_fileId'";
    $_selectQueryResult = mysqli_query($conn, $_selectQuery);
    $_fileEntity = mysqli_fetch_assoc($_selectQueryResult);
    $_inputFile = $_fileEntity['ifilepath'] . $_fileEntity['ifilename'];

    $_ofilename = explode('.', $_fileEntity['ifilename']);
    $_ofilepath = 'home/output/';

    $_outputFile = $_ofilepath . $_ofilename[0];

    $command = "ffmpeg -i " . $_inputFile . " -vn -ar 44100 -ac 2 -ab 192 -f mp3 " . $_outputFile . ".mp3 2>&1";
    if (shell_exec($command)) {
        $_editQuery = "UPDATE  tbl_files SET ofilename = '$_ofilename[0].mp3',ofilepath = '$_ofilepath',status = '0'
WHERE file_id = '$_fileId'";
        mysqli_query($conn,$_editQuery);
    }
}


?>

