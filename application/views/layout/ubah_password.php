<a href="#Tambah" role="button" data-toggle="modal" button type="button" class="btn btn-primary btn-minier show-option" title="Tambah Data">
     <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Tambah Data</button></a>  
<!-- modal -->
<div id="ganti" class="modal fade" tabindex="-1">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header no-padding">
       <div class="table-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
           <span class="white">&times;</span>
         </button>
         Ubah Password
       </div>
     </div>
<div class="modal-body">
<form method="POST" action="" data-parsley-validate="true">
  <div class="form-group">
    <label for="recipient-name" class="form-control-label">Password Lama<span id="merah">*</span></label>
    <input type="password" name="password_lama" placeholder="Password Lama" data-parsley-required="true" minlength="2" data-parsley-minlength="2" class="form-control" >
 </div>
 <div class="form-group">
   <label for="message-text" class="form-control-label">Password Baru<span id="merah">*</span></label>
   <input type="password" data-parsley-minlength="2" minlength="2" id="password" placeholder="Password" data-parsley-required="true" class="form-control">
  </div>    
 <div class="form-group">
   <label for="message-text" class="form-control-label">Konfirmasi Password Baru<span id="merah">*</span></label>
   <input type="password" name="password_baru" placeholder="Confirm Password" data-parsley-required="true" data-parsley-equalto="#password" class="form-control">
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
    </div>
    </form>
  </div>
</div>