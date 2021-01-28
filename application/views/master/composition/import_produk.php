<a a href="#modal-import-produk" role="button" data-toggle="modal" class="btn btn-white btn-danger btn-bold"  title="Import Produk" style="margin-top:5;padding:5px;">
    <i class="ace-icon fa fa-download"></i>
Import Produk
</a>

<!-- modal -->
<div id="modal-import-produk" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="<?php echo base_url(); ?>master/composition/import_produk" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header no-padding">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <span class="white">&times;</span>
                        </button>
                        IMPORT PRODUK BY CSV
                    </div>
                </div>
                <div class="modal-body" style="color:black;">
                    <h3 style="margin-top: 0px; margin-bottom: 20px;"> 
                        Format kolom yang benar adalah: 
                    </h3>
                    <p>  
                    <strong> NAMA PRODUK* </strong>: Wajib Diisi
                    </p>
                    <p>  
                    <strong> KODE PRODUK* </strong>: Wajib Diisi
                    </p>
                    <p>  
                    <strong> NO. MC* </strong>: Wajib Diisi
                    </p>
                    <p>  
                    <strong> BATCH SIZE* </strong>: Wajib Diisi. ISI CUMA BERISI ANGKA ATAU NILAI (KG)
                    </p>
                    <p> 
                    Download file contoh nya 
                    <a href="<?php echo base_url();?>master/composition/unduh_file_import">
                        <i class="fa fa-download"></i> disini 
                    </a>
                    </p>
                    <div style="margin-top: 20px;">
                        <input type="file" name="file_url" onchange="modulCheckImport()">
                    </div>
                    <hr>
                    <div id="msg-check-file" style="display: none;">
                    Hasil check file: 
                    <div class="content" style="margin-top: 15px;"></div>
                    </div>
                </div>
                <div class="modal-footer no-margin-top">
                    <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Close
                    </button>                     

                    <ul class="pagination pull-right no-margin">
                    <button id="btn-import-save" style="display: none;" class="btn btn-sm btn-primary pull-left" type="submit">
                    <i class="ace-icon fa fa-check"></i>
                        Simpan
                    </button>
                    </ul>
                </div>
            </div>
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- PAGE CONTENT ENDS -->
<div class="modal" tabindex="-1" role="dialog" id="modal-loading">
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
function modulCheckImport()
{
    var obj_file = $("input[name='file_url']");

    if(obj_file.val() != '')
    {
        $('#modal-loading').modal({backdrop: 'static', keyboard: false});
        $('#modal-loading').modal('show');

        var formImport = obj_file.closest('form')[0];

        $.ajax({
        method: 'POST',
        url: "<?php echo base_url(); ?>" + 'master/composition/check_import',
        data: new FormData(formImport),
        mimeType: "multipart/form-data",
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(res)
        {
            $('#modal-loading').modal('hide');

            $("#msg-check-file").css({'display': 'block'});

            var style, status = '';
            var html_tr = '';
            html_tr += "<table class='table table-responsive table-bordered table-padding'> ";
            html_tr += "<tr> ";
            html_tr += "<th> Nama Produk </th>";
            html_tr += "<th> Kode Produk </th>";
            html_tr += "<th> NO. MC </th>";
            html_tr += "<th> Batch Size </th>";
            html_tr += "</tr> ";
            if(res.datas !== undefined)
            {
            for (var jeh = 0; jeh < res.datas.length; jeh++)
            {
                html_tr += "<tr> ";
                // nama_produk
                status = res.datas[jeh].nama_produk_status;
                style = (status === false) ? 'color:red' : '';
                html_tr += "<td style='"+ style +"'> ";
                html_tr += "<div> "+ res.datas[jeh].nama_produk +" </div>";
                if(status === false){
                    html_tr += "<div> "+ res.datas[jeh].nama_produk_message +" </div>";
                }
                html_tr += "</td> ";

                // kode_produk
                status = res.datas[jeh].kode_produk_status;
                style = (status === false) ? 'color:red' : '';
                html_tr += "<td style='"+ style +"'> ";
                html_tr += "<div> "+ res.datas[jeh].kode_produk +" </div>";
                if(status === false){
                    html_tr += "<div> "+ res.datas[jeh].kode_produk_message +" </div>";
                }
                html_tr += "</td> ";

                // no_mc
                status = res.datas[jeh].no_mc_status;
                style = (status === false) ? 'color:red' : '';
                html_tr += "<td style='"+ style +"'> ";
                html_tr += "<div> "+ res.datas[jeh].no_mc +" </div>";
                if(status === false){
                    html_tr += "<div> "+ res.datas[jeh].no_mc_message +" </div>";
                }
                html_tr += "</td> ";

                // batch_size
                status = res.datas[jeh].batch_size_status;
                style = (status === false) ? 'color:red' : '';
                html_tr += "<td style='"+ style +"'> ";
                html_tr += "<div> "+ res.datas[jeh].batch_size +" </div>";
                if(status === false){
                    html_tr += "<div> "+ res.datas[jeh].batch_size_message +" </div>";
                }
                html_tr += "</td> ";

                html_tr += "</tr> ";
            }
            }
            html_tr += "</table>";
            
            if(res.success == true)
            {
            html_tr += "<p style='color:green'> Format kolom dan isinya sudah benar, file siap untuk di upload  </p>";
            $('#btn-import-save').css({'display': 'block'});
            }else{
            html_tr += "<p style='color:red'> "+ res.message +" </p>";
            $('#btn-import-save').css({'display': 'none'});
            }

            $("#msg-check-file .content").html(html_tr);
        },
        error: function(err)
        {
            $('#modal-loading').modal('hide');
        }
        });
    }
}
</script>