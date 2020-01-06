<?php
   
    // $con = mysqli_connect("localhost", "root", "", "test_db");
    require_once "../../_config/config.php";
    require_once "../../models/database.php";


        $status             = 'Sudah Bayar';
        $id_penjualan       = trim(mysqli_real_escape_string($con,$_POST['id_penjualan']));
        $time_update        = date("Y-m-d H:i:s");
      
        $editData = Database::getInstance($server, $user, $pass, $db_name);
        $editData->setTable('penjualan');
        $editData->where('id_penjualan', '=', $id_penjualan)->update([
            'status'            => $status,
            'tu_penjualan'      => $time_update,            
        ]);

        if($editData){ ?> 
            <script>
                mess_success("Data <?php echo " $id_penjualan "?> Berhasil Di ubah","?page=penjualan"); 
            </script>
            <?php
        }


?> 