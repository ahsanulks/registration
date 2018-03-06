<div class="top-shadow"></div>

<section class="page-title">
	<div class="page-background">
		<div class="pattern1"></div>
	</div>

	<div class="title-wrapper">
		<div class="title-bg">
			<div class="title-content">
				<div class="two-third">
					<h2>Permohonan Pinjaman</h2>
				</div>
				<div class="one-third column-last">		
				</div>
				<div class="clear"></div>
			</div><!--end title-content-->
		</div>
	</div>
</section> <!-- end section title-content-->

<div class="centered-wrapper">
	<div class="percent-two-third">
		<?php 
			if (isset($this->session->notif)) {
				if ($this->session->notif) { ?>
					<div class="box-success"><strong>Sukses!</strong> Registrasi berhasil</div>
				<?php
				} else { ?>
					<div class="box-error"><strong>Gagal!</strong> Registrasi gagal</div>
				<?php
				}
				$this->session->sess_destroy();
			}
		?>
		<div id="loanform">
			<form method="post" action="<?=base_url()?>loan/loan_acction" name="loanform" id="loanform">
				<h6>Data Identitas Diri</h6>
				<fieldset class="percent-one-fifth">
					<label>NIK <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="nik" name="nik" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Nomor KTP <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="ktp" name="ktp" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Nama Lengkap <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="nama" name="nama" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Tanggal Lahir <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="tanggal_lahir" name="tanggal_lahir" type="text" required readonly>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Email <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="email" name="email" type="email" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Alamat Rumah <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<textarea id="alamat" name="alamat" class="full-width" required></textarea>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Jenis Kelamin <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="gender" name="gender" type="radio" value='Pria' required> Pria
					<input id="gender" name="gender" type="radio" value='Wanita' required> Wanita
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Nama Pasangan <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="pasangan" name="pasangan" type="text" required>
				</fieldset>
				<h6 class="percent-four-fifth">Data Unit Kerja</h6>
				<h6 class="percent-one-fifth column-last">&nbsp;</h6>
				<fieldset class="percent-one-fifth">
					<label>Unit Kerja <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<select name='unit_kerja'>
						<option value="Divisi">Divisi</option>
						<option value="Kanwil">Kanwil</option>
						<option value="Cabang">Cabang</option>
					</select>
					<input id="unit" name="unit" style="width: auto" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Jabatan <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="jabatan" name="jabatan" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Grade <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="golongan" name="golongan" type="text" required>
				</fieldset>
				<h6 class="percent-four-fifth">Data Pinjaman</h6>
				<h6 class="percent-one-fifth column-last">&nbsp;</h6>
				<fieldset class="percent-one-fifth">
					<label>Uang Pinjaman <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="pinjaman" onkeypress="var key = event.keyCode || event.charCode; return ((key  >= 48 && key  <= 57) || key == 8 || key == 43);" name="pinjaman" type="text" required onkeyup="change()">
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Uang Pinjaman (huruf) <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth">
					<input type="text" name="pinjaman_deskripsi" id="pinjaman_deskripsi" required placeholder="contoh: seratus juta rupiah">
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Jangka Waktu <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<select name='waktu' required="">
						<option value="12">12 Bulan</option>
						<option value="24">24 Bulan</option>
						<option value="36">36 Bulan</option>
					</select>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Jenis Pinjaman <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<select name='jenis_pinjaman' required="">
						<option value="multi guna">Multi Guna</option>
						<option value="berjangka">Berjangka</option>
						<option value="toko">Toko</option>
						<option value="barang">Barang</option>
						<option value="berjaminan">Berjaminan</option>
					</select>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Keperluan <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="keperluan" name="keperluan" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Kode Captcha <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="captcha" name="captcha" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">&nbsp;</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input type="checkbox" name="policy" id="policy" required=""> Dengan ini saya setuju dengan syarat dan ketentuan yang berlaku
				</fieldset>
				<fieldset class="percent-one-fifth">&nbsp;</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input type="submit" class="button-submit button black" id="kirim" disabled value="Kirim">
				</fieldset>
				<fieldset class="percent-one-fifth">&nbsp;</fieldset>
				<fieldset class="percent-four-fifth">
					<?=validation_errors()?>
				</fieldset>
			</form>
		</div>
	</div>
</div>

<div class="space"></div>

<script type="text/javascript">
	$("#policy").change(function(){
		if ($("#policy").is(":checked")) {
			$('#kirim').prop('disabled', false);
			$('#kirim').addClass('red');
			$('#kirim').removeClass('black');
		}
		else{
			$('#kirim').prop('disabled', true);
			$('#kirim').addClass('black');
			$('#kirim').removeClass('red');
		}
	});

	$("#tanggal_lahir").datepicker({
		dateFormat: "dd-mm-yy",
		changeYear: true,
		yearRange: "1950:2000"
	});

	function change(){
		if (isNaN(parseInt(document.getElementById('pinjaman').value))) {
		}
		else{
			var value = document.getElementById('pinjaman').value;
			document.getElementById('pinjaman').value = Number(value.split('.').join('')).toLocaleString('id');
		}
	}
</script>