<?php
//fetch.php
    require_once "../../_config/config.php";
    $request = mysqli_real_escape_string($con, $_POST["query"]);
    $tc_awal  = date('Y-m-d').'10:20:45';
    $tc_akhir = date('Y-m-d').'23:59:59';
    $query = "
        SELECT * FROM penjualan WHERE status='belum bayar' and nama_pemesan LIKE '%".$request."%'
    ";

    $result = mysqli_query($con, $query);

    $data = array();

    if(mysqli_num_rows($result) > 0)
    {
    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row["nama_pemesan"];
    }
    echo json_encode($data);
    }

?>
