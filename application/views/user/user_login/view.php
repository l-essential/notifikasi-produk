<button class="btn btn-minier btn-primary show-option" data-toggle="modal" title="View Data" data-target="#View<?php echo $userlogin->id_login; ?>"><i class="fa fa-eye bigger-120"></i></button>

<div id="View<?php echo $userlogin->id_login; ?>" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header no-padding">
       <div class="table-header">
         <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
           <span class="white">&times;</span>
         </button>
         View User Name
       </div>
     </div>
<div class="modal-body">
   <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-bordered table-hover">
  <tr>
    <td>User Name</td>
    <td><?php echo $userlogin->username; ?> </td>
  </tr>
  <tr>
    <td>Create Date</td>
    <td><?php echo $userlogin->create_date; ?> </td>
  </tr>
  <tr>
    <td>Create By</td>
    <td><?php echo $userlogin->create_by; ?> </td>
  </tr>
  <tr>
    <td>Change Date</td>
    <td><?php echo $userlogin->change_date; ?> </td>
  </tr>
  <tr>
    <td>Change By</td>
    <td><?php echo $userlogin->change_by; ?> </td>
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