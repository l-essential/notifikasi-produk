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
        <!-- <th class="center">Nama Produk</th> -->
        <th class="center">No. Formula</th>
        <!-- <th class="center">Formula Khusus</th> -->
        <th class="center">Tanggal Berlaku</th>
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
            <a href="<?= base_url('fnp/notifikasi/approve_rnd/');?><?= $m['idmerek']; ?>" onclick="return confirm('Apakah Yakin Setujui Data <?= $m['namamerek'];?>')" class="btn btn-xs btn-danger">
            <i class="fa fa-pencil" aria-hidden="true"></i> Approve
            </a>
        <?php }else if($m['status_approve_rnd'] == 1){ ?>
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
            <span class="label label-warning"><i class="fa fa-warning"></i> Belum Approve</span>
        <?php } ?>
        </td>
        
        <td align="center">
        <?php if($m['status_approve_ra'] == 0 && $group == 3){?>
            <a href="<?= base_url('fnp/notifikasi/approve_ra/');?><?= $m['idmerek']; ?>" onclick="return confirm('Apakah Anda Yakin Setujui Data <?= $m['namamerek'];?>')" class="btn btn-xs btn-danger">
            <i class="fa fa-pencil" aria-hidden="true"></i> Approve
            </a>
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
            <span class="label label-warning"><i class="fa fa-warning"></i> Belum Approve</span>
        <?php } ?>
        </td>    

        <td align="center" style="text-transform:uppercase"><?= $m['namamerek']; ?></td>
        <!-- <td align="center"><?= $m['namaproduk']; ?></td> -->
        <td align="center"><?= $m['noformula']; ?></td>
        <!-- <td align="center"><?= $m['formulakhusus']; ?></td> -->
        <td align="center"><?= date('d F Y', strtotime($m['tglberlaku'])); ?></td>
        
        <td align="center">
            <?php if($group == 4 || $group == 2){?>
            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/editmerek/'); ?><?= $m['idmerek']; ?>" title="Edit Merek">
            <i class="ace-icon fa fa-pencil bigger-120"></i></a>
            
            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/addbk/'); ?><?= $m['idmerek']; ?>" title="Tambah Bentuk Kemasan">
            <i class="ace-icon fa fa-pencil bigger-120"></i></a>

            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/addkomposisi/'); ?><?= $m['idmerek']; ?>" title="Tambah Komposisi">
            <i class="ace-icon fa fa-pencil bigger-120"></i></a>

            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/addprosedur/'); ?><?= $m['idmerek']; ?>" title="Tambah prosedur">
            <i class="ace-icon fa fa-pencil bigger-120"></i></a>

            <a class="btn btn-minier btn-danger show-option" href="<?= base_url('fnp/notifikasi/hapusalldata/'); ?><?= $m['idmerek']; ?>" title="Hapus Data" onclick="return confirm('Apakah kamu yakin akan menghapus data <?= $m['namamerek']; ?>?');">
            <i class="ace-icon fa fa-trash bigger-120"></i></a>
            
            <a class="btn btn-minier btn-primary show-option" href="<?= base_url('fnp/notifikasi/viewdata/'); ?><?= $m['idmerek']; ?>" title="View Data">
            <i class="ace-icon fa fa-eye bigger-120"></i></a>
            
            <?php if($NIK != '2019113215'){?>
            <a class="btn btn-minier btn-success show-option" href="<?= base_url('fnp/notifikasi/cetak/'); ?><?= $m['idmerek']; ?>/<?= $m['createby']; ?>/<?= $m['approve_rnd_by']; ?>/<?= $m['approve_ra_by']; ?>" title="Print Data"  >
            <i class="ace-icon fa fa-print bigger-120"></i></a>
            <?php } ?>

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
