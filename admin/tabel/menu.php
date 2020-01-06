<div class="container-fluid">
    <!-- Breadcrumbs-->
    
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"> Tabel menu </li>
     </ol>
    <div class="row">
        <div class="col-12">
            <div>
                <span class="font-size-18">Data menu<span>
                <div class="pull-right pad-b-2">
                    <a href=""><i class="fa fa-refresh pad-lr-2"></i></a>
                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah menu</a>     
                </div>
            </div>
            <img src="jahe.jpg" alt="">
            <!-- datatable -->
            <div class="table-responsive pad-tb-5">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID_menu</th>
                        <th>Nama_menu</th>
                        <th>Harga</th>
                        <th>Id_kategori</th>
                        <th>Ket</th>
                        <th>Foto</th>
                        <th>Time_Create</th>
                        <th>Time_update</th>
                        <th class="text-center"><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $statement = $conn->prepare("SELECT * FROM menu INNER JOIN kategori ON menu.id_kategori=kategori.id_kategori");
                        $statement->execute();    
                        $data_menu = $statement->fetchAll(PDO::FETCH_OBJ);

                        // $database->setTable('menu');
                        // $data_menu = $database->select()->all();
                        foreach($data_menu as $menu){ ?>
                            <tr>
                                <td> <?php echo $menu->id_menu;?> </td>
                                <td> <?php echo $menu->nama_menu;?> </td>
                                <td align="right"> <?php echo 'Rp '.trim(number_format($menu->harga_menu,0,',','.'));?> </td>       
                                <td> <?php echo $menu->nama_kategori;?> </td>
                                <td> <?php echo $menu->ket;?> </td>
                                <td align="center"> <img src="img_menu/<?php echo $menu->gambar_menu?>" alt="" style="width:100px; height:80px; object-fit:cover"> </td>      
                                <!-- <td align="center"> <?php echo $menu->gambar_menu ?> </td>  -->
                                <td> <?php echo $menu->tc_menu;?> </td>
                                <td> <?php echo $menu->tu_menu;?> </td>
                                <td class="text-center">
                                    <a id="edit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editData" data-idmenu="<?php echo $menu->id_menu;?>" data-namamenu="<?php echo $menu->nama_menu;?>" data-hargamenu="<?php echo $menu->harga_menu;?>" data-idkategori="<?php echo $menu->id_kategori;?>" data-ket="<?php echo $menu->ket;?>" data-gambarmenu="<?php echo $menu->gambar_menu;?>">
                                        <i class="fa fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                    </a>
                                    <a id="del"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delData" data-id="<?php echo $menu->id_menu;?>" data-bantu="<?php echo $menu->nama_menu;?>"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Hapus" style="color:white"></i></a>            
                                </td>   
                            </tr>
                        <?php }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID_menu</th>
                        <th>Nama_menu</th>
                        <th>Harga</th>
                        <th>Id_kategori</th>
                        <th>Ket</th>
                        <th>Gambar</th>
                        <th>Time_Create</th>
                        <th>Time_update</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
            </div>
            
            <script>
                $(document).ready(function() {
                    $('#datatable').DataTable( {
                        "columnDefs": [{
                            "searchable": false,
                            "orderable": false,
                            "targets": 8
                        }],
                        "order": [[ 6, 'desc' ]]
                    });
                });
            </script>
        </div>
    </div>
</div>

<!-- Modal tambah data -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- form tambah data -->
            <form action="" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- content -->    
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 mb-3 ">
                            <div class="form-group">
                                <label for="validationCustom01">ID menu</label>                    
                                <!-- include id-uniq -->
                                <input type="text" name="id_menu" class="form-control" value="<?php echo get_uuid('103-',5); ?>" id="validationCustom01" required readonly>
                                <div class="invalid-feedback">
                                    ID menu belum di isi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02">Nama menu</label>
                                <input type="text" name="nama_menu" class="form-control" id="validationCustom02" required>
                                <div class="invalid-feedback">
                                    Nama menu belum di isi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom03">Harga menu</label>
                                <input type="text" name="harga_menu" class="form-control" id="validationCustom03" pattern="[0-9]+" required>
                                <div class="invalid-feedback">
                                    Harga menu Harus di isi dengan Angka.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom04">ID_kategori</label>
                                <select class="custom-select" name="id_kategori" id="inputGroupSelect01">
                                    <!-- get data to t_jabatan -->
                                    <?php
                                        $database->setTable('kategori');
                                        $data_kategori = $database->select()->all(); 
                                        
                                        foreach($data_kategori as $kategori){ ?>
                                            <option selected value="<?php echo $kategori->id_kategori;?>"><?php echo $kategori->nama_kategori;?></option>                                        
                                        <?php } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Keterangan</label>
                                <select class="custom-select" name="ket" id="ket">
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Habis">Habis</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom06">Gambar</label>
                                <input type="file" name="gambar_menu" class="form-control" id="gambar_menu" required>
                            </div>
                        </div>
                    </div>           
                    <!--  -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" name="add" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// validation form Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<!-- proses add data -->
<?php
    // define ('SITE_ROOT', realpath(dirname(__FILE__))."../../../_assets/images/img_menu/");
    if(isset($_POST['add'])){
        $id_menu      = trim(mysqli_real_escape_string($con,$_POST['id_menu']));
        $nama_menu    = trim(mysqli_escape_string($con,$_POST['nama_menu']));
        $harga_menu   = trim(mysqli_escape_string($con,$_POST['harga_menu']));
        $id_kategori  = trim(mysqli_escape_string($con,$_POST['id_kategori']));
        $ket          = trim(mysqli_escape_string($con,$_POST['ket']));
        
        $time_create  = date("Y-m-d H:i:s");
        $time_update  = date("Y-m-d H:i:s");

        $extensi      = explode('.', $_FILES['gambar_menu']['name']);
        $gambar_menu  = "menu-".round(microtime(true)).".".end($extensi);
        $sumber       = $_FILES['gambar_menu']['tmp_name'];
        $upload       = move_uploaded_file($sumber, "img_menu/".$gambar_menu);
        // die(var_dump($upload));
        if($upload){
            $createData = Database::getInstance($server, $user, $pass, $db_name);
            $createData->setTable('menu');
            $createData->create([
            'id_menu'       => $id_menu,
            'nama_menu'     => $nama_menu,
            'harga_menu'    => $harga_menu,
            'id_kategori'   => $id_kategori,
            'ket'           => $ket,
            'gambar_menu'   => $gambar_menu,
            'tc_menu'       => $time_create,
            'tu_menu'       => $time_update,
            ]); ?>
            <script>
                mess_success("Data <?php echo " $nama_menu "?> Berhasil Di Tambahkan","?page=menu"); 
            </script><?php
        }else{ ?>
            <script>
                 mess_warning("Data <?php echo " $nama_menu "?> Gagal Di Tambahkan","?page=menu"); 
            </script><?php
        }

    }
?>


<!-- Modal Edit data -->
<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- form tambah data -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_edit">
                    <!-- content -->    
                        <div class="row justify-content-md-center">
                            <div class="col-md-12 mb-3 ">
                                <div class="form-group">
                                    <label for="id_menu">ID menu</label>
                                    <input type="text" id="id_menu" name="id_menu" class="form-control" required readonly>                                    
                                </div>
                                <div class="form-group">
                                    <label for="nama_menu">Nama menu</label>
                                    <input type="text" id="nama_menu" name="nama_menu" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga_menu">Harga menu</label>
                                    <input type="text" id="harga_menu" name="harga_menu" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_kategori">ID Kategori</label>
                                    <select class="custom-select" name="id_kategori" id="inputGroupSelect01">
                                        <!-- get data to t_jabatan -->
                                        <?php
                                            $database->setTable('kategori');
                                            $data_kategori = $database->select()->all(); 
                                            
                                            foreach($data_kategori as $kategori){ ?>
                                                <option selected value="<?php echo $kategori->id_kategori;?>"><?php echo $kategori->nama_kategori;?></option>                                        
                                            <?php } 
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="ket">Keterangan</label>
                                    <select class="custom-select" name="ket" id="ket">
                                        <option value="Tersedia">Tersedia</option>
                                        <option value="Habis">Habis</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_menu">Gambar</label>
                                    <div> <img src="" alt="" style="width:100px; height:80px; object-fit:cover; padding-bottom:10px;" id="pict"> </div>
                                    <input type="file" name="gambar_menu" class="form-control" id="gambar_menu">
                                </div>
                            </div>
                        </div>  
                    <!--  -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" name="edit" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- proses ajax Edit data -->
<script>
    $(document).on("click","#edit",function(){
        var idmenu      = $(this).data('idmenu');
        var namamenu    = $(this).data('namamenu');
        var hargamenu   = $(this).data('hargamenu');
        var idkategori  = $(this).data('idkategori');
        var ket         = $(this).data('ket');
        var gambarmenu  = $(this).data('gambarmenu');
        $("#modal_edit #id_menu").val(idmenu);
        $("#modal_edit #nama_menu").val(namamenu);
        $("#modal_edit #harga_menu").val(hargamenu);
        $("#modal_edit #id_kategori").val(idkategori);
        $("#modal_edit #ket").val(ket);
        $("#modal_edit #pict").attr("src","img_menu/"+gambarmenu);
    })
</script>

<!-- proses edit data -->
<?php
    if(isset($_POST['edit'])){
        $id_menu       = trim(mysqli_real_escape_string($con,$_POST['id_menu']));
        $nama_menu     = trim(mysqli_escape_string($con,$_POST['nama_menu']));
        $harga_menu    = trim(mysqli_escape_string($con,$_POST['harga_menu']));
        $id_kategori   = trim(mysqli_escape_string($con,$_POST['id_kategori']));
        $ket           = trim(mysqli_escape_string($con,$_POST['ket']));
        $time_update   = date("Y-m-d H:i:s");

        $editData = Database::getInstance($server, $user, $pass, $db_name);
        $editData->setTable('menu');
        
        // die(var_dump("sdf".".".end(explode('.',$gambar_menu))));
        // die(var_dump($_FILES['gambar_menu']['tmp_name']));
        if($_FILES['gambar_menu']['name'] == ""){ 
            $editData->where('id_menu', '=', $id_menu)->update([
                'nama_menu'     => $nama_menu,
                'harga_menu'    => $harga_menu,
                'id_kategori'   => $id_kategori,
                'ket'           => $ket,
                'tu_menu'       => $time_update,            
            ]);
        }else{
            $extensi      = explode('.', $_FILES['gambar_menu']['name']);
            $gambar_menu  = "menu-".round(microtime(true)).".".end($extensi);
            $sumber       = $_FILES['gambar_menu']['tmp_name'];

            $database->setTable('menu');
            $data_menu = $database->select()->where('id_menu','=',$id_menu)->all();
            foreach($data_menu as $menu){ 
                $gambar_awal = $menu->gambar_menu; 
            };

            unlink('img_menu/'.$gambar_awal);

            $upload       = move_uploaded_file($sumber, "img_menu/".$gambar_menu);
            $editData->where('id_menu', '=', $id_menu)->update([
                'nama_menu'     => $nama_menu,
                'harga_menu'    => $harga_menu,
                'id_kategori'   => $id_kategori,
                'ket'           => $ket,
                'gambar_menu'   => $gambar_menu,
                'tu_menu'       => $time_update,            
            ]);
        }
        

        if($editData){ ?> 
            <script>
                mess_success("Data <?php echo " $id_menu "?> Berhasil Di ubah","?page=menu"); 
            </script>
        <?php
        }
    }
?>




<!-- Modal delete data -->
<div class="modal fade" id="delData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- form tambah data -->
            <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_del">
                        <input type="hidden" id="id_menu" name="id_menu" class="form-control" required readonly>  
                        <span> Apakah Anda yakin ingin menghapus data ini !!! </span><br>
                        <span> ID menu -> <input type="text" id="view_id" class="btn-default" style="border:none;" readonly> </span><br>
                        <span> nama menu -> <input type="text" id="view_bantu" class="btn-default" style="border:none; width:200px" readonly> </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" name="del" type="submit">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- proses ajax del data -->
<script>
    $(document).on("click","#del",function(){
        var id = $(this).data('id');
        var bantu = $(this).data('bantu');
        $("#modal_del #id_menu").val(id);
        $("#modal_del #view_id").val(id);
        $("#modal_del #view_bantu").val(bantu);
    })
</script>

<!-- proses delete data -->
<?php
    if(isset($_POST['del'])){
        $id_menu = trim(mysqli_real_escape_string($con,$_POST['id_menu']));
      
        $database->setTable('menu');
        $data_menu = $database->select()->where('id_menu','=',$id_menu)->all();
        foreach($data_menu as $menu){ 
            $gambar_awal = $menu->gambar_menu; 
        };

        unlink('img_menu/'.$gambar_awal);

        $delData = Database::getInstance($server, $user, $pass, $db_name);
        $delData->setTable('menu');
        $delData->where('id_menu', '=', $id_menu)->delete();

      

        if($delData){ ?> 
            <script>
                mess_success("Data <?php echo " $id_menu "?> Berhasil Di Delete","?page=menu"); 
            </script>
        <?php
        }
    }
?>
