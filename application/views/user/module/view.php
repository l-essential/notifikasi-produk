<button class="btn btn-minier btn-primary" data-toggle="modal" title="View Data" data-target="#View<?php echo $module->id_module; ?>"><i class="fa fa-eye bigger-120"></i></button>

<div id="View<?php echo $module->id_module; ?>" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header no-padding">
       <div class="table-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
           <span class="white">&times;</span>
         </button>
         View Module
       </div>
     </div>
<div class="modal-body">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
    <td>Nama Module</td>
    <td><?php echo $module->nama_module; ?> </td>
  </tr>
  <tr>
    <td>Urutan</td>
    <td><?php echo $module->urutan; ?> </td>
  </tr>
</table>
</div>
<div class="clearfix"></div>
      <div class="modal-footer no-margin-top">                           
        <ul class="pagination pull-right no-margin">
          <button class="btn btn-sm btn-primary pull-left" data-dismiss="modal">
          <i class="ace-icon fa fa-times"></i>
          Close        
        </button>
        </ul>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- PAGE CONTENT ENDS -->