<?php 
$id_group = $this->session->userdata('id_group');
$url_sub       = $this->uri->segment(2);
$akses_edit = $this->role_model->view_submodule($id_group, $url_sub);
?>
<div class="submodule">
  <div class="col-xs-12">
    <h3 class="header smaller lighter blue">Master Submodule</h3>
    <?php
    if($akses_edit->c == 1){
    include('tambah.php');
    }else{ echo ""; };
    ?>            
    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div>                    
      <div>
      <?php 
      $data=$this->session->flashdata('sukses');
      if($data!=""){ ?>
      <div class="alert alert-success alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <i class="icon fa fa-check"></i> <?=$data;?></div>
      <?php } ?>
      <?php 
      $data2=$this->session->flashdata('error');
      if($data2!=""){ ?>
     <div class="alert alert-danger alert-dismissable">
     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
     <i class="icon fa fa-close"></i> <?=$data2;?></div>
     <?php } echo validation_errors('<div class="alert alert-danger">','</div>'); ?>                         
      <table id="example2" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
              <th class="center">No</th>
              <th class="center">Nama Module</th>
              <th class="center">Nama Submodule</th>
              <th class="center">URL</th>
              <th class="center">Jenis Form</th>
              <th class="center">Urutan</th>
              <th class="center">Opsi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1; foreach($submodule as $submodule) { ?>
           <tr>          
             <td align="center"><?php echo $no ?></td>    
             <td align="center"><?php echo $submodule->nama_module ?></td>
             <td align="center"><?php echo $submodule->nama_submodule ?></td>
             <td align="center"><?php echo $submodule->url_sub ?></td>
             <td align="center"><?php echo $submodule->jenis_form ?></td>
             <td align="center"><?php echo $submodule->urutan ?></td>
             <td align="center">
                 <?php 
                 include('view.php');                 
                 if($akses_edit->u == 1){
                 ?>
                 <a class="btn btn-minier btn-warning show-option" href="<?php echo base_url('user/submodule/edit/'.$submodule->id_submodule) ?>" title="Edit Data">
                  <i class="ace-icon fa fa-pencil bigger-120"></i>
                </a>               
                <?php }else{ echo ""; } 
                if($akses_edit->d == 1){
                ?>
                <?php
                include('hapus.php');
                }else{ echo ""; } ?>              
                </button></a>                            
             </td>              
           </tr>  
          <?php $no++; } ?>
         </tbody>
    </table>
    </div>
  </div>
</div>
        