<?php
$url_sub    = $this->uri->segment(2);
$url_sub3   = $this->uri->segment(3);
$url_sub4   = $this->uri->segment(4);
$id_group   = $this->session->userdata('id_group');
$akses_edit = $this->role_model->view_submodule($id_group, $url_sub);
?>
<style>
  th {
    text-align : center;
  }
</style>
<div class="widget-box">
  <div class="widget-header">
    <h4 class="widget-title"><?php echo $sub_judul?></h4>
    <div class="widget-toolbar">
        <?php
        if($akses_edit->c ==1){
            include('add.php');
            include('import_produk.php');
            include('import_bahan.php');
        }?>
    </div>
  </div>
  <div class="widget-body">
    <div class="widget-main">
      <div>  
        <?php
          $data=$this->session->flashdata('sukses');
          if($data!=""):
        ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <i class="icon fa fa-check"></i> <?php echo $data; ?></div>
          <?php  
            endif;
          ?>
          <?php
            $data2=$this->session->flashdata('error');
            if($data2!=""): 
          ?>
          <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <i class="icon fa fa-close"></i> <?php echo $data2;?>
          </div>
          <?php 
            endif; 
            echo validation_errors('<div class="alert alert-danger">','</div>'); 
          ?>
      </div>
      <div>
        <div style="margin-top: 20px;"> 
        
          <table id="example" class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="center">No</th>
                <th class="center">Nama Produk</th>
                <th class="center">No. MC</th>
                <th class="center">Kode Produk</th>
                <th class="center">Batch Size (Kg)</th>
                <th class="center">Total Bahan</th>
                <th class="center">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($produk as $no => $row):?>
            <tr class="prod">
                <td><?= $no+1?></td>
                <td><?= '('.$row->id_produk.') '.$row->nama_produk?></td>
                <td><?= $row->no_mc?></td>
                <td><?= $row->kode_produk?></td>
                <td><?= $row->batch_size?></td>
                <td><a href="javascript:void(0)" onclick="modalDetailProduct('<?php echo $row->id_produk ?>')">
                    <?php echo $row->total_produk.' produk' ?> (<i class="fa fa-eye"></i>)
                  </a>
                </td> 
                <td align="center"><?php include('data-action.php')?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'modal_detail_product.php'; ?>
<script>
var totalPrice = 0;
var i;
var arr=[];

$("td.price").each(function(){
  arr.push($(this).text());
    var price = $(this).text()
    totalPrice += Number(price);
    document.getElementById("setTotal").innerHTML = "Sum is "+totalPrice+ ".";
});
function modalDetailProduct(id)
{
  var modal_id = '#modal-detail-product';
  $.ajax({
    method: 'GET',
    url: "<?= base_url("master/composition/ajax_detail_all")?>",
    data: {id: id},
    dataType: 'json',
    success: function(res)
    {
      var html_tbody = "";
      var html_tfoot = "";

      $('#nama_produk').html(res.nama.nama_produk);
      $('#kode_produk').html(res.nama.kode_produk);
      $('#no_mc').html(res.nama.no_mc);
      $('#batch_size').html(res.nama.batch_size + ' Kg = ' + (res.nama.batch_size)*1000 + ' Gram');
      var total = 0;
      var total2 = 0;
      for (var i=0; i<res.bahan.length; i++){
        total += parseFloat(res.bahan[i].persen);      
        total2 += parseFloat(((res.bahan[i].persen)*res.nama.batch_size)*1000)/100;

        html_tbody += "<tr> ";
        html_tbody += "<td> "+ (i+1) +"  </td> ";
        html_tbody += "<td> "+ res.bahan[i].kode_bahan +"  </td> ";
        html_tbody += "<td> "+ res.bahan[i].nama_bahan +"  </td> ";
        html_tbody += "<td> "+ res.bahan[i].no_standar_bahan +"  </td> ";
        html_tbody += "<td> "+ res.bahan[i].persen.toFixed(4) +"</td> ";
        html_tbody += "<td> "+ ((((res.bahan[i].persen)*res.nama.batch_size)*1000)/100).toFixed(4) +"</td> ";
        html_tbody += "</tr> ";

      }
      $(modal_id + " tbody").html(html_tbody);
        html_tfoot += "<tr> ";
        html_tfoot += "<td colspan='4'> "+ 'Total' +"</td> ";
        html_tfoot += "<td> "+ total.toFixed(4) +"</td> ";
        html_tfoot += "<td> "+ total2.toFixed(4) +"</td> ";
        html_tbody += "</tr> ";
      $(modal_id + " tfoot").html(html_tfoot);
      $(modal_id).modal('show');
    }
  });
}
  jQuery(document).ready(function ()
  {
    jQuery('#example').DataTable({
      "language": {
        "url": "<?php echo base_url("assets/datatables/lang/id.json") ?>"
      },
      'scrollY': 250,
      'scrollX': true
    });
  }); 
  var url="<?php echo base_url();?>";
    function delete_produk(id){
      var url="<?php echo base_url();?>";
       var r=confirm("Do you want to delete this?")
        if (r==true)
          window.location = url+"master/composition/delete_produk/"+id;
        else
          return false;
        } 
</script>
