<?php
$nama_dokumen='Print Master Komposisi'; 
include(APPPATH.'/third_party/mpdf/mpdf.php');
$mpdf=new mPDF('utf-8', 'A4', 10.5);
ob_start();
?>

<style>
   body {
  margin: 0;
  padding: 0;
  background-color: #FAFAFA;
  font: 10pt "Tahoma";
  }
  {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  }
  .full {
    display: block;
    clear: both;
    width:100%;
    float: left;
  }
  .label-danger{background-color:#FF0000}
  .label-warning{background-color:#FFFF00}
  .label-success{background-color:#00FFFF}
  .label-default{background-color:#0000FF }
  .page {
    width: 29.7cm;
    min-height: 21cm;
    padding: 1cm;
    size: landscape;
    background: white;
    font-size:10px;
  }
  .judul {
    text-align: center;
    font-size: 14px;
    text-transform:uppercase;
  }
  .calendar_table {
      border: 0px
  }
  .judul th, .judul td {
    font-family: Cambria,"Times New Roman",serif;
    text-align: center !important;
    border-right: none;
    border-left: none;
    border-bottom: none;
  }
  .jadwal th, .jadwal td {
    border: none;
  }

  h2 {
    font-size: 18px;
    text-align: center;
    font-family: Cambria,"Times New Roman",serif;
    font-weight: bold;
    color: #066;
    margin: 0;
  }
  h3{
    font-family: Cambria,"Times New Roman",serif; 
  }
  h1{
    font-family: Cambria,"Times New Roman",serif; 
  }
  .logo {
    width: 2cm;
    padding: 2mm;
    text-align: center;
  }
  .logo img, img.logo {
    width: 100%;
    height: auto;
  }
  .foto {
    width: 3cm;
    height: auto;
    padding: 1mm;
    border: solid 1mm #CCC;
    float: left;
    text-align: center;
  }
  .foto img, img.foto {
    width: 3cm;
    height: auto !important;
  }
  .jadwal {
    float: right;
    width: 14.2cm;
    min-height: 4cm;
    height: auto;
    margin-left: 3mm;
    font-size: 11px;
  }
  .page .setengah {
    width: 21cm;
    height: auto;
    padding: 5mm;
    float: left;
  }
  .page .setengah1 {
    width: 21cm;
    height: auto;
    padding: 0 5mm;
    float: left;
  }
  table {
    border: solid thin #CCC;
    width: 100%;
    border-collapse:collapse;
    margin-bottom: 2mm;
  }
  td {
    font-family: "Times New Roman",serif;
    padding: 1mm 2mm;
    font-size: 8px;
    vertical-align: top;
    border-collapse:collapse;
  }
  td.subt {
    font-family: "Times New Roman",serif;
    padding: 1mm 2mm;
    font-size: 10px;
    vertical-align: top;
    border-collapse:collapse;
  }
  th {
    text-align: center;
    font-size: 11px;
    background-color: #F5F5F5;
  }
  td.title {
    text-align: center !important;
  }
  .subpage {
    padding: 1cm;
    height: 256mm;
    size: landscape;
  }
  .sponsor {
    width: 100%;
    max-height: 8cm;
  }

  @page {
    size: 10cm;
    margin: 10;
    size:landscape;
  }
</style>
<!DOCTYPE html>
<html lang="en">
<body>
    <table  class="calendar_table">
        <tr>
            <td colspan="5" align="center"><h3>PT.L'ESSENTIAL - MASTER KOMPOSISI</h3></td>
        </tr> 
    </table>
    <div style="border-left:1;">
        <table class="calendar_table" style="margin-bottom:0;" >
            <thead>
                <tr>
                    <td>Nama Produk</td>
                    <td><?= $produk->nama_produk?></td>
                </tr>
                <tr>
                    <td >Kode Produk</td>
                    <td ><?= $produk->kode_produk?></td>
                </tr>
                <tr>
                    <td >No. MC</td>
                    <td ><?= $produk->no_mc?></td>
                </tr>
                <tr>
                    <td >Batch Size</td>
                    <td ><?= $produk->batch_size.' Kg ='.(($produk->batch_size)*1000).' Gram'?></td>
                </tr>
            </thead>
        </table>

    </div>
    <table class="calendar_table" border="1">
        <thead>
            <tr style="background-color:#969696;">
                <td>No</td>
                <td>Kode Bahan</td>
                <td>Nama Bahan</td>
                <td>No. Standar Bahan</td>
                <td>Persentase (%)</td>
                <td>Jumlah</td>
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
                $total_item[] = $row->kode_bahan;
            ?>
            <tr>
                <td><?= $no+1?></td>
                <td><?= $row->kode_bahan?></td>
                <td><?= $row->nama_bahan?></td>
                <td><?= $row->no_standar_bahan?></td>
                <td><?= number_format($row->persen,4)?></td>
                <td><?= number_format((($row->persen)*100),4)?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"><?= !empty($total) ? 'Banyak Item :'.count($total_item) : "-"?></td>
                <td>Total</td>
                <td><?= !empty($total) ? number_format((array_sum($total)),4) : "-"?></td>
                <td><?= !empty($jumlah) ? number_format((array_sum($jumlah)),4) : "-"?></td>
            </tr>
        </tfoot>
    </table>
    <table class="calendar_table" border="1">
        <thead>
            <tr style="background-color:#969696;">
                <td>No</td>
                <td>Kode Mesin</td>
                <td>Nama Mesin</td>
                <td>Jam Mesin (Menit)</td>
                <td>Jam Orang (Menit)</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($mesin as $no => $row):?>
            <tr>
                <td><?= $no+1?></td>
                <td><?= $row->kode_mesin?></td>
                <td><?= $row->nama_mesin?></td>
                <td><?= $row->jam_mesin?></td>
                <td><?= $row->jam_orang?></td>
            </tr>
            <?php endforeach;?>
        </tbody> 
    </table>
    <!-- <table  class="calendar_table" border="1">
      <tr>
        <td align="center" width="33.3%" height="100">Dibuat Oleh</td>
        <td align="center" width="33.3%" height="100">Diperiksa Oleh</td>
        <td align="center" width="33.3%" height="100">Disetujui Oleh</td>
      </tr>
      <tr>
        <td align="center" width="33.3%">Mgr</td>
        <td align="center" width="33.3%">Mgr</td>
        <td align="center" width="33.3%">Mgr</td>
        
      </tr>
    </table> -->
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
// $mpdf->Output($nama_dokumen.".pdf" ,'D');
exit;
?>