<div class="page-header">
  <h1>
    Formula Notifikasi <b style="text-transform:uppercase"><?= $merekbyid[0]['namamerek']; ?></b>
  </h1>
</div><!-- /.page-header -->

<?= $this->session->flashdata('message'); ?>
<div class="page-header">
<h4>
    Form Tambah Bentuk Kemasan 
</h4>
</div><!-- /.page-header -->

<a href="#tambahprocedure" role="button" data-toggle="modal" button type="button" class="btn btn-success btn-primary no-radius">
<i class="ace-icon fa fa-plus-circle bigger-230"></i> Tambah data</button></a>  

<!-- <a href="#importprosedur" role="button" data-toggle="modal" button type="button" class="btn btn-success btn-primary no-radius">
<i class="ace-icon fa fa-download bigger-230"></i> Import Data</button></a>  -->

<div class="clearfix">
    <div class="pull-right tableTools-container"></div>
</div>

<table id="example3" class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th class="center">No.</th>
        <th class="center">Primer</th>
        <th class="center">Sekunder</th>
        <th class="center">Ukuran Kemasan</th>
        <th class="center">Opsi</th>
    </tr>
    </thead>
    <tbody>
    <?php 
        $no = 1; 
        foreach($bk as $b){ 
    ?>
    <tr>          
        <td align="center"><?= $no++; ?></td>    
        <td align="left"><?= $b['primer']; ?></td>
        <td align="left"><?= $b['sekunder']; ?></td>
        <td align="left"><?= $b['ukurankemasan']; ?> <?= $b['satuan']; ?></td>
        <td align="center">
            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/editbk/'); ?><?= $merekbyid[0]['idmerek']; ?>/<?= $b['idbk']; ?>" title="Edit Data">
            <i class="ace-icon fa fa-pencil bigger-120"></i></a>

            <a class="btn btn-minier btn-danger show-option" href="<?= base_url('fnp/notifikasi/hapusbk/'); ?><?= $merekbyid[0]['idmerek']; ?>/<?= $b['idbk']; ?>" title="Hapus Data" onclick="return confirm('Apakah kamu yakin akan menghapus data ini?');">
            <i class="ace-icon fa fa-trash bigger-120"></i></a>
        </td>        
    </tr>  
    <?php 
    } 
    ?>
    </tbody>
</table>

<div class="row">
    <div class="col-sm-12 center">
        <div class="form-actions">
            <a href="<?= base_url('fnp/notifikasi/'); ?>" class="btn btn-danger"><i class='icon-only ace-icon fa fa-arrow-left bigger-110'></i> Kembali</a>
        </div>
    </div>
</div>


<!-- modal -->
<div id="tambahprocedure" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <span class="white">&times;</span>
        </button>
        Form Tambah Bentuk Kemasan
        </div>
      </div>

      <div class="modal-body">
        <form method="POST" action="<?= base_url('fnp/notifikasi/addbk/'); ?><?= $merekbyid[0]['idmerek']; ?>" data-parsley-validate="true">
            
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right">Bentuk Kemasan<span id="merah">*</span></label>
            <div class="col-sm-8 input-group">
                <select name="primer" class=" form-control">
                    <option value="Primer">Primer</option>
                    <?php foreach ($databk as $bk) { ?>
                    <option value="<?= $bk['bentukkemasan']; ?>"><?= $bk['bentukkemasan']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right"></label>
            <div class="col-sm-8 input-group">
                <label for="" style="margin-right: 10px"><b>Sekunder :</b></label>
                <input type="radio" name="sekunder" value="Inner Box" style="margin-right: 5px"> <b style="margin-right: 20px">Inner Box</b> 

                <input type="radio" name="sekunder" value="Tidak" style="margin-right: 5px"><b>Tidak</b>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right">Ukuran Kemasan<span id="merah">*</span></label>
            <div class="col-sm-8 input-group">
                <input type="number" class="form-control" name='ukurankemasan'>
                <?= form_error('ukurankemasan', '<small class="text-danger pl-3">', '</small>')?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label no-padding-right"></label>
            <div class="col-sm-8 input-group">
                <label for="" style="margin-right: 10px"><b>Satuan :</b></label>
                <input type="radio" name="satuan" id="satuan" value="Mililiter" style="margin-right: 5px"> <b style="margin-right: 20px">Mililiter</b> 

                <input type="radio" name="satuan" id="satuan" value="Gram" style="margin-right: 5px"><b>Gram</b>
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
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- PAGE CONTENT ENDS -->