<a href="#modal-form" role="button" data-toggle="modal" button type="button" class="btn btn-primary btn-minier">
     <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Tambah Data</button></a>  

<!-- modal -->
<div id="modal-form" class="modal fade" tabindex="-1">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header no-padding">
       <div class="table-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
           <span class="white">&times;</span>
         </button>
         Create Module
       </div>
     </div>
<div class="modal-body">
<form method="POST" action="<?php echo base_url(); ?>user/module" data-parsley-validate="true">
<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
  <div class="form-group">
  <input type="hidden" name="create_date" value="<?php echo date ("Y-m-d H:i:s")?>">
  <input type="hidden" name="create_by" value="<?php echo $this->session->userdata('username')?>">
  <input type="hidden" name="id_module">
    <label for="message-text" class="form-control-label">Nama Module<span id="merah">*</span></label>
   <input type="text" class="form-control" data-parsley-required="true" placeholder="Nama Module" name="nama_module">
 </div>
 <div class="form-group">
 <input type="hidden" name="id_group">
    <label for="message-text" class="form-control-label">URL<span id="merah">*</span></label>
   <input type="text" class="form-control" data-parsley-required="true" placeholder="URL" name="url">
 </div>
 <div class="form-group">
<label for="message-text" class="form-control-label">Logo<span id="merah">*</span> :</label>
<input value="fa-desktop" type="radio" name="logo" class="ace" /><span class="lbl"><i class="menu-icon fa fa-desktop"></i></span> &nbsp;&nbsp; <input value="fa-tachometer" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-tachometer"></i></span>&nbsp;&nbsp;
<input value="fa-list" type="radio" required="" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-list"></i></span>&nbsp;&nbsp;
<input value="fa-pencil-square-o" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-pencil-square-o"></i></span>&nbsp;&nbsp;
<input value="fa-list-alt" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-list-alt"></i></span>&nbsp;&nbsp;
<input value="fa-picture-o" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-picture-o"></i></span>&nbsp;&nbsp;
<input value="fa-tag" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-tag"></i></span>&nbsp;&nbsp;
<input value="fa-file-o" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-file-o"></i></span>&nbsp;&nbsp;
<input value="fa-user" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-user"></i></span>&nbsp;&nbsp;
<input value="fa-users" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-users"></i></span>&nbsp;&nbsp;
<input value="fa-eye" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-eye"></i></span>&nbsp;&nbsp;
<input value="fa-pencil" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-pencil"></i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input value="fa-signal" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-signal"></i></span>&nbsp;&nbsp;
<input value="fa-bookmark" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa  fa-bookmark"></i></span>&nbsp;&nbsp;
<input value=" fa-bookmark-o" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa  fa-bookmark-o"></i></span>&nbsp;&nbsp;
<input value="fa-cog" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-cog"></i></span>&nbsp;&nbsp;
<input value="fa-cogs" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-cogs"></i></span>&nbsp;&nbsp;
<input value="fa-credit-card" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-credit-card"></i></span>&nbsp;&nbsp;
<input value="fa-envelope" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-envelope"></i></span>&nbsp;&nbsp;
<input value="fa-folder-open " type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-folder-open "></i></span>&nbsp;&nbsp;
<input value="fa-bullhorn" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-bullhorn"></i></span>&nbsp;&nbsp;
<input value="fa-briefcase" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-briefcase"></i></span>&nbsp;&nbsp;
<input value="fa-download" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa   fa-download"></i></span>&nbsp;&nbsp;
<input value="fa-home" type="radio" name="logo" class="ace" /><span class="lbl" ><i class="menu-icon fa fa-home"></i></span>&nbsp;&nbsp;
 </div>
 <div class="form-group">
 <label for="recipient-name" class="form-control-label">Submodule<span id="merah">*</span></label>
 <div>
  <select class="form-control chosen-select" name="submodule" data-parsley-required="true">
    <option value="Ya">Ya</option>
      <option value="Tidak">Tidak</option> 
     </select>
     </div>
   </div>
 <div class="form-group">
   <label for="message-text" class="form-control-label">Urutan<span id="merah">*</span></label>
   <input type="text" class="form-control" data-parsley-required="true" placeholder="Urutan" name="urutan">
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
    </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- PAGE CONTENT ENDS -->