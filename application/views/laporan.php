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
	<?php 
		date_default_timezone_set('Asia/Jakarta');
		// Menerima array "arr" dari halaman Hasil Akhir (filtered)
		// Jerald's solution (https://stackoverflow.com/questions/14979882/how-to-pass-array-to-another-page-by-using-anchor-in-php)
		if(isset($_REQUEST['cluster'])){
			$text = urldecode($_REQUEST['cluster']);
			$mixed = json_decode($text);
			$arr = $mixed;

			// Kode untuk menampilkan filter yang aktif (1/3)
			$arr_str = implode(',', $arr);
			$id_kriteria_cetak = array_column($this->Perhitungan_model->get_id_kriteria_cetak($arr_str), 'id_kriteria');
		}
	?>
	<?php if(!isset($arr)): ?>
		<h4>Hasil Akhir Perankingan pada <?= date('j F Y (G:i A)')?></h4>
	<?php endif ?>

	<?php if(isset($arr)): ?>
		<h4>Hasil Akhir Perankingan (Filtered) pada <?= date('j F Y (G:i A)')?></h4>
	<?php endif ?>

	<!-- Cetak Hasil Akhir (tanpa filter) -->
	<?php if(!isset($arr)): ?>
		<h4>Jumlah Alternatif: <?= count($hasil);?></h4>
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
						<?php if($keys->gambar_alternatif != NULL): ?>
							<td><img src="./uploads/<?= $keys->gambar_alternatif ?>" alt="<?= $keys->gambar_alternatif ?>" onerror="this.src='./assets/img/default.jpg'" style="max-width: 200px; max-height: 125px"></td>
						<?php endif ?>
						<?php if($keys->gambar_alternatif == NULL): ?>
							<td>Tidak ada gambar</td>
						<?php endif ?>
					</tr>
				<?php
					$no++;
					endforeach ?>
			</tbody>
		</table>
	<?php endif ?>

	<!-- Cetak Hasil Akhir (dengan filter) -->
	<?php if(isset($arr)): ?>
		<?php
			$jumlah_ranking = count($hasil);
			foreach ($hasil as $keys): ?>
			<?php foreach ($kriteria as $key): ?>
				<!-- [WIP] Filter Alternatif berdasarkan Sub Kriteria -->
				<?php 
					$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
				?>
				<?php if (in_array($data_pencocokan['id_sub_kriteria'], $arr)): ?>
					<?php 
						$f_alternatif[] = (int)$data_pencocokan['id_alternatif'];
						$f_unique = array_unique($f_alternatif);
					?>
				<?php endif ?>
			<?php endforeach ?>
		<?php endforeach ?>
		<?php $jumlah_filtered = count($f_unique); ?>

		<b>Jumlah Alternatif (Filtered): <?= $jumlah_filtered;?></b>
		<br>
		<b>Jumlah Alternatif (All): <?= count($hasil);?></b>
		<br>
		<br>
		<b>Filter yang aktif</b>
		
		<?php foreach ($kriteria as $key): ?>
			<?php 
				$sub_kriteria = $this->Perhitungan_model->data_sub_kriteria($key->id_kriteria);
				$f_unique=[];
			?>
			<?php if ($sub_kriteria!=NULL): ?>
				<div class="form-group">
					<!-- Kode untuk menampilkan filter yang aktif (2/3) -->
					<?php if(in_array($key->id_kriteria, $id_kriteria_cetak)): ?>
						<br>
						<b><?= $key->keterangan ?>:</b>
					<?php endif ?>

					<?php foreach ($sub_kriteria as $subs_kriteria): ?>
						<!-- Kode untuk menampilkan filter yang aktif (3/3) -->
						<?php 
							$id_sub_kriteria = join(',', $arr);
							$id_kriteria = $this->Perhitungan_model->get_id_kriteria($id_sub_kriteria);
							$id_kriteria_unique = array_unique(array_column($id_kriteria, 'id_kriteria'));
						?>
						<div>
							<?php if(in_array($subs_kriteria['id_sub_kriteria'], $arr)): ?>
								• <?= $subs_kriteria['deskripsi'] ?>
							<?php endif ?>
						</div>
					<?php endforeach ?>
				</div>
			<?php endif ?>
		<?php endforeach ?>
		<br>

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
				<!-- Kode menampilkan tabel -->
				<?php
					$no=1;
					$no_filtered=1;
					$jumlah_ranking = count($hasil);
					foreach ($hasil as $keys): ?>
					<?php foreach ($kriteria as $key): ?>
						<!-- [WIP] Filter Alternatif berdasarkan Sub Kriteria (perlu dirapikan, tapi sekarang sudah bekerja) -->
						<?php 
							$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif,$key->id_kriteria);
						?>
						<?php if (in_array($data_pencocokan['id_sub_kriteria'], $arr)): ?>
							<?php 
								$f_alternatif[] = (int)$data_pencocokan['id_alternatif'];
								$f_unique = array_unique($f_alternatif);
							?>
						<?php endif ?>
					<?php endforeach ?>

					<?php if (in_array($keys->id_alternatif, $f_unique)): ?>
						<tr align="center">
							<td><?= $no_filtered; ?></td>
							<td><?= $keys->kode_alternatif ?></td>
							<td align="left">	
								<b>Nama Alternatif:</b> <?= $keys->nama_alternatif ?>
								<br>
								<b>Nilai K:</b> <?= $keys->nilai_k ?>
								<p>
									
								<b>Ranking (filtered):</b> <?= $no_filtered ?> dari <?= $jumlah_filtered ?>
								<br>
								<b>Ranking (all):</b> <?= $no ?> dari <?= $jumlah_ranking ?>
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
							<?php if($keys->gambar_alternatif != NULL): ?>
								<td><img src="./uploads/<?= $keys->gambar_alternatif ?>" alt="<?= $keys->gambar_alternatif ?>" onerror="this.src='./assets/img/default.jpg'" style="max-width: 200px; max-height: 125px"></td>
							<?php endif ?>
							<?php if($keys->gambar_alternatif == NULL): ?>
								<td>Tidak ada gambar</td>
							<?php endif ?>
						</tr>
					<?php $no_filtered++; endif ?>	
				<?php
					$no++;
					endforeach ?>
			</tbody>
		</table>
	<?php endif ?>

	<script>
		window.print();
	</script>
</body>

</html>