<?php
    require_once "../../_config/config.php";
    // $_GET['id'] from data.php ajax
    $id = $_GET['id'];
    $query_id   =" SELECT * FROM detail_penjualan INNER JOIN menu ON detail_penjualan.id_menu = menu.id_menu WHERE id_penjualan='$id' ";

    $sql_id     = mysqli_query($con,$query_id);

    $nama = []; $qty = []; $namaQty = [];
    $i = 0;
    while($row_json = mysqli_fetch_array($sql_id)){
        $nama[$i]           = $row_json['nama_menu'];
        $qty[$i]            = $row_json['qty'];
        $sub_harga[$i]      = $row_json['sub_harga'];
        $namaQty[$i]        = ['- '.$qty[$i].' Porsi '.$nama[$i].' = '.$sub_harga[$i]];
        $i++;  
    };
    
    // convert to Json
    echo json_encode($namaQty);

?>