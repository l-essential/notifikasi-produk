<script>
    function submit_bahan()
    {
        send_form(document.form_bahan,"master/composition/simpan_ajax_bahan","#bahan");
    }
    function edit_bahan(id)
    {
        $('#select_ajax').val($('#nama_bahan_'+id).val());
        $('input[name=kode_bahan]').val($('#kode_bahan_'+id).val());
        $('input[name=no_standar_bahan]').val($('#no_standar_bahan_'+id).val());
        $('input[name=persen]').val($('#persen_'+id).val());
        $('input[name=id_komposisi_produk]').val(id);
    }
    $(document).ready(function() {
        $(".delete_bahan").click(function(){
        var element = $(this);
        var del_id = element.attr("id");
        var info = 'id=' + del_id;
        if(confirm("Anda yakin akan menghapus data ini?"))
        {
            $.ajax({
            type: "POST",
            url : "<?php echo base_url('master/composition/hapus_ajax_bahan')?>",
            data: info,
            success: function(){
            }
            });    
                $(this).parents(".bahan").animate({ opacity: "hide" }, "slow");
            }
        return false;
        });
    })
</script>
<form name="form_bahan" method='post' id="form_bahan" action=''>
<?php
        echo form_hidden('id_komposisi_produk');     
    ?>
        <div class="row list-no-order">
            <div class="col-sm-4">
                <input type="hidden" name="id_komposisi_produk">
                <input type="hidden" name="id_produk" value="<?php echo $id_produk?>">
                <select class="select2 form-control kode_bahan" name="kode_bahan" id="select_ajax">
                </select>
                <select class="select2 form-control subtitusi" name="subtitusi" id="subtitusi">
                    <option value=""></option>
                </select>
            </div>
            <div class=" col-sm-2">
                <div class="input-group">
                    <input type="hidden" name="nama_bahan" id="nama_bahan" readonly>
                    <input type="text" id="kode_bahan" name="kode_bahan" placeholder="Kode Produk" readonly required>
                    <small class="text-danger">tidak boleh kosong</small>
                    <!-- <input type="text" name="kode_bahan" id="kode_bahan" placeholder="Kode Bahan"readonly> -->
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group">
                    <input type="text" name="no_standar_bahan" id="no_standar_bahan" placeholder="No. Standar Bahan">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group">
                    <input type="number" min="0" step="0.01" name="persen" id="persen" placeholder="Persentase(%)" required>
                    <small class="text-danger">tidak boleh kosong</small>

                </div>
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-info btn-sm" onclick="submit_bahan();">
                <i class="ace-icon fa fa-check bigger-110"></i>Simpan</button>
            </div>
        </div>
</form>
<br>
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <table class="table table-striped table-bordered table-hover" id="dataTable">
            <thead class="thin-border-bottom">
                <tr>
                    <th>No.</th>
                    <th><i class="ace-icon fa fa-external-link"></i> Kode Bahan </th>
                    <th><i class="ace-icon fa fa-external-link"></i> Nama Bahan </th>
                    <th><i class="ace-icon fa fa-external-link"></i> Substitusi </th>
                    <th><i class="ace-icon fa fa-plus"></i> Nomor Standar Bahan </th>
                    <th><i class="ace-icon fa fa-group"></i> Persentase(%) </th>
                    <th><i class="ace-icon fa fa-clock-o"></i> Jumlah </th>
                    <th><i class="ace-icon fa fa-clock-o"></i> Dibuat Oleh </th>
                    <th class="hidden-480">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($bahan as $no => $row):
                        $batch = $this->M_Produk->tbl_produk('t_head')
                                    ->where('id_produk', $row->id_produk)
                                    ->get()
                                    ->row();
                        $total[] = floatval($row->persen);
                        $jumlah[] = floatval((($row->persen*$batch->batch_size)*1000)/100);
                ?>    
                <tr class="bahan">
                    <td>
                        <input type='hidden' id='<?= $row->id_komposisi_produk;?>' value='<?= $row->id_komposisi_produk?>' />
                        <input type='hidden' id='nama_bahan_<?php echo $row->id_komposisi_produk;?>' value='<?= $row->nama_bahan;?>' />
                        <input type='hidden' id='kode_bahan_<?php echo $row->id_komposisi_produk;?>' value='<?= $row->kode_bahan;?>' />
                        <input type='hidden' id='no_standar_bahan_<?php echo $row->id_komposisi_produk;?>' value='<?= $row->no_standar_bahan;?>' />
                        <input type='hidden' id='persen_<?php echo $row->id_komposisi_produk;?>' value='<?= $row->persen;?>' />
                        <?= $no+1?>
                    </td>
                    <td><?= $row->kode_bahan?></td>
                    <td><?= $row->nama_bahan?></td>
                    <td>
                    <?php $a = $this->M_Data_Produk->row_produk($row->kode_bahan);
                        $b = $this->M_Data_Produk->prod_subt($a->M_PRODUCT_ID);
                        if(!empty($a))
                        {
                            foreach ($b as $key => $value):
                    ?>                  
                    <?= $value->VALUE.' - '.$value->NAME.'<br>'?>                    
                    <?php
                        endforeach;
                    } ?>            
                    </td>
                    <td><?= $row->no_standar_bahan?></td>
                    <td>
                        <?= number_format($row->persen,4)?>
                    </td>
                    <td class="price">
                        <?= number_format(((($row->persen*$batch->batch_size)*1000)/100),4)?>
                    </td>
                    <td><?= $row->create_by?></td>
                    <td align="center">
                        <a href='javascript:void(0)' id="<?= $row->id_komposisi_produk?>" class="delete_bahan btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        <a href='javascript:void(0)' onclick='edit_bahan(<?php echo $row->id_komposisi_produk; ?>)' title="update" class="btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total</b></th>
                    <th><b>
                    <?php
                        if (!empty($total) && array_sum($total) <= 99.9) {
                            echo "<span class='label label-danger arrowed-in'>Persentase <b>Kurang</b> Dari <b>100%</b> </span>" ;
                        }elseif(!empty($total) && array_sum($total) <= 100) {
                            echo "<span class='label label-success arrowed-in arrowed-in-right'>PASS <b>100%</b></span>";
                        }else{
                            echo "<span class='label label-danger arrowed-in'>Persentase <b>Lebih</b> Dari <b>100%</b></span>" ;
                        }
                    ?>
                    </b></th>
                    <th><?= !empty($total) ? number_format((array_sum($total)),4) : "-"?></th>
                    <th><?= !empty($jumlah) ? number_format((array_sum($jumlah)),4) : "-"?></th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script>
$(document).ready(function(){
    evtNoReturChose();
    evtSearch();
    $('#subtitusi').select2({
        placeholder: '--- Select Substitusi ---',
        allowClear: true});
});
function evtSearch()
{
    $('#select_ajax').select2({
    placeholder: '--- Select Produk ---',
    allowClear: true,
    ajax: {
        url:  "<?= base_url()?>master/composition/tes",
        dataType: 'json',
        type    : 'POST',
        delay: 250,
        processResults: function (data) {
            return {
                results: data
            };
        },
        cache: true
        }
    });         
}
function evtNoReturSearch(evt)
{
    var options = {
    ajax          : {
        emptyRequest: true,
        url     : "<?= base_url()?>master/composition/ajax_get_data",
        type    : 'POST',
        dataType: 'json',
        data    : {
            q: '{{{q}}}'
        }
    },
    locale        : {
        emptyTitle: 'Cari Nama Bahan'
    },
    log           : 3,
    preprocessData: function (data) {
        var i, l = data.length, array = [];
        if (l) {
            for (i = 0; i < l; i++) {
                array.push($.extend(true, data[i], {
                    text : data[i].NAME,
                    value: data[i].VALUE,
                    data : {
                        subtext: data[i].VALUE
                    }
                }));
            }
        }
        return array;
    }
    };
    if(evt == 'init'){
    $('.selectpicker').selectpicker().filter('.with-ajax').ajaxSelectPicker(options);
    }else if(evt == 'render'){
    $('.selectpicker').selectpicker().filter('.with-ajax').ajaxSelectPicker('render');
    }
}
function evtNoReturChose()
    {
        $('.kode_bahan').change(function(e)
        {
            var obj_select = $(this);
            var no_order = this.value;
            var html = '';
            var i;
            if(no_order != undefined)
            {
                $.ajax({
                    method: 'POST',
                    url     :   "<?= base_url()?>master/composition/ajax_get_detail",
                    dataType : 'json',
                    data:{
                        id: no_order
                    },
                    success: function(res)
                    {
                        obj_select.closest(".list-no-order").find("#nama_bahan").val(res.prod.NAME);
                        obj_select.closest(".list-no-order").find("#kode_bahan").val(res.prod.VALUE);
                        for(i=0; i < res.subtitusi.length; i++)
                        {
                            html += "<option value='"+ res.subtitusi[i].VALUE + "'> "+ 'Substitusi : ' +res.subtitusi[i].VALUE+ ' - ' + res.subtitusi[i].NAME +"</option>";
                        }
                        $('#subtitusi').html(html);
                    }
                });
            }
        });
    }
</script>
