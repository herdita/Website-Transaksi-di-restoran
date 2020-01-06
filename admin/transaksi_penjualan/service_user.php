<?php
    require_once "../../_config/config.php";
    // $_GET['id'] from data.php ajax
    $id = $_GET['nama'];
    $query_id   =" SELECT * FROM penjualan INNER JOIN user ON penjualan.id_user = user.id_user WHERE penjualan.nama_pemesan='$id' ";

    $sql_id     = mysqli_query($con,$query_id);
    $row_json   = mysqli_fetch_array($sql_id);

    // convert to Json
    echo json_encode($row_json);
?>