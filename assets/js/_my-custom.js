function modalConfirm(id, url, title, body, reason)
{
  var modal_id = '#modal-confirm';

  $('#modal-confirm .id-trx').val(id);

  if(url !== undefined){
    $(modal_id + ' form').attr('action', url);
  }

  if(title !== undefined){
    $(modal_id + ' .modal-title').html(title);
  }

  if(body !== undefined){
    $(modal_id + ' .modal-body p').html(body);
  }

  if(reason){
    $(modal_id + ' .input-reason input[name="reason"]').val('');
    $(modal_id + ' .input-reason').css({'display': 'block'});
  }else{
    $(modal_id + ' .input-reason').css({'display': 'none'});
  }

  $(modal_id).modal('show');
}

function myDatatablesAjax(url, columns)
{
  $('#table-main').DataTable({
     'processing': true,
     'serverSide': true,
     'serverMethod': 'post',
     'ajax': {
         'url': url
     },
     'columns': columns,
     "columnDefs": [{
       "targets": 'no-sort',
       "orderable": false,
     }],
     "order": [[1, 'asc']],
     "language": {
       "url": SITE_URL + "/assets/datatables/lang/id.json"
     }
  });
}

