<div class="top-shadow"></div>

<section class="page-title">
	<div class="page-background">
		<div class="pattern1"></div>
	</div>

	<div class="title-wrapper">
		<div class="title-bg">
			<div class="title-content">
				<div class="two-third">
					<h2>Konfirmasi Pendaftaran</h2>
				</div>
				<div class="one-third column-last">		
				</div>
				<div class="clear"></div>
			</div><!--end title-content-->
		</div>
	</div>
</section>

<div class="centered-wrapper">
	<div class="percent-two-third">
		<?php 
			if (isset($this->session->notif)) {
				if ($this->session->notif) { ?>
					<div class="box-success"><strong>Sukses!</strong> Konfirmasi Permohonan Pinjaman berhasil</div>
				<?php
				} else { ?>
					<div class="box-error"><strong>Gagal!</strong> Konfirmasi Permohonan Pinjaman gagal</div>
				<?php
				}
				$this->session->sess_destroy();
			}
		?>
		<div id="loanform">
			<form method="post" action="<?=base_url()?>register/register_confirmation_action" name="loanform" id="loanform" enctype="multipart/form-data">
				<h6>Data Konfirmasi</h6>
				<fieldset class="percent-one-fifth">
					<label>NIK <span>*</span></label>
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
					<label>Upload Form <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input type="file" name="file" accept=".pdf,.zip">
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Kode Captcha <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<div class="g-recaptcha" data-sitekey="<?=SITE_KEY?>"></div>
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
</script>