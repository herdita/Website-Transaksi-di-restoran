<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
        </li>
    </ol>

    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-success pad-3" id="menu_tersedia" style="cursor: pointer;">
                    <i class="fa fa-file-text-o float-right text-white" style="font-size:350%"></i>
                    <h6 class="text-white text-uppercase m-b-20">Produk yg tersedia</h6>
                    <?php
                        $result_menu_tersedia = $conn->query("SELECT count(ket) AS tersedia FROM menu WHERE ket='tersedia' ");
                        $count_tersedia = $result_menu_tersedia->fetch(PDO::FETCH_OBJ);
                    ?>
                    <h1 class="m-b-20 text-white counter"><?php echo "$count_tersedia->tersedia"?></h1>
                    <span class="text-white">Hari Ini</span>
                </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-warning pad-3" id="menu_habis" style="cursor: pointer;">
                    <i class="fa fa-bar-chart float-right text-white" style="font-size:350%"></i>
                    <h6 class="text-white text-uppercase m-b-20">Produk yg Habis</h6>
                    <?php
                        $result_menu_habis = $conn->query("SELECT count(ket) AS habis FROM menu WHERE ket='habis' ");
                        $count_habis = $result_menu_habis->fetch(PDO::FETCH_OBJ);
                    ?>
                    <h1 class="m-b-20 text-white counter"><?php echo "$count_habis->habis"?></h1>
                    <span class="text-white">Hari Ini </span>
                </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-info pad-3" id="jumlah_pegawai" style="cursor: pointer;">
                    <i class="fa fa-user-o float-right text-white" style="font-size:350%"></i>
                    <h6 class="text-white text-uppercase m-b-20">Karyawan</h6>
                    <?php
                        $result_pegawai = $conn->query("SELECT COUNT(id_pegawai) AS jumlah_pegawai FROM pegawai");
                        $count_pegawai = $result_pegawai->fetch(PDO::FETCH_OBJ);
                    ?>
                    <h1 class="m-b-20 text-white counter"><?php echo "$count_pegawai->jumlah_pegawai"; ?></h1>
                    <span class="text-white">&nbsp</span>
                </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card-box noradius noborder bg-danger pad-3" style="cursor: pointer;">
                    <i class="fa fa-money float-right text-white" style="font-size:350%"></i>
                    <h6 class="text-white text-uppercase m-b-20">Yg belum bayar</h6>
                    <?php
                        $result_status = $conn->query("SELECT COUNT(status) AS jumlah_status FROM penjualan WHERE status='belum bayar' ");
                        $count_status = $result_status->fetch(PDO::FETCH_OBJ);
                    ?>
                    <h1 class="m-b-20 text-white counter"><?php echo "$count_status->jumlah_status" ?></h1>
                    <span class="text-white">Hari ini</span>
                </div>
        </div>
    </div><br>
    <!-- end row -->

    <!-- menu tersedia -->
    <div id="show_menu_tersedia" style="display:none;">
        <h3 class="pad-b-1"><small>Produk yg Tersedia</small></h3>
        <div class="row">
            <?php
                $stat_produk_tersedia = $conn->prepare("SELECT * FROM menu WHERE ket='tersedia' ");
                $stat_produk_tersedia->execute();    
                $data_produk_tersedia = $stat_produk_tersedia->fetchAll(PDO::FETCH_OBJ);
                foreach($data_produk_tersedia as $tersedia){ 
            ?>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <img class="card-img-top" src="img_menu/<?php echo $tersedia->gambar_menu; ?>" alt="Card image cap" style="width:auto; height:130px; object-fit:cover">
                    <h4 class="card-title text-center pad-t-2"><small><?php echo $tersedia->nama_menu; ?></small></h4>
                </div>
            </div>
            <?php }; ?>
        </div>
    </div>

    
    <!-- menu habis -->
    <div id="show_menu_habis" style="display:none;">
        <h3 class="pad-b-1"><small>Produk yg Tersedia</small></h3>
        <div class="row">
            <?php
                $stat_produk_tersedia = $conn->prepare("SELECT * FROM menu WHERE ket='habis' ");
                $stat_produk_tersedia->execute();    
                $data_produk_tersedia = $stat_produk_tersedia->fetchAll(PDO::FETCH_OBJ);
                foreach($data_produk_tersedia as $tersedia){ 
            ?>
            <div class="col-6 col-md-4 col-lg-2">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <img class="card-img-top" src="img_menu/<?php echo $tersedia->gambar_menu; ?>" alt="Card image cap" style="width:auto; height:130px; object-fit:cover">
                    <h4 class="card-title text-center pad-t-2"><small><?php echo $tersedia->nama_menu; ?></small></h4>
                </div>
            </div>
            <?php }; ?>
        </div>
    </div>


    <!-- pegawai -->
    <div id="show_jumlah_pegawai" style="display:none;">
        <h3 class="pad-b-1"><small>Karyawan</small></h3>
        <div class="row">
            <?php
                $statement = $conn->prepare("SELECT * FROM pegawai INNER JOIN jabatan ON pegawai.id_jabatan=jabatan.id_jabatan");
                $statement->execute();    
                $data_pegawai = $statement->fetchAll(PDO::FETCH_OBJ);
                foreach($data_pegawai as $pegawai){ 
            ?>
            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                <div class="card bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header"><?php echo "$pegawai->nama_p ($pegawai->nama_jabatan)";?></div>
                    <div class="card-body">
                        <p class="card-text">ID Pegawai : <?php echo $pegawai->id_pegawai;?></p>
                        <p class="card-text">Username   : <?php echo $pegawai->username;?></p>                    
                    </div>
                </div>
            </div>
            <?php }; ?>
        </div>
    </div>

    
    <!-- _jquery show menu tersedia -->
    <script>
        $(document).ready(function(){
            $("#menu_tersedia" ).click(function() {
                $("#show_menu_tersedia" ).toggle("slow","swing");
                $("#show_jumlah_pegawai" ).hide();
                $("#show_menu_habis").hide();
            });        
        });
    </script>

     <!-- _jquery show menu habis -->
     <script>
        $(document).ready(function(){
            $("#menu_habis" ).click(function() {
                $("#show_menu_habis").toggle("slow","swing");
                $("#show_menu_tersedia" ).hide();
                $("#show_jumlah_pegawai" ).hide();
            });        
        });
    </script>

    <!-- _jquery show jumlah pegawai -->
    <script>
        $(document).ready(function(){
            $("#jumlah_pegawai" ).click(function() {
                $("#show_jumlah_pegawai" ).toggle("slow","swing");
                $("#show_menu_tersedia" ).hide();
                $("#show_menu_habis").hide();
            });        
        });
    </script>
</div>