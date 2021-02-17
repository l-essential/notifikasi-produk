<?php 
  $NIK = $this->session->userdata('NIK');
  $group = $this->session->userdata('id_group');
?>

<?= $this->session->flashdata('message'); ?>
<div class="page-header">
  <h1>
    Formula Notifikasi Produk
  </h1>
</div><!-- /.page-header -->

<?php if($group != 2 && $group != 3){?>
<a href="<?= base_url('fnp/notifikasi/addmerek')?>" class="btn btn-success btn-primary no-radius">
    <i class="ace-icon fa fa-plus bigger-230"></i>
    Tambah Data
</a>

<a href="<?= base_url('fnp/notifikasi')?>" class="btn btn-warning btn-primary no-radius">
    <i class="ace-icon fa fa-refresh bigger-230"></i>
    Refresh Data
</a>
<?php } ?>


<div class="clearfix">
    <div class="pull-right tableTools-container"></div>
</div>

<table id="example4" class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th class="center">No.</th>
        <th class="center">Status Approval <br> RnDC Manager</th>
        <th class="center">Status Approval <br> RA</th>
        <th class="center">Merek</th>
        <th class="center">Formula Khusus</th>
        <!-- <th class="center">Tanggal Berlaku</th> -->
        <th class="center">Catatan</th>
        <th class="center">Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php 
        $no = 1; 
        foreach($merek as $m){ 
    ?>
    <tr>          
        <td align="center"><?= $no++; ?></td>
        <td align="center">
            <?php if($m['status_approve_rnd'] == 0 && $group == 2){?>
                <?php if ($m['komposisi'] == 0 || $m['prosedur'] == 0 ) {?>
                    <span class="label label-warning" style="background-color: #ffca02;"><i class="fa fa-warning"></i> Belum Lengkap</span>
                <?php }else{?>
                    <a href="<?= base_url('fnp/notifikasi/approve_rnd/');?><?= $m['idmerek']; ?>" onclick="return confirm('Apakah Yakin Setujui Data <?= $m['namamerek'];?>')" class="btn btn-xs btn-danger">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Approve
                    </a>
                <?php } ?>
            <?php }else if($m['status_approve_rnd'] == 1 && $group == 2){ ?>
                <div class="btn-group">
                <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-check"></i> Approved 
                </button>
                <?php if($group == 2){?>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('fnp/notifikasi/unapprove_rnd/');?><?= $m['idmerek']; ?>">Batal Setujui</a></li>
                </ul>
                <?php }?>
                </div>
            <?php }else{ ?>
                <?php if ($m['komposisi'] == 0 || $m['komposisi'] == 0 || $m['prosedur'] == 0) {?>
                    <span class="label label-warning" style="background-color: #ffca02;"><i class="fa fa-warning"></i> Belum Lengkap</span>
                <?php }else{?>
                    <span class="label label-warning"><i class="fa fa-warning"></i> Belum Approve</span>
                <?php } ?>
            <?php } ?>
        </td>
        
        <td align="center">
            <?php if($m['status_approve_ra'] == 0 && $group == 3){?>
                <?php if ($m['komposisi'] == 0 || $m['prosedur'] == 0) {?>
                    <span class="label label-warning" style="background-color: #ffca02;"><i class="fa fa-warning"></i> Belum Lengkap</span>
                <?php }else{?>
                    <a href="<?= base_url('fnp/notifikasi/approve_rnd/');?><?= $m['idmerek']; ?>" onclick="return confirm('Apakah Yakin Setujui Data <?= $m['namamerek'];?>')" class="btn btn-xs btn-danger">
                    <i class="fa fa-pencil" aria-hidden="true"></i> Approve
                    </a>
                <?php } ?>
            <?php }else if($m['status_approve_ra'] == 1){ ?>
                <div class="btn-group">
                <button type="button" class="btn btn-xs btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-check"></i> Approved 
                </button>
                <?php if($group == 3){?>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('fnp/notifikasi/unapprove_ra/');?><?= $m['idmerek']; ?>">Batal Setujui</a></li>
                </ul>
                <?php }?>
                </div>
            <?php }else{ ?>
                <?php if ($m['komposisi'] == 0 || $m['komposisi'] == 0 || $m['prosedur'] == 0) {?>
                    <span class="label label-warning" style="background-color: #ffca02;"><i class="fa fa-warning"></i> Belum Lengkap</span>
                <?php }else{?>
                    <span class="label label-warning"><i class="fa fa-warning"></i> Belum Approve</span>
                <?php } ?>
            <?php } ?>
        </td>    

        <td align="center" style="text-transform:uppercase"><?= $m['namamerek']; ?></td>
        <td align="center"><?= $m['formulakhusus']; ?></td>
        <!-- <td align="center"><?= $m['tglberlaku']; ?></td> -->
        <td align="center">
            <?php if($group == 4){ ?>
                <?php if($m['note_status_rndcm'] == 1 && $m['note_status_ra'] == 1){?>
                <button class="btn btn-minier btn-info show-option viewnote" data-id="<?= $m['idmerek']; ?>" data-note="<?= $m['catatan_rndcm']; ?>" title="Catatan RnDC Manager"><i class="fa fa-info-circle" aria-hidden="true"></i></button>

                <button class="btn btn-minier btn-info show-option viewnote2" data-id="<?= $m['idmerek']; ?>" data-note="<?= $m['catatanra']; ?>" title="Catatan RA"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                <?php }else if($m['note_status_ra'] == 1){ ?>
                <button class="btn btn-minier btn-info show-option viewnote2" data-id="<?= $m['idmerek']; ?>" data-note="<?= $m['catatanra']; ?>" title="Catatan RA"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                <?php }else if($m['note_status_rndcm'] == 1) { ?>
                  <button class="btn btn-minier btn-info show-option viewnote" data-id="<?= $m['idmerek']; ?>" data-note="<?= $m['catatan_rndcm']; ?>" title="Catatan RnDC Manager"><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                <?php }?>
            <?php }else if($group == 2){ ?>
                <?php if($m['note_status_rndcm'] == 0){?>
                <button class="btn btn-minier btn-info show-option btn-edit" data-id="<?= $m['idmerek']; ?>" data-name="<?= $m['namamerek']; ?>" title="Beri Catatan"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <?php }else if($m['note_status_rndcm'] == 1){ ?>
                  <form action="<?= base_url('fnp/notifikasi/fix_note_rndcm'); ?>" method="post">
                  <input type="hidden" name="idmerek" value="<?= $m['idmerek']; ?>">
                  <button type="submit"class="btn btn-minier btn-danger show-option" onclick="return confirm('Apakah kamu yakin akan menghapus catatan <?= $m['namamerek']; ?>?');" title="Hapus Catatan"><i class="ace-icon fa fa-undo bigger-120"></i></button>
                  </form>
                <?php } ?>
            <?php }else{ ?>
                <?php if($m['note_status_ra'] == 0){?>
                <button class="btn btn-minier btn-info show-option btn-edit" data-id="<?= $m['idmerek']; ?>" data-name="<?= $m['namamerek']; ?>" title="Beri Catatan"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                <?php }else if($m['note_status_ra'] == 1){ ?>
                  <form action="<?= base_url('fnp/notifikasi/fix_note_ra'); ?>" method="post">
                  <input type="hidden" name="idmerek" value="<?= $m['idmerek']; ?>">
                  <button type="submit"class="btn btn-minier btn-danger show-option" onclick="return confirm('Apakah kamu yakin akan menghapus catatan <?= $m['namamerek']; ?>?');" title="Hapus Catatan"><i class="ace-icon fa fa-undo bigger-120"></i></button>
                  </form>
                <?php } ?>
            <?php } ?>
        </td>
        <!-- <td align="center"><?= $m['formulakhusus']; ?></td> -->

        <td align="center">
            <?php if($group == 4 || $group == 2){?>
            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/editmerek/'); ?><?= $m['idmerek']; ?>" title="Edit Merek">
            <i class="ace-icon fa fa-pencil bigger-120"></i></a>
            
            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/addbk/'); ?><?= $m['idmerek']; ?>" title="Tambah Bentuk Kemasan">
            <i class="ace-icon fa fa-plus-circle bigger-120"></i></a>

            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/addkomposisi/'); ?><?= $m['idmerek']; ?>" title="Tambah Komposisi">
            <i class="ace-icon fa fa-plus-circle bigger-120"></i></a>

            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/addprosedur/'); ?><?= $m['idmerek']; ?>" title="Tambah prosedur">
            <i class="ace-icon fa fa-plus-circle bigger-120"></i></a>

            <a class="btn btn-minier btn-info show-option" href="<?= base_url('fnp/notifikasi/duplicate/'); ?><?= $m['idmerek']; ?>" title="Duplikat Data">
            <i class="fa fa-files-o" aria-hidden="true"></i></a>
            
            <a class="btn btn-minier btn-primary show-option" href="<?= base_url('fnp/notifikasi/viewdata/'); ?><?= $m['idmerek']; ?>" title="View Data">
            <i class="ace-icon fa fa-eye bigger-120"></i></a>
            
            <a class="btn btn-minier btn-success show-option" href="<?= base_url('fnp/notifikasi/cetak/'); ?><?= $m['idmerek']; ?>/<?= $m['createby']; ?>/<?= $m['approve_rnd_by']; ?>/<?= $m['approve_ra_by']; ?>" title="Print Data"  >
            <i class="ace-icon fa fa-print bigger-120"></i></a>

            <a class="btn btn-minier btn-danger show-option" href="<?= base_url('fnp/notifikasi/hapusalldata/'); ?><?= $m['idmerek']; ?>" title="Hapus Data" onclick="return confirm('Apakah kamu yakin akan menghapus data <?= $m['namamerek']; ?>?');">
            <i class="ace-icon fa fa-trash bigger-120"></i></a>


            <?php }else if($group == 3){ ?>
            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/editmerek/'); ?><?= $m['idmerek']; ?>" title="Edit Merek">
            <i class="ace-icon fa fa-pencil bigger-120"></i></a>

            <a class="btn btn-minier btn-primary show-option" href="<?= base_url('fnp/notifikasi/viewdata/'); ?><?= $m['idmerek']; ?>" title="View Data">
            <i class="ace-icon fa fa-eye bigger-120"></i></a>

            <a class="btn btn-minier btn-success show-option" href="<?= base_url('fnp/notifikasi/cetak/'); ?><?= $m['idmerek']; ?>/<?= $m['createby']; ?>/<?= $m['approve_rnd_by']; ?>/<?= $m['approve_ra_by']; ?>" title="Print Data">
            <i class="ace-icon fa fa-print bigger-120"></i></a>
            
            <?php }else{ ?>
            <a class="btn btn-minier btn-primary show-option" href="<?= base_url('fnp/notifikasi/viewdata/'); ?><?= $m['idmerek']; ?>" title="View Data">
            <i class="ace-icon fa fa-eye bigger-120"></i></a>
            <?php } ?>

        </td>     
   
    </tr>  
    <?php } ?>
    </tbody>
</table>

<!-- MODAL TULIS CATATAN -->
<form action="<?= base_url('fnp/notifikasi/'); ?><?php if($group == 2){echo "note_rnd/";}else{echo "note_ra/";}?>" method="post">
  <div class="modal fade" id="note" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="exampleModalLabel"><b>Catatan</b></h3>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="recipient-name" class="control-label">Nama Merek</label>
              <input type="text" class="form-control" id="nama" readonly>
            </div> 
            <div class="form-group">
              <label for="message-text" class="control-label">Catatan</label>
              <textarea class="form-control" name="catatan" required></textarea>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="idmerek" id="idmerek">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Kirim</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- MODAL LIHAT CATATAN RNDCM-->
<form action="<?= base_url('fnp/notifikasi/fix_note_rndcm'); ?>" method="post">
  <div class="modal fade" id="viewnote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="exampleModalLabel"><b>Catatan</b></h3>
          <h6 class="modal-title" id="exampleModalLabel"><b>Dari : Research n Development Cosmetic Manager</b></h6>
        </div>
        <div class="modal-body">
            <!-- <div class="form-group">
              <label for="recipient-name" class="control-label">Nama Merek</label>
              <input type="text" class="form-control" id="nama" readonly>
            </div>  -->
            <div class="form-group">
              <label for="message-text" class="control-label">Catatan</label>
              <textarea class="form-control" name="catatan" id="note1" readonly></textarea>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="idmerek" id="idmerek1">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" name="submit" class="btn btn-success">Confirm</button>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- MODAL LIHAT CATATAN RA-->
<form action="<?= base_url('fnp/notifikasi/fix_note_ra'); ?>" method="post">
  <div class="modal fade" id="viewnote2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title" id="exampleModalLabel"><b>Catatan</b></h3>
          <h6 class="modal-title" id="exampleModalLabel"><b>Dari : Regulatory Affairs</b></h6>
        </div>
        <div class="modal-body">
            <!-- <div class="form-group">
              <label for="recipient-name" class="control-label">Nama Merek</label>
              <input type="text" class="form-control" id="nama" readonly>
            </div>  -->
            <div class="form-group">
              <label for="message-text" class="control-label">Catatan</label>
              <textarea class="form-control" name="catatan" id="note2" readonly></textarea>
            </div>
            <div class="form-group">
              <input type="hidden" class="form-control" name="idmerek" id="idmerek2">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Repaired!</button>
        </div>
      </div>
    </div>
  </div>
</form>


<script>
  $(document).ready(function(){
  // Nampilin catatan RnDCM
  $('.viewnote').on('click',function(){
      // get data from button edit
      const id = $(this).data('id');
      const note = $(this).data('note');

      // Set data to Form Edit
      $('#idmerek1').val(id);
      $('#note1').val(note);
      //  $('.nama').val(name);

      // Call Modal Edit
      $('#viewnote').modal('show');
  });

  // Nampilin catatan RA
  $('.viewnote2').on('click',function(){
      // get data from button edit
      const id = $(this).data('id');
      const note = $(this).data('note');

      // Set data to Form Edit
      $('#idmerek2').val(id);
      $('#note2').val(note);
      //  $('.nama').val(name);

      // Call Modal Edit
      $('#viewnote2').modal('show');
  });
  
  // get Edit Product
  $('.btn-edit').on('click',function(){
      // get data from button edit
      const id = $(this).data('id');
      const name = $(this).data('name');

      // Set data to Form Edit
      $('#idmerek').val(id);
      $('#nama').val(name);
    //  $('.nama').val(name);

      // Call Modal Edit
      $('#note').modal('show');
  });
  });
</script>