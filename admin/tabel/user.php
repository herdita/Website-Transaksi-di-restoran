<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"> Tabel user </li>
     </ol>
    <div class="row">
        <div class="col-12">
            
            <div>
                <span class="font-size-18">Data user<span>
                <div class="pull-right pad-b-2">
                    <a href=""><i class="fa fa-refresh pad-lr-2"></i></a>  
                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus"></i> Tambah user</a>     
                </div>
            </div>
           
            <!-- datatable -->
            <div class="table-responsive pad-tb-5">
            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID_user</th>
                        <th>Nama user</th>
                        <th>Time Create</th>
                        <th>Time Update</th>
                        <th class="text-center"><i class="fa fa-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $database->setTable('user');
                        $data_user = $database->select()->all();
                        foreach($data_user as $user){ ?>
                            <tr>
                                <td> <?php echo $user->id_user;?> </td>
                                <td> <?php echo $user->nama_user;?> </td>    
                                <td> <?php echo $user->tc_user;?> </td>
                                <td> <?php echo $user->tu_user;?> </td>
                                <td class="text-center">
                                    <a id="edit" data-toggle="modal" data-target="#editData" data-iduser="<?php echo $user->id_user;?>" data-namauser="<?php echo $user->nama_user;?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></i>
                                    </a>
                                    <a id="del" data-toggle="modal" data-target="#delData" data-id="<?php echo $user->id_user;?>" data-bantu="<?php echo $user->nama_user;?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Hapus" style="color:white"></i></a> 
                                </td>   
                            </tr>
                        <?php }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID_user</th>
                        <th>Nama user</th>
                        <th>Time Create</th>
                        <th>Time Update</th>
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
                            "targets": 4
                        }],
                        "order": [[ 2, 'desc' ]]
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
                                <label for="validationCustom01">ID user</label>                    
                                <!-- include id-uniq -->
                                <input type="text" name="id_user" class="form-control" value="<?php echo get_uuid('106-',5); ?>" id="validationCustom01" required readonly>
                                <div class="invalid-feedback">
                                    ID user belum di isi.
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="validationCustom02">Nama user</label>
                                <input type="text" name="nama_user" class="form-control" id="validationCustom02" required>
                                <div class="invalid-feedback">
                                    Nama user belum di isi.
                                </div>
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
        $id_user     = trim(mysqli_real_escape_string($con,$_POST['id_user']));
        $nama_user   = trim(mysqli_escape_string($con,$_POST['nama_user']));
        $time_create    = date("Y-m-d H:i:s");
        $time_update    = date("Y-m-d H:i:s");

        $createData = Database::getInstance($server, $user, $pass, $db_name);
        $createData->setTable('user');
        $createData->create([
            'id_user' => $id_user,
            'nama_user' => $nama_user,
            'tc_user' => $time_create,
            'tu_user' => $time_update,
        ]); 
       
        if($createData){ ?> 
            <script>
                mess_success("Data <?php echo " $id_user "?> Berhasil Di Tambahkan","?page=user"); 
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
                                    <label for="id_user">ID user</label>
                                    <input type="text" id="id_user" name="id_user" class="form-control" required readonly>                                    
                                </div>
                                <div class="form-group">
                                    <label for="nama_p">Nama user</label>
                                    <input type="text" id="nama_user" name="nama_user" class="form-control" required>
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
        var iduser = $(this).data('iduser');
        var namauser = $(this).data('namauser');
        $("#modal_edit #id_user").val(iduser);
        $("#modal_edit #nama_user").val(namauser);
    })
</script>

<!-- proses edit data -->
<?php
    if(isset($_POST['edit'])){
        $id_user     = trim(mysqli_real_escape_string($con,$_POST['id_user']));
        $nama_user   = trim(mysqli_escape_string($con,$_POST['nama_user']));
        $time_update    = date("Y-m-d H:i:s");
      
        $editData = Database::getInstance($server, $user, $pass, $db_name);
        $editData->setTable('user');
        $editData->where('id_user', '=', $id_user)->update([
            'nama_user' => $nama_user,
            'tu_user' => $time_update,            
        ]);

        if($editData){ ?> 
            <script>
                mess_success("Data <?php echo " $id_user "?> Berhasil Di ubah","?page=user"); 
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
                        <input type="hidden" id="id_user" name="id_user" class="form-control" required readonly>  
                        <span> Apakah Anda yakin ingin menghapus data ini !!! Sebelumnya Pastikan relasi dari table ini </span><br>
                        <span> ID user -> <input type="text" id="view_id" class="btn-default" style="border:none;" readonly> </span><br>
                        <span> nama user -> <input type="text" id="view_bantu" class="btn-default" style="border:none; width:200px" readonly> </span>
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
        $("#modal_del #id_user").val(id);
        $("#modal_del #view_id").val(id);
        $("#modal_del #view_bantu").val(bantu);
    })
</script>

<!-- proses delete data -->
<?php
    if(isset($_POST['del'])){
        $id_user = trim(mysqli_real_escape_string($con,$_POST['id_user']));
      
        $delData = Database::getInstance($server, $user, $pass, $db_name);
        $delData->setTable('user');
        $delData->where('id_user', '=', $id_user)->delete();

        if($delData){ ?> 
            <script>
                mess_success("Data <?php echo " $id_user "?> Berhasil Di Delete","?page=user"); 
            </script>
        <?php
        }

    }
?>
