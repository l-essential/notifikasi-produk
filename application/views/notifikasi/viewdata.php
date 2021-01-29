<?php 
  $NIK = $this->session->userdata('NIK');
  $group = $this->session->userdata('id_group');
?>


<div class="page-header">
  <h1>
    Formula Notifikasi Produk
  </h1>
</div><!-- /.page-header -->

<div id="page">
	<fieldset>
		<div class="content list-no-order">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Merek<span id="merah">*</span></label>
						<div class="col-sm-8 input-group">
							<span class="input-group-addon">
								<i class="fa fa-copyright bigger-110"></i>
							</span>
							<input type="text" class="form-control" name='namamerek' value="<?= $merek['namamerek']; ?>" style="text-transform:uppercase" disabled>
							
						</div>
					</div> 

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Nama Produk<span id="merah">*</span></label>
						<div class="col-sm-8 input-group">
							<span class="input-group-addon">
								<i class="fa fa-truck bigger-110"></i>
							</span>
							<input type="text"  class="form-control" name='namaproduk' value="<?= $merek['namaproduk']; ?>" disabled>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Bentuk Sediaan<span id="merah">*</span></label>
						<div class="col-sm-8 input-group">
							<span class="input-group-addon">
								<i class="fa fa-glass bigger-110"></i>
							</span>
							<input type="text" class="form-control" name='bentuksediaan' value="<?= $merek['bentuksediaan']; ?>" disabled>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Warna Sediaan<span id="merah">*</span></label>
						<div class="col-sm-8 input-group">
							<span class="input-group-addon">
								<i class="fa fa-eyedropper bigger-110"></i>
							</span>
							<input type="text" class="form-control" name='warnasediaan' value="<?= $merek['warnasediaan']; ?>" disabled>
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Kategori</label>
						<div class="col-sm-8 input-group">
							<input type="text"  class="form-control" name='kategori' value="<?= $merek['kategori']; ?>" disabled>
						</div>
					</div>
					<!-- <div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Sub Kategori</label>
						<div class="col-sm-8 input-group">
							<input type="text" class="form-control" name='subkategori' value="<?= $merek['subkategori']; ?>" disabled>
						</div>
					</div> -->
				</div>
				<div class="col-md-6">
				
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">No. Formula<span id="merah">*</span></label>
						<div class="col-sm-8 input-group">
							<span class="input-group-addon">
								<i class="fa fa-qrcode bigger-110"></i>
							</span>
							<input type="text" class="form-control" name='noformula' value="<?= $merek['noformula']; ?>" disabled>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">No. Revisi<span id="merah">*</span></label>
						<div class="col-sm-8 input-group">
							<span class="input-group-addon">
								<i class="fa fa-qrcode bigger-110"></i>
							</span>
							<input type="text" class="form-control" name='norevisi' value="<?= $merek['norevisi']; ?>" disabled>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Tanggal berlaku<span id="merah">*</span></label>
						<div class="col-sm-8 input-group">
							<span class="input-group-addon">
								<i class="fa fa-calendar bigger-110"></i>
							</span>
							<input type="text" class="form-control date-picker" name='tglberlaku' value="<?= date('d F Y', strtotime($merek['tglberlaku'])); ?>" disabled>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Formula Khusus<span id="merah">*</span></label>
						<div class="col-sm-8 input-group">
							<span class="input-group-addon">
								<i class="fa fa-flask bigger-110"></i>
							</span>
							<input type="text" class="form-control" name='formulakhusus' value="<?= $merek['formulakhusus']; ?>" disabled>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Persamaan Produk<span id="merah">*</span></label>
						<div class="col-sm-8 input-group">
							<input type="text" class="form-control" name='persamaanproduk' value="<?= $merek['persamaanproduk']; ?>" disabled>
							
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<?php 
					$no=1;
					foreach($bk as $b){
				?>
				<div class="col-md-6">
					<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Bentuk Kemasan <?= $no++; ?></h3>
					</div>
					<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Bentuk Kemasan<span id="merah">*</span></label>
						<div class="col-sm-8 input-group">
							<span class="input-group-addon">
								Primer
							</span>
							<input type="text" class="form-control" name="primer" id="kg" value="<?= $b['primer']; ?>" disabled>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right"></label>
						<div class="col-sm-8 input-group">
							<span class="input-group-addon">
								Sekunder
							</span>
							<input type="text" class="form-control" name="sekunder" id="kg" value="<?= $b['sekunder']; ?>" disabled>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label no-padding-right">Ukuran Kemasan<span id="merah">*</span></label>
						<div class="col-sm-8 input-group">
							<input type="number" class="form-control" name='ukurankemasan' value="<?= $b['ukurankemasan']; ?>" disabled>
							
							<span class="input-group-addon">
								<?= $b['satuan']; ?>
							</span>
							
						</div>
					</div>
					</div>
					</div>
				</div>
				<?php } ?>
			</div>

			<div class="page-header">
			<h4>
				1. Komposisi
			</h4>
			</div><!-- /.page-header -->

			<table id="example2" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">No.</th>
					<th class="center">Nama Dagang</th>
					<th class="center">INCI Name</th>
					<th class="center">Fungsi</th>
					<th class="center">No. CAS</th>
					<th class="center">Konsentrasi (%)</th>              
				</tr>
			</thead>
			<tbody>
				<?php 
					$n=0;
					foreach($komposisi as $a){
					if(empty($a['namadagang'])){
						$no = false;            
						}else{
						$no = true;
					}
				?>
				<tr>        
					<td align="center">
					<?php 
						if($no === true){
						echo $no + $n++;
						} 
					?>
					</td>  
					<td align="left"><?= html_entity_decode($a['namadagang']); ?></td>
					<td align="left"><?= $a['inciname']; ?></td>
					<td align="left"><?= $a['fungsi']; ?></td>
					<td align="left"><?= $a['nocas']; ?></td>
					<td align="center"><?= $a['konsentrasi']; ?></td>
				</tr>
				<?php 
					} 
				?>
			</tbody>
			<tfooter>
				<?php 
					foreach($komposisi as $b){ 
						$total = $total + $b['konsentrasi']; 
					} 
				?>
				<tr>
					<th style="text-align: right;" colspan="5" >TOTAL</th>
					<th class="center"><?= $total; ?></th>
				</tr>
			</tfooter>
			</table>
			<div class="page-header">
			<h4>
				2. Prosedur Pembuatan 
			</h4>
			</div><!-- /.page-header -->

			<table id="example3" class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th class="center">No.</th>
					<th class="center">Prosedur Pembuatan</th>
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
					foreach($prosedur as $a){ 
				?>
				<tr>          
					<td align="center"><?= KonDecRomawi($no++); ?></td>    
					<td ><?= html_entity_decode($a['prosedur']); ?></td>
				</tr>  
				<?php 
					} 
				?>
				</tbody>
			</table>

			<div class="page-header">
			<h4>
				3. Klaim Produk 
			</h4>
			</div><!-- /.page-header -->

				
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">klaim Produk<span id="merah">*</span></label>
				<div class="col-sm-10 input-group">
					<input type="text" class="form-control" name='klaimproduk' value="<?= $merek['klaimproduk']; ?>" disabled>
					
				</div>
			</div>
				

			<div class="page-header">
			<h4>
				4. Cara Pakai 
			</h4>
			</div><!-- /.page-header -->
				
				
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Cara pakai<span id="merah">*</span></label>
				<div class="col-sm-10 input-group">
					<input type="text" class="form-control" name='carapakai' value="<?= $merek['carapakai']; ?>" disabled>
					
				</div>
			</div>
				

			<div class="page-header">
			<h4>
				5. Perhatian / Peringatan 
			</h4>
			</div><!-- /.page-header -->

				
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Perhatian / Peringatan<span id="merah">*</span></label>
				<div class="col-sm-10 input-group">
					<input type="text" class="form-control" name='perhatian' value="<?= $merek['perhatian']; ?>" disabled>
					
				</div>
			</div>
				

			<div class="page-header">
			<h4>
				6. Catatan 
			</h4>
			</div><!-- /.page-header -->

				
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Catatan<span id="merah">*</span></label>
				<div class="col-sm-10 input-group">
					<input type="text" class="form-control" name='catatan' value="<?= $merek['catatan']; ?>" disabled>
					
				</div>
			</div>
			
 			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right">Catatan RA<span id="merah">*</span></label>
				<div class="col-sm-10 input-group">
					<textarea type="text" class="form-control" name='catatanra' disabled><?= $merek['kategori']; ?></textarea>
					<?= form_error('catatanra', '<small class="text-danger pl-3">', '</small>')?>
				</div>
			</div>

			<div class="page-header">
                <h4>
                    Upload Literatur (CPD) 
                </h4>
                </div><!-- /.page-header -->

                <div class="form-group">
                    <p>Data yang telah di upload : <?php if($merek['pdf'] == ''){echo "KOSONG";}else{ echo $merek['pdf'];} ?></p>
                    <!-- <div class="col-sm-10 input-group">
                        <input type="file" name="filepdf" id="filepdf" accept=".pdf">
                    </div> -->
                </div>
		</div> 
	</fieldset>

	<div class="row">
		<div class="col-sm-12 center">
			<div class="form-actions">
				<a href="<?= base_url('fnp/notifikasi/'); ?>" name="submit" class="btn btn-danger"><i class='icon-only ace-icon fa fa-arrow-left bigger-110'></i> Kembali</a>
			</div>
		</div>
	</div>
</div>

    
    