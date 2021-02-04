<div class="page-header">
  <h1>
    Formula Notifikasi Produk <b style="text-transform:uppercase"><?= $merekbyid[0]['namamerek']; ?></b>
  </h1>
</div><!-- /.page-header -->

<?= $this->session->flashdata('message'); ?>

<h4>1. Komposisi</h4>
<hr>

<div class="posisi">
  <a href="#tambah" role="button" data-toggle="modal" button type="button" class="btn btn-success btn-primary no-radius">
   <i class="ace-icon fa fa-plus bigger-230"></i> Tambah Data</a>

  <a href="#import" role="button" data-toggle="modal" button type="button" class="btn btn-success btn-primary no-radius">
  <i class="fa fa-download bigger-230" aria-hidden="true"></i> Import Data</a>

  <?php if(!empty($komposisi)){?>
  <a href="<?= base_url('fnp/notifikasi/delalldatakomp/'); ?><?= $merekbyid[0]['idmerek']; ?>" type="button" class="btn btn-danger btn-primary no-radius" >
  <i class="fa fa-trash bigger-230" aria-hidden="true"></i> Hapus Semua Data</a>
  <?php } ?>
  
</div>
    
<div class="clearfix">
    <div class="pull-right tableTools-container"></div>
</div>

<table id="example2" class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th class="center">No.</th>
        <th class="center">Nama Dagang</th>
        <th class="center">INCI Name</th>
        <th class="center">Fungsi</th>
        <th class="center">No. CAS</th>
        <th class="center">Konsentrasi (%)</th>              
        <th class="center">Opsi</th>
    </tr>
    </thead>
    <tbody>
    <?php 
        $n=0;
        foreach($komposisi as $k){ 
        if(empty($k['namadagang'])){
          $no = false;            
        }else{
          $no = true;
        }
    ?>
    <tr>          
        <td align="center">
          <?php 
            if($no === true){
              echo $no + $n++;
            } 
          ?>
        </td>
        <td align="left"><?= $k['namadagang']; ?></td>
        <td align="left"><?= $k['inciname']; ?></i></td>
        <td align="left"><?= $k['fungsi']; ?></td>
        <td align="left"><?= $k['nocas']; ?></td>
        <td align="center"><?= $k['konsentrasi']; ?></td>
        <td align="center">
            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/editkomposisi/'); ?><?= $k['idkomposisi']; ?>/<?= $merekbyid[0]['idmerek']; ?>" title="Edit Data" role="button" data-toggle="modal" button type="button">
            <i class="ace-icon fa fa-pencil bigger-120"></i></a>
            
            <a class="btn btn-minier btn-danger show-option" href="<?= base_url('fnp/notifikasi/hapuskomposisi/'); ?><?= $k['idkomposisi']; ?>/<?= $merekbyid[0]['idmerek']; ?>" title="Hapus Data" onclick="return confirm('Apakah kamu yakin akan menghapus komposisi <?= $k['namadagang']; ?>?');">
            <i class="ace-icon fa fa-trash bigger-120"></i></a>
        </td>
    </tr> 
    <?php } ?>

    </tbody>
</table>

<div class="row">
    <div class="col-sm-12 center">
        <div class="form-actions">
            <a href="<?= base_url('fnp/notifikasi/'); ?>" class="btn btn-danger"><i class='icon-only ace-icon fa fa-arrow-left bigger-110'></i> Kembali</a>
        </div>
    </div>
</div>


<!-- ====================================================================== MODAL TAMBAH -->
<div id="tambah" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <span class="white">&times;</span>
        </button>
        Komposisi
        </div>
      </div>

      <div class="modal-body">
        <form method="POST" action="<?= base_url('fnp/notifikasi/addkomposisi/'); ?><?= $merekbyid[0]['idmerek']; ?>" enctype="form-data/multipart" data-parsley-validate="true">
          
          <div class="form-group">
          <label for="message-text" class="form-control-label">Nama Dagang<span id="merah">*</span></label>
          <input type="text" class="form-control" placeholder="Nama Dagang" name="namadagang">
          <?= form_error('namadagang', '<small class="text-danger pl-3">', '</small>')?>
          </div>

          <div class="form-group">
          <input type="hidden" name="id_group">
          <label for="message-text" class="form-control-label">INCI Name<span id="merah">*</span></label>
          <input type="text" class="form-control" placeholder="INCI Name" name="inciname" required>
          <?= form_error('inciname', '<small class="text-danger pl-3">', '</small>')?>
          </div>

          <div class="form-group">
          <input type="hidden" name="id_group">
          <label for="message-text" class="form-control-label">Fungsi<span id="merah">*</span></label>
          <input type="text" class="form-control" placeholder="Fungsi" name="fungsi" required>
          <?= form_error('fungsi', '<small class="text-danger pl-3">', '</small>')?>
          </div>

          <div class="form-group">
          <label for="message-text" class="form-control-label">No. CAS<span id="merah">*</span></label>
          <input type="text" class="form-control" placeholder="No. CAS" name="nocas" required>
          <?= form_error('nocas', '<small class="text-danger pl-3">', '</small>')?>
          </div>     

          <div class="form-group">
          <label for="message-text" class="form-control-label">Konsentrasi (%)<span id="merah">*</span></label>
          <input type="text" class="form-control" placeholder="Konsentrasi (%)" name="konsentrasi" required>
          <?= form_error('konsentrasi', '<small class="text-danger pl-3">', '</small>')?>
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


<!-- ====================================================================== MODAL IMPORT -->
<div id="import" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <span class="white">&times;</span>
        </button>
        Import Data Komposisi by CSV
        </div>
      </div>

      <div class="modal-body">
      <form method="POST" action="<?= base_url('fnp/notifikasi/importkomposisi/'); ?><?= $merekbyid[0]['idmerek']; ?>" enctype="multipart/form-data" data-parsley-validate="true">

      <label for="message-text" class="form-control-label">Pilih File CSV<span id="merah">*</span></label>
      <input type="file" name="csv" id="csv" accept="text/csv" required>     
          
      </div>
          <div class="modal-footer no-margin-top">
            <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
              <i class="ace-icon fa fa-times"></i>
              Close
            </button>                     
            <ul class="pagination pull-right no-margin">
              <button class="btn btn-sm btn-primary pull-left" type="submit" name="import">
              <i class="ace-icon fa fa-check"></i>
              Simpan
              </button>
            </ul>
          </div>
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- PAGE CONTENT ENDS -->
