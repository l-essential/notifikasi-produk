<?php 
$id_group = $this->session->userdata('id_group');
$id_akses = $this->session->userdata('id_akses');
$url_sub  = $this->uri->segment(2);
$akses_edit = $this->role_model->view_submodule($id_group, $url_sub);
?>
<div class="group">
  <div class="col-xs-12">
    <h3 class="header smaller lighter blue">Master Group</h3>
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
              <th class="center">Nama Group</th>
              <th class="center">Keterangan</th>
              <th class="center">Opsi</th>
            </tr>
          </thead>
          <tbody>
          <?php $no = 1; foreach($group as $group) { ?>
           <tr>          
             <td align="center"><?php echo $no ?></td>    
             <td align="center"><?php echo $group->nama_group ?></td>
             <td align="center"><?php echo $group->keterangan ?></td>
             <td align="center">
             <?php if($id_akses==1){ ?>
               <a class="btn btn-minier btn-primary show-option" href="<?php echo base_url('user/role/listing/'.$group->id_group) ?>" title="Page Access">
                  <i class="ace-icon fa fa-key bigger-100"> Page Access</i>
                </a>
                <?php }else{ echo ""; }; if($akses_edit->u ==1){ ?>
                 <a class="btn btn-minier btn-warning show-option" href="<?php echo base_url('user/group/edit/'.$group->id_group) ?>" title="Edit Data">
                  <i class="ace-icon fa fa-pencil bigger-120"></i>
                </a>               
                 <?php
               }else{ echo ""; };
               if($akses_edit->d != 1 || $group->id_group == 1){
                echo "";
               }else{ include('hapus.php'); }
                  ?>               
                </button></a>                            
             </td>              
           </tr>  
          <?php $no++; } ?>
         </tbody>
    </table>
    </div>
  </div>
</div>
        