<?php 
  $NIK = $this->session->userdata('NIK');
?>

    
    <div class="page-header">
    <h1>
        Master Data Bentuk kemasan
    </h1>
    </div><!-- /.page-header -->

    <a href="<?= base_url (); ?>fnp/masterdata/tambahbk" class="btn btn-success btn-primary no-radius">
        <i class="ace-icon fa fa-plus bigger-230"></i>
        Tambah Data
    </a>

    <a href="<?= base_url (); ?>fnp/masterdata/masterbk" class="btn btn-warning btn-primary no-radius">
        <i class="ace-icon fa fa-refresh bigger-230"></i>
        Refresh Data
    </a>

    <div class="clearfix">
        <div class="pull-right tableTools-container"></div>
    </div>

    <?= $this->session->flashdata('message'); ?>

    <table id="example4" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th class="center">No.</th>
            <th class="center">Bentuk Kemasan</th>
            <th class="center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php 
            $no = 1; 
            foreach($databk as $data){
        ?>
        <tr>          
            <td align="center"><?= $no++; ?></td>    
            <td><?= $data['bentukkemasan']; ?></td>
            <td align="center">
                <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/masterdata/editbk/'); ?><?= $data['idbk']; ?>" title="Edit Data">
                <i class="ace-icon fa fa-pencil bigger-120"></i></a>

                <a class="btn btn-minier btn-danger show-option" href="<?= base_url('fnp/masterdata/delbk/'); ?><?= $data['idbk'];?>" title="Hapus Data" onclick="return confirm('Apakah kamu yakin akan menghapus data?');">
                <i class="ace-icon fa fa-trash bigger-120"></i></a>
            </td>        
        </tr>  
        <?php 
            } 
        ?>
        </tbody>
    </table>
