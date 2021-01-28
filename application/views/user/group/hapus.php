<button class="btn btn-minier btn-danger" data-toggle="modal" title="Hapus Data" data-target="#Hapus<?php echo $group->id_group; ?>"><i class="fa fa-trash-o bigger-120"></i></button>

<div id="Hapus<?php echo $group->id_group; ?>" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header no-padding">
       <div class="table-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
           <span class="white">&times;</span>
         </button>
         Hapus Group
       </div>
     </div>
<div class="modal-body">
 <div class="form-group">
  <label class="form-control-label">Hapus data Group ini ??</label></i>
   </div>
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
    <td>Nama Group</td>
    <td><?php echo $group->nama_group; ?> </td>
  </tr>
  <tr>
    <td>Keterangan</td>
    <td><?php echo $group->keterangan; ?> </td>
  </tr>
</table>
</div>
<div class="clearfix"></div>

      <div class="modal-footer no-margin-top">
        <button class="btn btn-sm btn-primary pull-left" data-dismiss="modal">
          <i class="ace-icon fa fa-times"></i>
          Close
        </button>                     
        <ul class="pagination pull-right no-margin">
          <a href="<?php echo base_url('user/group/hapus/'.$group->id_group); ?>" class="btn btn-sm btn-danger pull-left">
          <i class="fa fa-trash"> Hapus</i></a>          
        </button>
        </ul>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- PAGE CONTENT ENDS -->