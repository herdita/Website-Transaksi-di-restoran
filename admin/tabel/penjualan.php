<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"> Tabel Penjualan </li>
     </ol>
    <div class="row">
        <div class="col-12">
            <div>
                <span class="font-size-18">Data Penjualan<span>
                <div class="pull-right pad-b-2">
                    <a href=""><i class="fa fa-refresh pad-lr-2"></i></a>
                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah Penjualan</a>     
                </div>
            </div>
           
            <!-- datatable -->
            <div class="table-responsive pad-tb-5">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID_Penjualan</th>
                        <th>Nama Pemesan</th>
                        <th>Total Harga</th>
                        <th>ID User</th>
                        <th>Status</th>
                        <th>Time_Create</th>
                        <th>Time_update</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $statement = $conn->prepare("SELECT * FROM penjualan INNER JOIN user ON penjualan.id_user=user.id_user");
                    $statement->execute();    
                    $data_penjualan = $statement->fetchAll(PDO::FETCH_OBJ);
                    // $database->setTable('penjualan');
                    // $data_penjualan = $database->select()->all();
                    foreach($data_penjualan as $penjualan){ ?>
                        <tr>
                            <td> <?php echo $penjualan->id_penjualan;?> </td>  
                            <td> <?php echo $penjualan->nama_pemesan;?> </td>  
                            <td> <?php echo 'Rp '.trim(number_format($penjualan->tharga,0,',','.'));?>  </td>    
                            <td> <?php echo $penjualan->nama_user;?> </td>
                            <td> <?php echo $penjualan->status;?> </td>      
                            <td> <?php echo $penjualan->tc_penjualan;?> </td>
                            <td> <?php echo $penjualan->tu_penjualan;?> </td>
                            <td class="text-center">
                                <a id="detail" data-toggle="modal" data-target="#detailPenjualan" style="color:white" data-idpenjualan="<?php echo $penjualan->id_penjualan;?>" data-pemesan="<?php echo $penjualan->nama_pemesan;?>" data-tharga="<?php echo $penjualan->tharga;?>" data-iduser="<?php echo $penjualan->nama_user;?>" data-status="<?php echo $penjualan->status;?>" class="btn btn-info btn-sm">
                                    <i class="fa fa-file-o" data-toggle="tooltip" data-placement="top" title="Detail Penjualan"></i>&nbsp Detail
                                </a> 
                                <a id="edit" data-toggle="modal" data-target="#editData" data-idpenjualan="<?php echo $penjualan->id_penjualan;?>" data-pemesan="<?php echo $penjualan->nama_pemesan;?>" data-tharga="<?php echo $penjualan->tharga;?>" data-iduser="<?php echo $penjualan->id_user;?>" data-status="<?php echo $penjualan->status;?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></i>&nbsp 
                                </a>
                                <a id="del" data-toggle="modal" data-target="#delData" data-id="<?php echo $penjualan->id_penjualan;?>" data-bantu="<?php echo $penjualan->nama_pemesan;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Hapus" style="color:white"></i>&nbsp </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID_Penjualan</th>
                        <th>Nama Pemesan</th>
                        <th>Total Harga</th>
                        <th>ID User</th>
                        <th>Status</th>
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
                            "targets": 7
                        }],
                        "order": [[ 5, 'desc' ]]
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
            <form action="" method="post" class="needs-validation" novalidate>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- content -->    
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 mb-3 ">
                            <div class="form-group">
                                <label for="validationCustom01">ID Penjualan</label>                    
                                <!-- include id-uniq -->
                                <input type="text" name="id_penjualan" class="form-control" value="<?php echo get_uuid('105-',8); ?>" id="validationCustom01" required readonly>
                
                                <div class="invalid-feedback">
                                    ID Penjalan belum di isi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02">Nama Pemesan</label>
                                <input type="text" name="nama_pemesan" class="form-control" id="validationCustom02" required>
                                <div class="invalid-feedback">
                                    Nama Pemesan Belum Di isi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom03">Total Harga</label>
                                <input type="number" name="tharga" class="form-control" id="validationCustom03" pattern="[0-9]+" required>
                                <div class="invalid-feedback">
                                    Total Harga Harus Di isi dengan Angka.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom04">ID User</label>
                                <select class="custom-select" name="id_user" id="validationCustom04">
                                    <!-- get data to -->
                                    <?php
                                        $database->setTable('user');
                                        $data_user = $database->select()->all(); 
                                        
                                        foreach($data_user as $user){ ?>
                                            <option selected value="<?php echo $user->id_user;?>"><?php echo $user->nama_user;?></option>                                        
                                        <?php } 
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom05">Status</label>
                                <select class="custom-select" name="status" id="validationCustom05">
                                        <option value="Belum Bayar">Belum Bayar</option>
                                        <option value="Sudah Bayar">Sudah Bayar</option>
                                </select>
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
    if(isset($_POST['add'])){
        $id_penjualan       = trim(mysqli_real_escape_string($con,$_POST['id_penjualan']));
        $nama_pemesan       = trim(mysqli_real_escape_string($con,$_POST['nama_pemesan']));
        $tharga             = trim(mysqli_escape_string($con,$_POST['tharga']));
        $id_user            = trim(mysqli_escape_string($con,$_POST['id_user']));
        $status             = trim(mysqli_escape_string($con,$_POST['status']));
        $time_create        = date("Y-m-d H:i:s");
        $time_update        = date("Y-m-d H:i:s");

        $createData = Database::getInstance($server, $user, $pass, $db_name);
        $createData->setTable('penjualan');
        $createData->create([
            'id_penjualan'      => $id_penjualan,
            'nama_pemesan'      => $nama_pemesan,
            'tharga'            => $tharga,
            'id_user'           => $id_user,
            'status'            => $status,
            'tc_penjualan'      => $time_create,
            'tu_penjualan'      => $time_update,
        ]); 
       
        if($createData){ ?> 
            <script>
                mess_success("Data <?php echo " $id_penjualan "?> Berhasil Di Tambahkan","?page=penjualan"); 
            </script>
        <?php
        }
    }
?>


<!-- Modal Edit data -->
<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- form tambah data -->
            <form action="" method="post">
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
                                    <label for="id_penjualan">ID Penjualan</label>
                                    <input type="text" id="id_penjualan" name="id_penjualan" class="form-control" required readonly>                                    
                                </div>
                                <div class="form-group">
                                    <label for="nama_pemesan">Nama Pemesan</label>
                                    <input type="text" id="nama_pemesan" name="nama_pemesan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="tharga">Total Harga</label>
                                    <input type="number" id="tharga" name="tharga" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="id_user">ID User</label>
                                    <select class="custom-select" id="id_user" name="id_user" >
                                        <?php
                                            $database->setTable('user');
                                            $data_user = $database->select()->all(); 
                                            
                                            foreach($data_user as $user){ ?>
                                                <option selected value="<?php echo $user->id_user;?>"><?php echo $user->nama_user;?></option>                                        
                                            <?php } 
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <select class="custom-select" name="status" id="status">
                                        <option value="Belum Bayar">Belum Bayar</option>
                                        <option value="Sudah Bayar">Sudah Bayar</option>
                                    </select>
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
        var idpenjualan = $(this).data('idpenjualan');
        var pemesan     = $(this).data('pemesan');
        var tharga      = $(this).data('tharga');
        var iduser      = $(this).data('iduser');
        var status      = $(this).data('status');
        $("#modal_edit #id_penjualan").val(idpenjualan);
        $("#modal_edit #nama_pemesan").val(pemesan);
        $("#modal_edit #tharga").val(tharga);
        $("#modal_edit #id_user").val(iduser);
        $("#modal_edit #status").val(status);
    })
</script>

<!-- proses edit data -->
<?php
    if(isset($_POST['edit'])){
        $id_penjualan       = trim(mysqli_real_escape_string($con,$_POST['id_penjualan']));
        $nama_pemesan       = trim(mysqli_real_escape_string($con,$_POST['nama_pemesan']));
        $tharga             = trim(mysqli_escape_string($con,$_POST['tharga']));
        $id_user            = trim(mysqli_escape_string($con,$_POST['id_user']));
        $status             = trim(mysqli_escape_string($con,$_POST['status']));
        $time_update        = date("Y-m-d H:i:s");
      
        $editData = Database::getInstance($server, $user, $pass, $db_name);
        $editData->setTable('penjualan');
        $editData->where('id_penjualan', '=', $id_penjualan)->update([
            'nama_pemesan'      => $nama_pemesan,            
            'tharga'            => $tharga,
            'id_user'           => $id_user,
            'status'            => $status,
            'tu_penjualan'      => $time_update,            
        ]);

        if($editData){ ?> 
            <script>
                mess_success("Data <?php echo " $id_penjualan "?> Berhasil Di ubah","?page=penjualan"); 
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
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal_del">
                        <input type="hidden" id="id_penjualan" name="id_penjualan" class="form-control" required readonly>  
                        <span> Apakah Anda yakin ingin menghapus data ini !!! </span><br>
                        <span> ID Penjualan -> <input type="text" id="view_id" class="btn-default" style="border:none;" readonly> </span><br>
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
        $("#modal_del #id_penjualan").val(id);
        $("#modal_del #view_id").val(id);
    })
</script>

<!-- proses delete data -->
<?php
    if(isset($_POST['del'])){
        $id_penjualan = trim(mysqli_real_escape_string($con,$_POST['id_penjualan']));
      
        $delData = Database::getInstance($server, $user, $pass, $db_name);
        $delData->setTable('penjualan');
        $delData->where('id_penjualan','=', $id_penjualan)->delete();

        if($delData){ ?> 
            <script>
                mess_success("Data <?php echo " $id_penjualan "?> Berhasil Di Delete","?page=penjualan"); 
            </script>
        <?php
        }
    }
?>


<!-- Modal detail penjualan -->
<div class="modal fade" id="detailPenjualan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- form tambah data -->
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                    </button>
                </div>
                <div class="modal-body" id="modal_detail">
                    <!-- content -->
                        <table class="table-responsive"> 
                            <tr >
                                <td>ID Penjualan</td>
                                <td class="pad-lr-2"> : </td>
                                <td><input type="text" name="" id="id_penjualan"  class="btn-default" style="border:none;" readonly> </td>
                            </tr>
                            <tr>
                                <td>Pemesan</td>
                                <td class="pad-lr-2"> : </td>
                                <td><input type="text" name="" id="nama_pemesan"  class="btn-default" style="border:none;" readonly></td>
                            </tr>
                            <tr>
                                <td>Meja</td>
                                <td class="pad-lr-2"> : </td>
                                <td><input type="text" name="" id="id_user"  class="btn-default" style="border:none;" readonly></td>
                            </tr>
                            <tr style="padding:15px 0;" >
                                <td style="vertical-align:top;">Yang dipesan</td>
                                <td class="pad-lr-2" style="vertical-align:top;"> : </td>
                                <td style="vertical-align:top;"> <table id="menu_pemesan" class="table-responsive"> </table></td>
                            </tr>
                            <tr>
                                <td>Total Penjualan</td>
                                <td class="pad-lr-2" >:</td>
                                <td><input type="text" name="" id="tharga"  class="btn-default" style="border:none;" readonly></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td class="pad-lr-2"> : </td>
                                <td><input type="text" name="" id="status"  class="btn-default" style="border:none;" readonly></td>
                            </tr>
                        </table>
                    <!--  -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" name="detail" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- proses ajax detail penjualan -->
<script>
    $(document).ready(function(){
        $(document).on("click","#detail",function(){
            var idpenjualan = $(this).data('idpenjualan');
            var pemesan     = $(this).data('pemesan');
            var tharga      = $(this).data('tharga');
            var iduser      = $(this).data('iduser');
            var status      = $(this).data('status');
            $("#modal_detail #id_penjualan").val(idpenjualan);
            $("#modal_detail #nama_pemesan").val(pemesan);
            $("#modal_detail #tharga").val(tharga);
            $("#modal_detail #id_user").val(iduser);
            $("#modal_detail #status").val(status);
            $.ajax({
                url:'<?=base_url('admin/tabel/service_detPenjualan.php?id=')?>'+$(this).data('idpenjualan'),
                type:'GET',
            }).done(function(data){
                var data = JSON.parse(data);
                // console.log(data);

                $("#modal_detail #menu").val(data);
                $('#menu_pemesan').empty()
                for(i=0; i < data.length; i++){
                    $('#menu_pemesan').append(`<tr><td>
                        <input type="text" value="${data[i]}" class="btn-default" style=" border:none; width:300px;" readonly>
                    </td></tr>`);
                }    
            })
        })
    });
</script>


