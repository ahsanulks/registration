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
	<div class="percent-one-third">text goes here</div>
	<div class="percent-two-third column-last">
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
					<input id="name" name="nama" type="text" required>
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
					<input id="tanggal_lahir" name="tanggal_lahir" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Grade <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="grade" name="grade" type="text" required>
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
					<button type="submit" class="button-submit button red">Kirim</button>
				</fieldset>
			</form>
			<?=validation_errors()?>		
		</div><!--end contactform-->
	</div>
</div>

<div class="space"></div>