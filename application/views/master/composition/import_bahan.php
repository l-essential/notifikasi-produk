<a href="#modal-form" role="button" data-toggle="modal" class="btn btn-white btn-danger btn-bold"  title="Import Produk" style="margin-top:5;padding:5px;">
    <i class="ace-icon fa fa-download"></i>
Import Bahan
</a> 

<!-- modal -->
<div id="modal-form" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="width:750px;">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="white">&times;</span>
                    </button>
                    IMPORT BAHAN BY CSV
                </div>
            </div>
            <div class="modal-body" style="color:black;">
                <form method="POST" action="<?php echo base_url(); ?>master/composition/import_bahan" enctype="multipart/form-data">
                    <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
                    <h3 style="margin-top: 0px; margin-bottom: 20px;text-align:center;"> 
                        Format kolom yang benar 
                    </h3>
                    <div class="form-group">
                        <div>
                            <select class="form-control chosen-select" name="id_produk" width="750px" data-parsley-required="true" data-placeholder="Pilih Nama Produk........">
                            <option></option>
                            <?php $bahan = $this->M_Produk->tbl_produk()->get()->result();
                               foreach ($bahan as $key => $value):?>
                                <option value="<?= $value->id_produk?>"><?= $value->nama_produk?></option>
                               <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-md-offset-4"><strong style="text-align:center;"><span id="merah">----- Untuk Detail Bahan -----</span></strong></label><br>
                        <strong> ID PRODUK </strong>:    BIARAKAN KOSONG DAN PILIH PRODUK DIATAS<br>
                        <strong> KODE BAHAN * </strong>: Wajib Diisi <br>
                        <strong> NAMA BAHAN * </strong>: Wajib Diisi <br>
                        <strong> NO. STANDAR BAHAN </strong>: Boleh Diisi atau tidak <br>
                        <strong> PERSEN * </strong>: Wajib Diisi. ISI HANYA BERISI ANGKA ATAU NILAI (KG) <br>
                        <label for="" class="col-md-offset-4"><strong style="text-align:center;"><span id="merah">----- Untuk Detail Mesin -----</span></strong></label><br>
                        <strong> KODE MESIN </strong>: Boleh Dibiarkan Kosong <br>
                        <strong> NAMA MESIN </strong>: Boleh Dibiarkan Kosong <br>
                        <strong> JAM MESIN *</strong>: Wajib Diisi. ISI HANYA BERISI ANGKA ATAU NILAI (Menit) <br>
                        <strong> JAM ORANG *</strong>: Wajib Diisi. ISI HANYA BERISI ANGKA ATAU NILAI (Menit)
                        <p> 
                            <span id="merah"> Download file contoh nya </span>
                            <a href="<?php echo base_url();?>master/composition/unduh_file_import_bahan">
                                <i class="fa fa-download"></i> disini 
                            </a>
                        </p>
                        <div style="margin-top: 20px;">
                            <input type="file" name="file_url_bahan" onchange="cek_import_bahan()">
                        </div>
                        <div id="msg-check-file-bahan" style="display: none;">
                            Hasil check file: 
                            <div class="content" style="margin-top: 15px;">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-margin-top">
                        <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times"></i>
                        Close
                        </button>                     
                        <ul class="pagination pull-right no-margin">
                        <button id="btn-import-save-bahan" style="display: none;" class="btn btn-sm btn-primary pull-left" type="submit">
                        <i class="ace-icon fa fa-check"></i>
                            Simpan
                        </button>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal-loading-bahan">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center">
                Sedang memeriksa format file
                </h5>
            </div>

            <div class="modal-body text-center">
                <img src="<?php echo base_url('assets/img/loading-cat-dance.gif') ?>" alt="loading">
            </div>
        </div>
    </div>
</div>
<script>
function cek_import_bahan()
{
    var obj_file = $("input[name='file_url_bahan']");

if(obj_file.val() != '')
{
    $('#modal-loading-bahan').modal({backdrop: 'static', keyboard: false});
    $('#modal-loading-bahan').modal('show');

    var formImport = obj_file.closest('form')[0];

    $.ajax({
    method: 'POST',
    url: "<?php echo base_url(); ?>" + 'master/composition/check_import_bahan',
    data: new FormData(formImport),
    mimeType: "multipart/form-data",
    cache: false,
    contentType: false,
    processData: false,
    dataType: 'json',
    success: function(res)
    {
        $('#modal-loading-bahan').modal('hide');

        $("#msg-check-file-bahan").css({'display': 'block'});

        var style, status = '';
        var html_tr = '';
        html_tr += "<table class='table table-responsive table-bordered table-padding'> ";
        html_tr += "<tr> ";
        html_tr += "<th> No. </th>";
        html_tr += "<th> ID Produk </th>";
        html_tr += "<th> Nama Bahan </th>";
        html_tr += "<th> Kode Bahan </th>";
        html_tr += "<th> No. Standar Bahan </th>";
        html_tr += "<th> Persen </th>";
        html_tr += "<th> Kode Mesin </th>";
        html_tr += "<th> Nama Mesin </th>";
        html_tr += "<th> Jam Mesin </th>";
        html_tr += "<th> Jam Orang </th>";
        html_tr += "</tr> ";
        if(res.datas !== undefined)
        {
        for (var jeh = 0; jeh < res.datas.length; jeh++)
        {
            html_tr += "<tr> ";
            html_tr += "<td>"+ (jeh+1) +"</td>";
            // id_produk
            status = res.datas[jeh].id_produk_status;
            style = (status === false) ? 'color:red' : '';
            html_tr += "<td style='"+ style +"'> ";
            html_tr += "<div> "+ res.datas[jeh].id_produk +" </div>";
            if(status === false){
                html_tr += "<div> "+ res.datas[jeh].id_produk_message +" </div>";
            }
            html_tr += "</td> ";

            // kode_bahan
            status = res.datas[jeh].kode_bahan_status;
            style = (status === false) ? 'color:red' : '';
            html_tr += "<td style='"+ style +"'> ";
            html_tr += "<div> "+ res.datas[jeh].kode_bahan +" </div>";
            if(status === false){
                html_tr += "<div> "+ res.datas[jeh].kode_bahan_message +" </div>";
            }
            html_tr += "</td> ";

            // nama_bahan
            status = res.datas[jeh].nama_bahan_status;
            style = (status === false) ? 'color:red' : '';
            html_tr += "<td style='"+ style +"'> ";
            html_tr += "<div> "+ res.datas[jeh].nama_bahan +" </div>";
            if(status === false){
                html_tr += "<div> "+ res.datas[jeh].nama_bahan_message +" </div>";
            }
            html_tr += "</td> ";

            // no_standar_bahan
            status = res.datas[jeh].no_standar_bahan_status;
            style = (status === false) ? 'color:red' : '';
            html_tr += "<td style='"+ style +"'> ";
            html_tr += "<div> "+ res.datas[jeh].no_standar_bahan +" </div>";
            if(status === false){
                html_tr += "<div> "+ res.datas[jeh].no_standar_bahan_message +" </div>";
            }
            html_tr += "</td> ";

            // persen
            status = res.datas[jeh].persen_status;
            style = (status === false) ? 'color:red' : '';
            html_tr += "<td style='"+ style +"'> ";
            html_tr += "<div> "+ res.datas[jeh].persen +" </div>";
            if(status === false){
                html_tr += "<div> "+ res.datas[jeh].persen_message +" </div>";
            }
            html_tr += "</td> ";

            // kode_mesin
            status = res.datas[jeh].kode_mesin_status;
            style = (status === false) ? 'color:red' : '';
            html_tr += "<td style='"+ style +"'> ";
            html_tr += "<div> "+ res.datas[jeh].kode_mesin +" </div>";
            if(status === false){
                html_tr += "<div> "+ res.datas[jeh].kode_mesin_message +" </div>";
            }
            html_tr += "</td> ";

            // nama_mesin
            status = res.datas[jeh].nama_mesin_status;
            style = (status === false) ? 'color:red' : '';
            html_tr += "<td style='"+ style +"'> ";
            html_tr += "<div> "+ res.datas[jeh].nama_mesin +" </div>";
            if(status === false){
                html_tr += "<div> "+ res.datas[jeh].nama_mesin_message +" </div>";
            }
            html_tr += "</td> ";

            // jam_mesin
            status = res.datas[jeh].jam_mesin_status;
            style = (status === false) ? 'color:red' : '';
            html_tr += "<td style='"+ style +"'> ";
            html_tr += "<div> "+ res.datas[jeh].jam_mesin +" </div>";
            if(status === false){
                html_tr += "<div> "+ res.datas[jeh].jam_mesin_message +" </div>";
            }
            html_tr += "</td> ";

            // jam_orang
            status = res.datas[jeh].jam_orang_status;
            style = (status === false) ? 'color:red' : '';
            html_tr += "<td style='"+ style +"'> ";
            html_tr += "<div> "+ res.datas[jeh].jam_orang +" </div>";
            if(status === false){
                html_tr += "<div> "+ res.datas[jeh].jam_orang_message +" </div>";
            }
            html_tr += "</td> ";

            html_tr += "</tr> ";
        }
        }
        html_tr += "</table>";
        
        if(res.success == true)
        {
        html_tr += "<p style='color:green'> Format kolom dan isinya sudah benar, file siap untuk di upload  </p>";
        $('#btn-import-save-bahan').css({'display': 'block'});
        }else{
        html_tr += "<p style='color:red'> "+ res.message +" </p>";
        $('#btn-import-save-bahan').css({'display': 'none'});
        }

        $("#msg-check-file-bahan .content").html(html_tr);
    },
    error: function(err)
    {
        $('#modal-loading-bahan').modal('hide');
    }
    });
}
}
</script>
