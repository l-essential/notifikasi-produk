<a a href="#modal-tambah" role="button" data-toggle="modal" class="btn btn-white btn-info btn-bold"  title="Tambah Data" style="margin-top:5;padding:5px;">
    <i class="glyphicon glyphicon-edit"></i>
Tambah
</a>

<!-- modal -->
<div id="modal-tambah" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="<?php echo base_url(); ?>master/composition/tambah" data-parsley-validate="true">
            <div class="modal-content">
                <div class="modal-header no-padding">
                    <div class="table-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="white">&times;</span>
                        </button>
                        Tambah <?= $sub_judul?>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label no-padding-right">Nama Produk<span id="merah">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="ace-icon fa fa-truck"></i>
                            </span>
                            <input type="text" class="form-control" name='nama_produk' id="val-tgl-order" required>
                        </div> 
                    </div> 
                    <div class="form-group">
                        <label class="control-label no-padding-right">Kode Produk<span id="merah">*</span></label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="ace-icon fa fa-barcode"></i>
                            </span>
                            <input type="text" class="form-control" name='kode_produk' id="val-tgl-order" required>
                        </div> 
                    </div> 
                    <div class="form-group">
                        <label class="control-label no-padding-right">No. MC<span id="merah">*</span></label>
                        <input type="text" class="form-control" name='no_mc' required>
                    </div> 
                    <div class="form-group">
                        <label class="control-label no-padding-right">Batch Size<span id="merah">*</span></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name='batch_size' required>
                            <span class="input-group-addon">KG
                            </span>
                        </div> 
                    </div> 
                </div>
                <div class="modal-footer no-margin-top">
                    <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Close
                    </button>
                    <ul class="pagination pull-right no-margin">
                    <button class="btn btn-sm btn-primary pull-left" type="submit">
                        <i class="ace-icon fa fa-check"></i>
                        Simpan
                    </button>
                    </ul>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- PAGE CONTENT ENDS -->
