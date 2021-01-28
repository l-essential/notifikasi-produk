<?php 
$id_group = $this->session->userdata('id_group');
$id_akses = $this->session->userdata('id_akses');
$url_sub  = $this->uri->segment(2);
$akses_edit = $this->role_model->view_submodule($id_group, $url_sub);
?>
<div class="btn-group">
    <button data-toggle="dropdown" class="btn btn-info btn-sm dropdown-toggle" aria-expanded="false">
        <i class='icon-only ace-icon fa fa-align-justify'></i>
        <span class="ace-icon fa fa-caret-down icon-on-right"></span>
    </button>
    <ul class="dropdown-menu dropdown-info dropdown-menu-right">
        <?php if($akses_edit->c ==1):?>
        <li>
            <a href="<?= base_url('master/composition/tambah_bahan/').$row->id_produk?>"> <i class='icon-only ace-icon fa fa-pencil'></i> Tambah Bahan</a>
        </li>
        <?php endif;?>
        <?php if($akses_edit->r ==1):?>
        <li>
            <a href="<?= base_url('master/composition/print_data/').$row->id_produk?>"> <i class='icon-only ace-icon fa fa-print'></i> Print</a>
        </li>
        <?php endif;?>
        <?php if($akses_edit->d ==1):?>
        <li>
            <a href='javascript:void(0)' onclick="delete_produk(<?php echo $row->id_produk;?>)"><i class='icon-only ace-icon fa fa-eraser'></i> Hapus</a>
        </li>
        <?php endif;?>
    </ul>
</div>