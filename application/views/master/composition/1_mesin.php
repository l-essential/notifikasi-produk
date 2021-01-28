<script>
function submit_mesin()
{
    send_form(document.form_mesin,"master/composition/simpan_ajax_mesin","#mesin");
}
function edit_mesin(id)
{
    $('input[name=kode_mesin]').val($('#kode_mesin_'+id).val());
    $('input[name=nama_mesin]').val($('#nama_mesin_'+id).val());
    $('input[name=jam_mesin]').val($('#jam_mesin_'+id).val());
    $('input[name=jam_orang]').val($('#jam_orang_'+id).val());
    $('input[name=id_mesin]').val(id);
}
$(document).ready(function() {
    $(".delete_mesin").click(function(){
    var element = $(this);
    var del_id = element.attr("id");
    var info = 'id=' + del_id;
    if(confirm("Anda yakin akan menghapus data ini?"))
    {
        $.ajax({
        type: "POST",
        url : "<?php echo base_url('master/composition/hapus_ajax_mesin')?>",
        data: info,
        success: function(){
        }
        });    
            $(this).parents(".mesin").animate({ opacity: "hide" }, "slow");
        }
    return false;
    });
})
</script>


<form name="form_mesin" method='post' action=''>
<?php
        echo form_hidden('id_mesin');     
    ?>
        <div class="row list-no-order">
            <div class="col-sm-2">
                <input type="hidden" name="id_mesin">
                <input type="hidden" name="id_produk" value="<?php echo $id_produk?>">
                <input type="text" name="kode_mesin" id="kode_mesin" placeholder="Kode Mesin">
            </div>
            <div class="col-sm-2">
                <div class="input-group">
                    <input type="hidden" name="nama_bahan" id="nama_bahan" readonly>
                    <input type="text" name="nama_mesin" id="nama_mesin" placeholder="Nama Mesin">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group">
                    <input type="number" name="jam_mesin" id="jam_mesin" placeholder="Jam Mesin (Menit)">
                </div>
            </div>
            <div class="col-sm-2">
                <div class="input-group">
                    <input type="number" name="jam_orang" id="jam_mesin" placeholder="Jam Orang (Menit)">
                </div>
            </div>
            <div class="col-sm-2">
                <a button type="submit" class="btn btn-info btn-sm" onclick="submit_mesin();">
                <i class="ace-icon fa fa-check bigger-110"></i>Simpan</button></a>
            </div>
        </div>
</form>

<br>
<div class="row">
    <div class="col-sm-12 col-xs-12">
        <table class="table table-striped table-bordered table-hover">
            <thead class="thin-border-bottom">
                <tr>
                    <th>No.</th>
                    <th><i class="ace-icon fa fa-external-link"></i> Kode Mesin </th>
                    <th><i class="ace-icon fa fa-external-link"></i> Nama Mesin </th>
                    <th><i class="ace-icon fa fa-plus"></i> Jam Mesin (Menit) </th>
                    <th><i class="ace-icon fa fa-group"></i> Jam Orang (Menit) </th>
                    <th><i class="ace-icon fa fa-clock-o"></i> Dibuat Oleh </th>
                    <th class="hidden-480">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($mesin as $no => $row):?>
                <tr class="mesin">
                    <td>
                        <input type='hidden' id='<?= $row->id_mesin;?>' value='<?= $row->id_mesin?>' />
                        <input type='hidden' id='kode_mesin_<?php echo $row->id_mesin;?>' value='<?= $row->kode_mesin;?>' />
                        <input type='hidden' id='nama_mesin_<?php echo $row->id_mesin;?>' value='<?= $row->nama_mesin;?>' />
                        <input type='hidden' id='jam_mesin_<?php echo $row->id_mesin;?>' value='<?= $row->jam_mesin;?>' />
                        <input type='hidden' id='jam_orang_<?php echo $row->id_mesin;?>' value='<?= $row->jam_orang;?>' />
                        <?= $no+1?>
                    </td>
                    <td><?= $row->kode_mesin?></td>
                    <td><?= $row->nama_mesin?></td>
                    <td><?= $row->jam_mesin?></td>
                    <td><?= $row->jam_orang?></td>
                    <td><?= $row->create_by?></td>
                    <td align="center">
                        <a href='javascript:void(0)' id="<?= $row->id_mesin?>" title="delete" class="delete_mesin btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        <a href='javascript:void(0)' onclick='edit_mesin(<?php echo $row->id_mesin; ?>)' title="update" class="btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                    </td>                
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<script>
</script>
