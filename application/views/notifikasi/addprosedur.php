<div class="page-header">
  <h1>
    Formula Notifikasi <b style="text-transform:uppercase"><?= $merekbyid[0]['namamerek']; ?></b>
  </h1>
</div><!-- /.page-header -->

<?= $this->session->flashdata('message'); ?>
<div class="page-header">
<h4>
    2. Prosedur Pembuatan 
</h4>
</div><!-- /.page-header -->

<a href="#tambahprocedure" role="button" data-toggle="modal" button type="button" class="btn btn-success btn-primary no-radius">
<i class="ace-icon fa fa-plus-circle bigger-230"></i> Tambah data</button></a>  

<a href="#importprosedur" role="button" data-toggle="modal" button type="button" class="btn btn-success btn-primary no-radius">
<i class="ace-icon fa fa-download bigger-230"></i> Import Data</button></a> 

<?php if(!empty($prosedur)){?>
<a href="<?= base_url('fnp/notifikasi/delallpro/'); ?><?= $merekbyid[0]['idmerek']; ?>" role="button" data-toggle="modal" button type="button" class="btn btn-danger btn-primary no-radius">
<i class="ace-icon fa fa-trash bigger-230"></i> Hapus Semua Data</button></a> 
<?php } ?>

<div class="clearfix">
    <div class="pull-right tableTools-container"></div>
</div>

<table id="example3" class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th class="center">No.</th>
        <th class="center">Prosedur Pembuatan</th>
        <th class="center">Opsi</th>
    </tr>
    </thead>
    <tbody>
    <?php 
      function KonDecRomawi($angka)
      {
        $hsl = "";
        if ($angka < 1 || $angka > 5000) { 
          // Statement di atas buat nentuin angka ngga boleh dibawah 1 atau di atas 5000
          $hsl = "Batas Angka 1 s/d 5000";
        } else {
          while ($angka >= 1000) {
            // While itu termasuk kedalam statement perulangan
            // Jadi misal variable angka lebih dari sama dengan 1000
            // Kondisi ini akan di jalankan
            $hsl .= "M"; 
            // jadi pas di jalanin , kondisi ini akan menambahkan M ke dalam
            // Varible hsl
            $angka -= 1000;
            // Lalu setelah itu varible angka di kurangi 1000 ,
            // Kenapa di kurangi
            // Karena statment ini mengambil 1000 untuk di konversi menjadi M
          }
        }
      
      
        if ($angka >= 500) {
          // statement di atas akan bernilai true / benar
          // Jika var angka lebih dari sama dengan 500
          if ($angka > 500) {
            if ($angka >= 900) {
              $hsl .= "CM";
              $angka -= 900;
            } else {
              $hsl .= "D";
              $angka-=500;
            }
          }
        }
        while ($angka>=100) {
          if ($angka>=400) {
            $hsl .= "CD";
            $angka -= 400;
          } else {
            $angka -= 100;
          }
        }
        if ($angka>=50) {
          if ($angka>=90) {
            $hsl .= "XC";
            $angka -= 90;
          } else {
            $hsl .= "L";
            $angka-=50;
          }
        }
        while ($angka >= 10) {
          if ($angka >= 40) {
            $hsl .= "XL";
            $angka -= 40;
          } else {
            $hsl .= "X";
            $angka -= 10;
          }
        }
        if ($angka >= 5) {
          if ($angka == 9) {
            $hsl .= "IX";
            $angka-=9;
          } else {
            $hsl .= "V";
            $angka -= 5;
          }
        }
        while ($angka >= 1) {
          if ($angka == 4) {
            $hsl .= "IV"; 
            $angka -= 4;
          } else {
            $hsl .= "I";
            $angka -= 1;
          }
        }
      
        return ($hsl);
      }
        $no = 1; 
        foreach($prosedur as $p){ 
    ?>
    <tr>          
        <td align="center"><?= KonDecRomawi($no++); ?></td>    
        <td align="left"><?= $p['prosedur']; ?></td>
        <td align="center">
            <a class="btn btn-minier btn-warning show-option" href="<?= base_url('fnp/notifikasi/editprosedur/'); ?><?= $p['idprosedur']; ?>/<?= $merekbyid[0]['idmerek']; ?>" title="Edit Data">
            <i class="ace-icon fa fa-pencil bigger-120"></i></a>

            <a class="btn btn-minier btn-danger show-option" href="<?= base_url('fnp/notifikasi/hapusprosedur/'); ?><?= $p['idprosedur']; ?>/<?= $merekbyid[0]['idmerek']; ?>" title="Hapus Data" onclick="return confirm('Apakah kamu yakin akan menghapus prosedur <?= $p['prosedur']; ?>?');">
            <i class="ace-icon fa fa-trash bigger-120"></i></a>
        </td>        
    </tr>  
    <?php } ?>
    </tbody>
</table>

<div class="row">
    <div class="col-sm-12 center">
        <div class="form-actions">
            <a href="<?= base_url('fnp/notifikasi/'); ?>" name="submit" class="btn btn-danger"><i class='icon-only ace-icon fa fa-arrow-left bigger-110'></i> Kembali</a>
        </div>
    </div>
</div>


<!-- modal -->
<div id="tambahprocedure" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <span class="white">&times;</span>
        </button>
        Prosedur Pembuatan
        </div>
      </div>

      <div class="modal-body">
        <form method="POST" action="<?= base_url('fnp/notifikasi/addprosedur/'); ?><?= $merekbyid[0]['idmerek']; ?>" data-parsley-validate="true">
            
            <div class="form-group">
            <label for="message-text" class="form-control-label">Prosedur Pembuatan<span id="merah">*</span></label>
            <input type="text" name="prosedur" id="prosedur" class="form-control" placeholder="Prosedur Pembuatan" required>
            <?= form_error('prosedur', '<small class="text-danger pl-3">', '</small>')?>
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
        </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- PAGE CONTENT ENDS -->

<!-- ====================================================================== MODAL IMPORT -->
<div id="importprosedur" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="width:750px;">
            <div class="modal-header no-padding">
                <div class="table-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="white">&times;</span>
                    </button>
                    Import Data Prosedur by CSV
                </div>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url('fnp/notifikasi/importprosedur/'); ?><?= $merekbyid[0]['idmerek']; ?>" enctype="multipart/form-data" data-parsley-validate="true">

                <label for="message-text" class="form-control-label">Pilih File CSV <span id="merah">*</span></label>
                <input type="file" name="csv" id="csv" accept="text/csv" required>
                <?= form_error('csv', '<small class="text-danger pl-3">', '</small>')?>
                
                </div>
                <div class="modal-footer no-margin-top">
                    <button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                    Close
                    </button>                     
                    <ul class="pagination pull-right no-margin">
                    <button class="btn btn-sm btn-primary pull-left" type="submit" name="import">
                    <i class="ace-icon fa fa-check"></i>
                    Import
                    </button>
                    </ul>
                </div>
                </form>
        </div>
    </div>
</div>