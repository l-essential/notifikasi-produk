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
         Create Submodule
       </div>
     </div>
<div class="modal-body">
<form method="POST" action="<?php echo base_url(); ?>user/submodule" data-parsley-validate="true">
<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
<div class="form-group">
<label for="message-text" class="form-control-label">Module<span id="merah">*</span></label>
<div>
<select class="form-control chosen-select" name="id_module" data-parsley-required="true" data-placeholder="Pilih Module Yang Di Gunakan........">
<option></option>
     <?php foreach ($module as $module) { ?>      
      <option value="<?php echo $module->id_module ?>"><?php echo $module->nama_module ?></option> 
      <?php } ?>  
   </select>
  </div>
</div>
  <div class="form-group">
    <label for="message-text" class="form-control-label">Nama Submodule</label>
   <input type="text" class="form-control" placeholder="Nama Submodule" name="nama_submodule">
 </div>
 
   <div class="form-group">
   <label for="message-text" class="form-control-label">URL</label>
   <input type="text" class="form-control" placeholder="URL" name="url_sub">
 </div>
 <div class="form-group">
<label for="message-text" class="form-control-label">Jenis Form<span id="merah">*</span></label>
<div>
<select class="form-control chosen-select" id="form-field-select-3" name="jenis_form" data-parsley-required="true" data-placeholder="Pilih Jenis Form........">
    <option></option>
      <option value="Input">Input</option>
      <option value="Laporan">Laporan</option>
      <option value="Module">Module</option>  
      <option value="Grafik">Grafik</option>  
   </select>
 </div>
</div>
 <div class="form-group">
   <label for="message-text" class="form-control-label">Urutan</label>
   <input type="text" class="form-control" placeholder="Urutan" name="urutan">
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