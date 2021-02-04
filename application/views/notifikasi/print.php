<?php 
    use \Mpdf\Mpdf;
    $file = 'FNP-' . $merek['namamerek'] . '.pdf';
    //$mpdf = new Mpdf('utf-8', 'A4', 10.5, 'Arial');
    $mpdf = new Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'default_font' => 'Arial']);

    // var_dump($this->session->userdata());die;

    ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-4" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?= $merek['namamerek']; ?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <style>
        table, td{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            width: 100%;
        }
    </style>

</head>
<body>
    <table style="font-size: 50px;">
        <tr>
            <td style="width:400%;"><img src="<?= base_url(); ?>assets/ico/logo2.png" alt="" width="500px"></td>
            <!-- <td>
                Halaman<br><br>
                No. Formulir<br><br>
                No. Revisi <br><br>
                Tanggal Berlaku 
            </td>
            <td style="width:100%;">
                :  <br><br>
                :  <br><br>
                :  <br><br>
                : 
            </td> -->
        </tr>
        <tr>
            <td style="text-align: center;" colspan="4">
                <h4><b>FORMULA NOTIFIKASI PRODUK</b></h4>
            </td>
        </tr>
    </table>
    <table style="font-size: 40px;">
        <tr>
            <td><b>Merek</b></td>
            <td style="text-transform:uppercase"><b>: <?= $merek['namamerek']; ?></b></td>
            <td><b>No. Formula</b></td>
            <td><b>: <?= $merek['noformula']; ?></b></td>
        </tr>
        <tr>
            <td><b>Nama Produk</b></td>
            <td><b>: <?= $merek['namaproduk']; ?></b></td>
            <td><b>No. Revisi</b></td>
            <td><b>: <?= $merek['norevisi']; ?></b></td>
        </tr>
        <tr>
            <td><b>Bentuk Sediaan</b></td>
            <td><b>: <?= $merek['bentuksediaan']; ?></b></td>
            <td><b>Tanggal Berlaku</b></td>
            <td><b>: <?= date('d F Y', strtotime($merek['tglberlaku'])); ?></b></td>
        </tr>
        <tr>
            <td><b>Warna Sediaan</b></td>
            <td><b>: <?= $merek['warnasediaan']; ?></b></td>
            <td><b>Formula Khusus</b></td>
            <td><b>: <?= $merek['formulakhusus']; ?></b></td>
        </tr>

        <?php $no=1; foreach($bk as $b){?>
        <tr>     
            
            <td>
                <b>Bentuk Kemasan <?= $no++;?></b><br>
                <b>1. Kemasan Primer</b><br>
                <b>2. Kemasan Sekunder</b><br>
                
            </td>
            
            <td><br>
                <b>: <?= $b['primer']; ?></b><br>
                <b>: <?= $b['sekunder']; ?></b><br>
            </td>
            
            <td><b>Ukuran Kemasan</b></td>
            <td><b>: <?= $b['ukurankemasan']; ?> <?= $b['satuan']; ?></b></td>
        </tr>
        <?php } ?>
        
        
        <tr>
            <td><b>Persamaan Produk</b></td>
            <td colspan="3"><b>: <?= $merek['persamaanproduk']; ?></b></td>
        </tr>
        <tr>
            <td><b>Kategori</b></td>
            <td colspan="3"><b>: <?= $merek['kategori']; ?></b></td>
        </tr>
        <!-- <tr>
            <td><b>Sub Kategori*</b></td>
            <td colspan="3"><b>: <?= $merek['subkategori']; ?></b></td>
        </tr> -->
        <tr>
            <td style="background-color: grey;" colspan="4"></td>
        </tr>
        <tr>
            <td colspan="4"><b>1. Komposisi</b></td>
        </tr>
    </table>

    <table style="font-size: 50px;">
        <tr>
            <td style="width:20%; text-align: center;"><b>No.</b></td>
            <td style="width:150%; text-align: center;"><b>Nama Dagang</b></td>
            <td style="text-align: center;"><b>INCI Name</b></td>
            <td style="text-align: center;"><b>Fungsi</b></td>
            <td style="text-align: center;"><b>No. CAS</b></td>
            <td style="text-align: center;"><b>Konsentrasi (%)</b></td>
        </tr>
        <?php 
            $n=0; 
            foreach($komposisi as $k) {
            if(empty($k['namadagang'])){
                $no = false;            
                }else{
                $no = true;
            }
        ?>
        <tr>
            <td style="width:20%; text-align: center;">
                <?php 
                    if($no === true){
                    echo $no + $n++;
                    } 
                ?>
            </td>
            <td style="width:150%; text-align: left;"><?= iconv("UTF-8", "ISO-8859-1//TRANSLIT", $k['namadagang']); ?></td>
            <td style="text-align: left;"><?= $k['inciname']; ?></td>
            <td style="text-align: left;"><?= $k['fungsi']; ?></td>
            <td style="text-align: center;"><?= $k['nocas']; ?></td>
            <td style="text-align: center;"><?= $k['konsentrasi']; ?></td>
        </tr>
        <?php } ?>
        <tr>
            <?php 
                foreach($komposisi as $b){ 
                    $total = $total + $b['konsentrasi']; 
                } 
            ?>
            <td colspan="5" style="text-align: center;"><b>TOTAL</b></td>
            <td style="text-align: center;"><b><?= $total; ?></b></td>
        </tr>
        <tr>
            <td style="background-color: grey;" colspan="6"></td>
        </tr>
        <tr>
            <td colspan="6"><b>2. Prosedur Pembuatan</b></td>
        </tr>
        <tr>
            <td style="width:5%; text-align: center;"><b>No.</b></td>
            <td style="text-align: center;" colspan="5"><b>Prosedur Pembuatan</b></td>
        </tr>
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
            foreach($prosedur as $a){ 
        ?>
        <tr>          
            <td style="width:5%; text-align: center;"><?= KonDecRomawi($no++); ?></td>
            <td style="text-align: left;" colspan="5"><?= $a['prosedur']; ?></td>
        </tr>  
        <?php 
            } 
        ?>
        <tr>
            <td style="background-color: grey;" colspan="6"></td>
        </tr>
    </table>

    <table style="font-size: 9px;">
        <tr>
            <td>
                <b>3. Klaim Produk</b><br>
                <?= $merek['klaimproduk']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <b>4. Cara pakai</b><br>
                <?= $merek['carapakai']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <b>5. Perhatian / Peringatan*</b><br>
                <?= $merek['perhatian']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <b>6. Catatan RnD Cosmetic (RnDC)</b><br>
                <?= $merek['catatan']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <b>6. Catatan Regulatory Affairs (RA)</b><br>
                <?= $merek['catatanra']; ?>
            </td>
        </tr>
        <!-- <tr>
            <td>
                <b>Keterangan : </b><br>
                (*) : Diisi manual oleh Tim Regulatory Affairs.
            </td>
        </tr> -->
    </table>

    <table style="font-size: 25px;">
    <tr>
            <td style="background-color: grey;" colspan="3"></td>
        </tr>
        <tr>
            <td style="text-align: center;"><b>Dibuat oleh,</b></td>
            <td style="text-align: center;"><b>Diperiksa oleh,</b></td>
            <td style="text-align: center;"><b>Diterima oleh,</b></td>
        </tr>
        <tr>
            <td><br><br><br><br><br><br><br><br><br></td>
            <td><br><br><br><br><br><br><br><br><br></td>
            <td><br><br><br><br><br><br><br><br><br></td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <b style="text-transform:uppercase"><?= $merek['createby']; ?></b> <br>
                <b><?= date('d F Y', strtotime($merek['createdate'])); ?></b> <br>
                <b>Cosmetic Product Development SPV</b>
            </td>
            <td style="text-align: center;">
                <b style="text-transform:uppercase"><?= $merek['approve_rnd_by']; ?></b><br>
                <b><?= date('d F Y', strtotime($merek['approve_rnd_at'])); ?></b><br>
                <b>RnD Cosmetic Manager</b>
            </td>
            <td style="text-align: center;">
                <b style="text-transform:uppercase"><?= $merek['approve_ra_by']; ?></b><br>
                <b><?= date('d F Y', strtotime($merek['approve_ra_at'])); ?></b><br>
                <b>Regulatory Affairs</b>
            </td>
        </tr>
    </table>
</body>
</html>

<?php
    $html = ob_get_contents();
    
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' .$file. '"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($file));
    header('Accept-Ranges: bytes');
    ob_clean();
    flush();

    @readfile($file);
    
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output($file);
    // $mpdf->Output($nama_dokumen.".pdf" ,'D');
    exit;
?>