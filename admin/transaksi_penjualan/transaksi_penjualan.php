<script src="<?=base_url('admin/transaksi_penjualan/_jquery.min.js')?>"></script>
<script src="<?=base_url('admin/transaksi_penjualan/_typeahead.min.js')?>"></script>
<style>
    .focus-off:focus{
        box-shadow: 0px 0px;
    }
    fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
                box-shadow:  0px 0px 0px 0px #000;
    }

    legend.scheduler-border {
        font-size: 1.6em !important;
        font-weight: bold !important;
        text-align: left !important;
    }
</style>
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active"> Teransaksi Penjualan </li>
    </ol><br>
 
    <div class="form-group">  
        <form name="add_" id="add_">  
            <div class="table-responsive">  
                <table>
                    <tr>
                        <td> 
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="background:#d1ecf1">ID :</div>
                                </div>
                                <input type="text" name="id_penjualan" id="id_penjualan" class="form-control" style="width:200px;"/ readonly>      
                            </div>
                        </td>
                        <?php
                            $username_account = $_SESSION['user'];
                            $user = Database::getInstance($server, $user, $pass, $db_name); $user->setTable('pegawai');
                            $username = $user->select()->where('username','=',$username_account)->all();
                            foreach($username as $us){ ?>
                                <td class="pad-lr-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="background:#d1ecf1">Pegawai :</div>
                                        </div>
                                        <input type="text" name="pegawai" value="<?php echo "$us->nama_p"; ?>" class="form-control name_list" style="width:200px;" readonly  />
                                    </div>
                                </td>       
                            <?php
                            }
                        ?>
                    </tr>
                </table> <br>

                <table class="table table-bordered" id="dynamic_field">
                    <tr style="background:#dfe4ea">
                        <th>Nama Pemesan</th>
                        <th>Meja</th>
                        <th>status</th>
                        <th>Waktu</th>
                    </tr>  
                    <tr>         
                        <td> <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control name_list" autocomplete="off" required/> </td>
                        <td> <input type="text" name="user" id="user" class="form-control name_list" readonly/></td>  
                        <td> <input type="text" name="status" id="status" class="form-control name_list" readonly/></td>  
                        <td> <input type="waktu" name="user" id="waktu" class="form-control name_list" readonly/></td>                          
                    </tr>  
                </table>

                <!-- alert --><br>
                <div class="alert alert-info" role="alert">
                    <div class="input-group d-flex flex-row-reverse">
                        <input type="text" name="total_harga" class="" value=0 id="total_harga" style="width:130px; background-color:transparent; border:none; font-size:18px" readonly required>
                        <div class="input-group-prepend">
                            <div class="input-group-text" style="background-color:transparent; border:none; color:black; font-size:18px">Total Harga : Rp. </div>
                        </div>
                    </div>
                </div>
    
                <!-- form keterangan -->
                <div class="d-flex flex-row flex-lg-row flex-column">
                    <div style="width:400px">
                        <div class="form-group">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border"><small>Menu yang di pesan</small></legend>
                                <table id="menu_pemesan" class="table-responsive pad-lr-2">
                                
                                </table>
                            </fieldset>
                        </div>
                    </div>
                    <div class="ml-auto">
                        <div class="d-flex flex-column">
                            <div class="input-group mb-3" style="margin-bottom: 10px !important">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="background:#d1ecf1; border:0px">Bayar &nbsp &nbsp &nbsp &nbsp</span>
                                </div>
                                <input type="text" id="bayar" class="form-control focus-off" aria-label="Default" style="border:1px solid #d1ecf1">
                            </div>   
                            <div class="input-group mb-3" style="margin-bottom: 10px !important">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="background:#d1ecf1; border:0px">Kembalian</span>
                                </div>
                                <input type="text" class="form-control" id="kembalian" aria-label="Default" style="border:1px solid #d1ecf1" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- submit -->
                <br>
                <div class="pull-right pad-b-2">
                    <!-- <input type="button" name="print" id="print" class="btn btn-md btn-warning" value="Cetak"  style="border-radius:0px; font-size:18px; width:100px;" /> -->
                    <input type="submit" name="submit" id="submit" class="btn btn-md btn-info" value="Simpan"  style="border-radius:0px; font-size:18px; width:100px;" />
                </div>
            </div>  
        </form>  
    </div>

<script>
    $(document).ready(function() {
    }).on('focus','#nama_pemesan',function(){
        $(this).typeahead({
            source: function(query, result) {
                $.ajax({
                    url: "<?=base_url('admin/transaksi_penjualan/fetch.php')?>",
                    method: "POST",
                    data: {
                        query: query
                    },
                    dataType: "json",
                    success: function(data) {
                        result($.map(data, function(item) {
                            return item;
                        }));
                    }
                })
            }
        });
    });
</script>

<!-- form -->
<script>
    $(document).ready(function(){
        $(document).on('change','#nama_pemesan',function(){
            $.ajax({
                url:'<?=base_url('admin/transaksi_penjualan/service_user.php?nama=')?>'+$(this).val(),
                type:'GET',
            }).done(function(data){
                var data = JSON.parse(data);
                if(data == null){
                    $('#id_penjualan').val(null);
                    $('#user').val(null);
                    $('#status').val(null);
                    $('#waktu').val(null);
                    $('#total_harga').val(null);
                    $('#menu_pemesan').empty()
                    menu = false;
                }else{
                    $('#id_penjualan').val(data['id_penjualan']);
                    $('#user').val(data['nama_user']);
                    $('#status').val(data['status']);
                    $('#waktu').val(data['tc_penjualan']);
                    $('#total_harga').val(data['tharga']);
                    menu = true;
                }
            });
        })
    });
</script>

<script>
    $(document).ready(function(){
        $(document).on('change','#nama_pemesan',function(){
                $.ajax({
                    url:'<?=base_url('admin/transaksi_penjualan/service_menu.php?nama=')?>'+$(this).val(),
                    type:'GET',
                }).done(function(data){
                    var data = JSON.parse(data);
                    console.log(data);
                    $('#menu_pemesan').empty()
                    if(menu==true){
                        for(i=0; i < data.length; i++){
                            $('#menu_pemesan').append(`<tr><td>
                                <input type="text" value="${data[i]}" class="btn-default" style=" border:none; width:300px;" readonly>
                            </td></tr>`);
                        }
                    }
                })
            
        })
    })
</script>

<!-- form Pembayaran -->
<script>
    $(document).ready(function(){
        $(document).on('change','#bayar',function(){
            var total_harga = $('#total_harga').val();
            $('#kembalian').val( parseInt($(this).val()) - parseInt(total_harga));
        })          
    });

    $('#submit').click(function(){  
        // console.log($('#nama_barang').val());
        if($('#id_penjualan').val() != null && $('#id_penjualan').val() != "" && $('#status').val() != null){
            $.ajax({  
                url: '<?=base_url('admin/transaksi_penjualan/insert.php')?>',  
                method:"POST",  
                data:$('#add_').serialize(),  
                success:function(data) {  
                    // alert(data);
                    mess_success("transaksi sudah di bayar","transaksi_penjualan.php");
                    window.location.href = "?page=transaksi_penjualan";  
                    // $('#add_')[0].reset();  
                }                     
            })
        }else{
            alert("Data yang anda submit salah");
            window.location.href = "?page=transaksi_penjualan";  
        }
    });  
</script>

</div>

