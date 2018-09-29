<?php
include 'db_conn.php';
$_selectFilesQuery = "SELECT * FROM tbl_files";
$_filesQueryResult = mysqli_query($conn,$_selectFilesQuery);
$rows=array();
while ($row= mysqli_fetch_assoc($_filesQueryResult)) {
    $rows[] = $row;
}
$_jsonArray['data'] = $rows;
echo json_encode($_jsonArray);