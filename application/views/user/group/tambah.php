<a href="#Tambah" role="button" data-toggle="modal" button type="button" class="btn btn-primary btn-minier">
     <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Tambah Data</button></a>  

<!-- modal -->
<div id="Tambah" class="modal fade" tabindex="-1">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header no-padding">
       <div class="table-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
           <span class="white">&times;</span>
         </button>
         Create Group
       </div>
     </div>
<div class="modal-body">
<form method="POST" action="<?php echo base_url(); ?>user/group" data-parsley-validate="true">
<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
  <div class="form-group">
    <label for="message-text" class="form-control-label">Nama Group<span id="merah">*</span></label>
   <input type="text" class="form-control" data-parsley-required="true" placeholder="Nama Group" name="nama_group">
 </div>
 <div class="form-group">
   <label for="message-text" class="form-control-label">Keterangan</label>
   <input type="text" class="form-control" placeholder="Keterangan" name="keterangan">
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