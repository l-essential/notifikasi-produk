<div class="page-header">
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
</div>

<div class="widget-box">
    <div class="widget-header">
        <h4 class="widget-title"><?=$sub_judul?></h4>
    </div>
    <div class="widget-body">
        <div class="widget-main no-padding">
            <?php foreach($produk as $row): ?>
             <form method="POST" action="<?php echo site_url('master/composition/update/').$row->id_produk?>" data-parsley-validate="true">
                <fieldset>
                    <div class="content list-no-order">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right">Nama Produk<span id="merah">*</span></label>
                                    <div class="col-sm-8 input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-truck bigger-110"></i>
                                        </span>
                                        <input type="text" class="form-control" name='nama_produk' value="<?= $row->nama_produk?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right">Kode Produk<span id="merah">*</span></label>
                                    <div class="col-sm-8 input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-barcode bigger-110"></i>
                                        </span>
                                        <input type="text" class="form-control" name='kode_produk' value="<?= $row->kode_produk?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right">No. MC<span id="merah">*</span></label>
                                    <div class="col-sm-8 input-group">
                                        <input type="text" class="form-control" name='no_mc' value="<?= $row->no_mc?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right">Batch Size<span id="merah">*</span></label>
                                    <div class="col-sm-8 input-group">
                                        <input type="number" class="form-control" name="batch_size" id="kg" value="<?= $row->batch_size?>" >
                                        <span class="input-group-addon">
                                            Kg
                                        </span>
                                        <input type="number" class="form-control" id="mg" value="<?= $row->batch_size*1000?>" readonly>
                                        <span class="input-group-addon">
                                            Mg
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 center">
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success btn-sm">
                                    <i class="ace-icon fa fa-calculator bigger-110"></i>Calculate</button>
                                    <a href="<?= base_url('master/composition/print_data/').$row->id_produk?>" class="btn btn-info btn-sm"> 
                                    <i class='icon-only ace-icon fa fa-print bigger-110'></i> Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form>
            <?php endforeach;?>
            <div class="tabbable">
                <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
                    <li class="active">
                        <a data-toggle="tab" href="#create_bahan">Create Nama Bahan</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#create_mesin">Create Nama Mesin</a>
                    </li>
                </ul>
                <div class="tab-content" style="border-width:1px;">
                    <body onLoad='loadContent()'>
                    <div id="create_bahan" class="tab-pane in active">
                        <div id="bahan">
                        </div>
                    </div>
                    <div id="create_mesin" class="tab-pane">
                        <div id="mesin">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var site = "<?php echo site_url()?>";
var URL_Site = "<?php echo base_url('master/composition/ajax_bahan/'.$row->id_produk)?>";
function loadContent()
    {
        $('#bahan').load('<?php echo base_url('master/composition/ajax_bahan/'.$row->id_produk)?>');
        $('#mesin').load('<?php echo base_url('master/composition/ajax_mesin/'.$row->id_produk)?>');
    }
$(function () {
  $("#kg").keyup(function () {
    $("#mg").val($("#kg").val() * 1000);
  });
});

  
</script>