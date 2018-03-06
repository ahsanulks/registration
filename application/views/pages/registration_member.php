<div class="top-shadow"></div>

<section class="page-title">
	<div class="page-background">
		<div class="pattern1"></div>
	</div>

	<div class="title-wrapper">
		<div class="title-bg">
			<div class="title-content">
				<div class="two-third">
					<h2>Registrasi Anggota</h2>
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
		<h6>Permohonan Anggota</h6>
		<div id="registerform">
			<form method="post" action="<?=base_url()?>register/register_action" name="registerform" id="registerform">
				<fieldset class="percent-one-fifth">
					<label>NIK Karyawan <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="nik" name="nik" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Nama Lengkap <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="nama" name="nama" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Tempat Lahir <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="tempat_lahir" name="tempat_lahir" type="text" required>
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
					<label>Grade <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="golongan" name="golongan" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Jabatan <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="jabatan" name="jabatan" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Alamat Rumah <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<textarea id="alamat" name="alamat" class="full-width" required></textarea>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Kode Captcha <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="captcha" name="captcha" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">&nbsp;</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input type="checkbox" name="policy" id="policy"> Dengan ini saya setuju dengan syarat dan ketentuan yang berlaku
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
		</div><!--end contactform-->
	</div>
	<div class="percent-one-third column-last">text goes here</div>
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
</script>\