<?php 
$id_group = $this->session->userdata('id_group');
$url_sub       = $this->uri->segment(2);
$akses_edit = $this->role_model->view_submodule($id_group, $url_sub);
?>
<div class="userlogin">
  <div class="col-xs-12">
    <h3 class="header smaller lighter blue">User login</h3>
    <?php if($akses_edit->c == 1){ ?>   
    <a href="<?php echo base_url(); ?>user/userlogin/tambah" button type="button" class="btn btn-primary btn-minier show-option" title="Tambah Data">
         <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Tambah Data</button></a>         
    <div class="clearfix">
      <div class="pull-right tableTools-container"></div>
    </div>                    
      <div>
    <?php }else{ echo ""; }; ?>  
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
              <!-- <th class="center">Foto</th> -->
              <th class="center">User Name</th>
              <th class="center">Nama Karyawan</th>
              <th class="center">Organisasi</th>
              <th class="center">Divisi</th>
              <th class="center">Department</th>
              <th class="center">Seksi</th>
              <th class="center">User Group</th>
              <!-- <th class="center">User Akses</th> -->
              <th class="center">Terakhir Login</th>
              <th class="center">Opsi</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $no = 1; foreach($userlogin as $userlogin) {
          $date1 = strtotime($userlogin->last_access); 
          $time  = strtotime($userlogin->last_access);
          ?>
           <tr>          
             <td align="center"><?php echo $no ?></td> 
             <td align="center"><?php echo $userlogin->username ?></td>
             <td align="center"><?php echo $userlogin->namaKaryawan ?></td>
             <td align="center"><?php echo $userlogin->nama_organisasi ?></td>
             <td align="center"><?php echo $userlogin->namaDivisi ?></td>
             <td align="center"><?php echo $userlogin->namaDepartment ?></td>
             <td align="center"><?php echo $userlogin->namaSeksi ?></td>
             <td align="center"><?php echo $userlogin->nama_group ?></td>
             <?php if($userlogin->last_access == NULL){ ?>
             <td align="center"><b>Belom Pernah Login</b></td>
             <?php }else{ ?>
             <td align="center"><?php echo tgl_indo(date('Y-m-d',$date1)); ?>,  Pukul : <?php echo date('H:i',$time); ?></td>
             <?php }; ?>
             <td align="center">
                 <?php 
                 include('view.php');                 
                 if($akses_edit->u == 1){
                 ?>
                 <a class="btn btn-minier btn-warning show-option" href="<?php echo base_url('user/userlogin/edit/'.$userlogin->id_login) ?>" title="Edit Data">
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
        