<div class="top-shadow"></div>

<section class="page-title">
	<div class="page-background">
		<div class="pattern1"></div>
	</div>

	<div class="title-wrapper">
		<div class="title-bg">
			<div class="title-content">
				<div class="two-third">
					<h2>Simulasi Pinjaman</h2>
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
		<div id="simulationform">
			<form name="simulationform" id="simulationform2">
				<fieldset class="percent-one-fifth">
					<label>Uang Pinjaman <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="pinjaman" name="pinjaman" type="text" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Bunga dalam %<span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input id="bunga" name="bunga" placeholder="contoh 2" type="text" onkeypress="var key = event.keyCode || event.charCode; return ((key  >= 48 && key  <= 57) || key == 8 || key == 44);" required>
				</fieldset>
				<fieldset class="percent-one-fifth">
					<label>Jangka Waktu <span>*</span></label>
				</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<select name='waktu' required="">
						<option value="12">1 Tahun</option>
						<option value="24">2 Tahun</option>
						<option value="36">3 Tahun</option>
					</select>
				</fieldset>
				<fieldset class="percent-one-fifth">&nbsp;</fieldset>
				<fieldset class="percent-four-fifth column-last">
					<input type="submit" class="button-submit button red" id="simulasi" value="Simulasi">
				</fieldset>
			</form>
		</div>
	</div>
	<div class="percent-one-third column-last" id="view-calculate" style="display: none">
		<div id="contactform">
			<fieldset>
				<label>Angsuran <span>*</span></label>
				<input id="angsuran" name="angsuran" type="text" required readonly>
			</fieldset>
		</div>
	</div>
</div>
<div class="space"></div>

<script type="text/javascript">
	$("#simulationform2").submit(function(e){
		e.preventDefault();
		calculate();
	});

	function calculate(){
		$.ajax({
		  url: '<?=base_url('simulation/calculate_loan')?>',
		  type: 'GET',
		  data: $("#simulationform2").serialize(),
		  success: function(response){
		  	$("#view-calculate").show();
		  	$("#angsuran").val('Rp ' + response.installment);
		  },
		  dataType: 'JSON'
		});
	}
</script>