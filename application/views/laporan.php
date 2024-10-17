<!DOCTYPE html>
<html>
<head>
	<title>SPK Laptop ARAS</title>
</head>
<style>
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
	td {
		page-break-inside: avoid;
	}
</style>
<body>
<?php date_default_timezone_set('Asia/Jakarta'); ?>
<h4>Hasil Akhir Perankingan pada <?= date('j F Y (G:i A)')?></h4>
<h4>Jumlah alternatif: <?= count($hasil);?></h4>
<table border="1" width="100%">
	<thead>
		<tr align="center">
			<th>Ranking</th>
			<th>Kode</th>
			<th>Detail</th>
			<th>Gambar</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no=1;
			$jumlah_ranking = count($hasil);
			foreach ($hasil as $keys): ?>
			<tr align="center">
				<td><?= $no; ?></td>
				<td><?= $keys->kode_alternatif ?></td>
				<td align="left">	
					<b>Nama Alternatif:</b> <?= $keys->nama_alternatif ?>
					<br>
					<b>Nilai K:</b> <?= $keys->nilai_k ?>
					<p>

					<?php foreach ($kriteria as $key): ?>
					<?php 
						$sub_kriteria = $this->Perhitungan_model->data_sub_kriteria($key->id_kriteria);
					?>
					
					<!-- Detail Alternatif - Hasil Akhir -->
					<div class="form-group">
						<label class="font-weight-bold" for="<?= $key->id_kriteria ?>"><b><?= $key->keterangan ?>:</b></label>
						<?php foreach ($sub_kriteria as $subs_kriteria): ?>
							<?php $s_option = $this->Perhitungan_model->data_penilaian($keys->id_alternatif,$subs_kriteria['id_kriteria']); ?>
							<?php if ($s_option!=NULL): ?>
								<?php if($subs_kriteria['id_sub_kriteria']==$s_option['id_sub_kriteria']){
									$pilihan = $subs_kriteria['deskripsi'];
									echo "$pilihan";
								} ?> 
							<?php endif ?>
						<?php endforeach ?>	
								
						<?php if ($s_option==NULL): ?>
							<h6>--Data Penilaian belum di Input--</h6>
						<?php endif ?>
					</div>
					<?php endforeach ?>
				</td>
				<td><img src="./uploads/<?= $keys->gambar_alternatif ?>" alt="<?= $keys->nama_alternatif ?>" style="max-width: 200px; max-height: 125px"></td>
			</tr>
		<?php
			$no++;
			endforeach ?>
	</tbody>
</table>
<script>
	window.print();
</script>
</body>
</html>