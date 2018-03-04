<h3 align="center"><strong>SURAT PERSETUJUAN PASANGAN</strong></h3>

<table style="line-height: 1.5; text-align: justify;">
	<tr>
		<td colspan="10">Yang bertanda tangan di bawah ini:</td>
	</tr>
	<tr>
		<td colspan="2">Nama</td>
		<td colspan="8">: <?= $gender == 'Pria' ? $pasangan : $nama; ?></td>
	</tr>
	<tr>
		<td colspan="2">No KTP</td>
		<td colspan="8">: 999123123122234</td>
	</tr>
	<tr>
		<td colspan="2">Alamat</td>
		<td colspan="8">: <?=$alamat?></td>
	</tr>
	<tr>
		<td colspan="10">Dengan ini menyatakan tidak keberatan memberikan persetujuan sepenuhnya kepada suami / istri saya:</td>
	</tr>
	<tr>
		<td colspan="2">Nama</td>
		<td colspan="8">: <?= $gender == 'Pria' ? $nama : $pasangan; ?></td>
	</tr>
	<tr>
		<td colspan="2">No KTP</td>
		<td colspan="8">: <?=$ktp?></td>
	</tr>
	<tr>
		<td colspan="2">Alamat</td>
		<td colspan="8">: <?=$alamat?></td>
	</tr>
	<tr>
		<td colspan="2">Unit Kerja</td>
		<td colspan="8">: <?=$unit_kerja.' '.$unit?></td>
	</tr>
	<tr>
		<td colspan="10" align="justify">
			Untuk meminjam uang /kredit kepada Koperasi Budi Setia
		</td>
	</tr>
	<tr><td colspan="10" height="20">&nbsp;</td></tr>
	<tr>
		<td colspan="5"></td>
		<td colspan="5" align="center">Jakarta, 13 Desember 2013</td>
	</tr>
	<tr>
		<td colspan="5" align="center">Nama Suami</td>
		<td colspan="5" align="center">Nama Istri,</td>
	</tr>
	<tr><td colspan="10" height="50"></td></tr>
	<tr>
		<td colspan="5" align="center"><?= $gender == 'Pria' ? $nama : $pasangan; ?></td>
		<td colspan="5" align="center"><?= $gender == 'Pria' ? $pasangan : $nama; ?></td>
	</tr>
</table>