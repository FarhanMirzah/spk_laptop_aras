<?php
$this->load->view('layouts/header_admin');

// Variabel hentikan_kode
$hentikan_kode = NULL;

//Matrix Keputusan (X)
$matriks_x = array();

// Jika salah satu NULL -> skip perhitungan dan hentikan kode
if ($alternatifs == NULL || $kriterias == NULL){
	$hentikan_kode = 1;
	goto skip_perhitungan;
}

// User dapat memilih kriteria yang digunakan (https://stackoverflow.com/questions/21168422/how-to-access-a-property-of-an-object-stdclass-object-member-element-of-an-arr)
$bobot_kriteria_tidak_aktif = 0;
$id_kriteria_tidak_aktif1 = $this->Perhitungan_model->get_id_kriteria_tidak_aktif($bobot_kriteria_tidak_aktif);
$id_kriteria_tidak_aktif2 = array_column($id_kriteria_tidak_aktif1, 'id_kriteria');
$key_kriteria_tidak_aktif1 = array();

foreach ($kriterias as $key => $obj)
{
	if(in_array($obj->id_kriteria, $id_kriteria_tidak_aktif2)){
		$key_kriteria_tidak_aktif1[] = $key;
   	}
}

foreach ($key_kriteria_tidak_aktif1 as $key_kriteria_tidak_aktif2) {
	unset($kriterias[$key_kriteria_tidak_aktif2]);
}

foreach($alternatifs as $alternatif):
	foreach($kriterias as $kriteria):
		
		$id_alternatif = $alternatif->id_alternatif;
		$id_kriteria = $kriteria->id_kriteria;

		$data_pencocokan = $this->Perhitungan_model->data_nilai($id_alternatif,$id_kriteria);
		// Jika NULL -> skip perhitungan dan hentikan kode
		if ($data_pencocokan == NULL){
			$hentikan_kode = 1;
			goto skip_perhitungan;
		}
		$nilai_k = $data_pencocokan['nilai_sub_kriteria'];
		
		// Perhitungan bagian Pembentukan Matriks Keputusan (X) (A0 ke atas)
		$matriks_x[$id_kriteria][$id_alternatif] = $nilai_k;
	endforeach;
endforeach;

//Matrix Keputusan (X0)
$matriks_x0 = array();
foreach($kriterias as $kriteria):
	$type_kriteria = $kriteria->jenis;
	if($type_kriteria == 'Benefit'):
		$id_kriteria = $kriteria->id_kriteria;
		$x0 = max($matriks_x[$id_kriteria]);
	elseif($type_kriteria == 'Cost'):
		$id_kriteria = $kriteria->id_kriteria;
		$x0 = min($matriks_x[$id_kriteria]);
	endif;
	
	// Perhitungan bagian Pembentukan Matriks Keputusan (X) (A0 saja)
	$matriks_x0[$id_kriteria] = $x0;
endforeach;

$matriks_x2 = array();
foreach($alternatifs as $alternatif):
	foreach($kriterias as $kriteria):
		
		$id_alternatif = $alternatif->id_alternatif;
		$id_kriteria = $kriteria->id_kriteria;
		
		$x = $matriks_x[$id_kriteria][$id_alternatif];
		$type_kriteria = $kriteria->jenis;
		if($type_kriteria == 'Benefit'):
			$x2 = $x;
		elseif($type_kriteria == 'Cost'):
			$x2 = 1/$x;
		endif;
		
		// Perhitungan bagian Merumuskan Matriks Keputusan (X) (A1 dan seterusnya)
		$matriks_x2[$id_kriteria][$id_alternatif] = $x2;
	endforeach;
endforeach;

$matriks_x02 = array();
foreach($kriterias as $kriteria):
	$id_kriteria = $kriteria->id_kriteria;
	$type_kriteria = $kriteria->jenis;
	$x0 = $matriks_x0[$id_kriteria];
	if($type_kriteria == 'Benefit'):
		$x02 = $x0;
	elseif($type_kriteria == 'Cost'):
		$x02 = 1/$x0;
	endif;

	// Perhitungan bagian Merumuskan Matriks Keputusan (X) (A0 saja)
	$matriks_x02[$id_kriteria] = $x02;
endforeach;

$total_matriks_x = array();
foreach($kriterias as $kriteria):
	$tx = 0;
	$id_kriteria = $kriteria->id_kriteria;
	foreach($alternatifs as $alternatif):
		$id_alternatif = $alternatif->id_alternatif;
		$x = $matriks_x2[$id_kriteria][$id_alternatif];
		$tx += $x;
	endforeach;
	$x0 = $matriks_x02[$id_kriteria];
	// Perhitungan bagian Merumuskan Matriks Keputusan (X) (TOTAL)
	$total_matriks_x[$id_kriteria] = ($tx + $x0);
endforeach;

//Normalisasi Matriks Keputusan
$matriks_r = array();
foreach($alternatifs as $alternatif):
	foreach($kriterias as $kriteria):
		
		$id_alternatif = $alternatif->id_alternatif;
		$id_kriteria = $kriteria->id_kriteria;
		
		$x = $matriks_x2[$id_kriteria][$id_alternatif];
		$total = $total_matriks_x[$id_kriteria];
		// Perhitungan bagian Matriks Normalisasi (A1 dan berikutnya)
		$matriks_r[$id_kriteria][$id_alternatif] = $x/$total;
	endforeach;
endforeach;
$matriks_r0 = array();
foreach($kriterias as $kriteria):
	$id_kriteria = $kriteria->id_kriteria;
	$x0 = $matriks_x02[$id_kriteria];
	$total = $total_matriks_x[$id_kriteria];
	// Perhitungan bagian Matriks Normalisasi (A0 saja)
	$matriks_r0[$id_kriteria] = $x0/$total;
endforeach;

//Matriks Normalisasi Terbobot
$matriks_rb = array();
$total_rb = array();
foreach($alternatifs as $alternatif):
	$t_rb = 0;
	$id_alternatif = $alternatif->id_alternatif;
	foreach($kriterias as $kriteria):
		$id_kriteria = $kriteria->id_kriteria;
		$bobot = ($kriteria->bobot)/100;
		$r = $matriks_r[$id_kriteria][$id_alternatif];
		$rb = $r*$bobot;
		// Perhitungan bagian Matriks Normalisasi Terbobot (A1 dan berikutnya)
		$matriks_rb[$id_kriteria][$id_alternatif] = $rb;
		// Perhitungan bagian Nilai S (A1 dan berikutnya)
		$t_rb += $rb;
	endforeach;
	$total_rb[$id_alternatif] = $t_rb;
endforeach;

$matriks_rb0 = array();
$total_rb0 = 0;
foreach($kriterias as $kriteria):
	$id_kriteria = $kriteria->id_kriteria;
	$r0 = $matriks_r0[$id_kriteria];
	$bobot = ($kriteria->bobot)/100;
	$rb = $r0*$bobot;
	// Perhitungan bagian Matriks Normalisasi Terbobot (A0 saja)
	$matriks_rb0[$id_kriteria] = $rb;
	// Perhitungan bagian Nilai S (A0 saja)
	$total_rb0 += $rb;
endforeach;
// Tujuan goto
skip_perhitungan:
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan (Metode ARAS)</h1>
</div>

<?= $this->session->flashdata('message'); ?>

<!-- Jika skip_perhitungan -->
<?php if ($hentikan_kode != NULL): ?>
	<div class="card shadow mb-4">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Data Perhitungan</h6>
		</div>

		<div class="card-body">
			<div class="alert alert-danger">
				<?php if ($this->session->userdata('id_user_level') == "1"): ?>
					Masih ada <b>Data Sub Kriteria</b> atau <b>Data Penilaian</b> yang belum di isi.
				<?php endif ?>
				<?php if ($this->session->userdata('id_user_level') != "1"): ?>
					Masih ada <b>Data Sub Kriteria</b> atau <b>Data Penilaian</b> yang belum di isi. Silahkan login kembali dengan level <b>Administrator</b> untuk memperbaiki.
				<?php endif ?>
			<?php $this->Perhitungan_model->hapus_hasil(); ?>
			</div>
		</div>
	</div>
	<!-- Load Footer (untuk Profile / Logout di atas kanan) -->
	<?php
		$this->load->view('layouts/footer_admin');
	?>
	<!-- Hentikan kode -->
	<?php exit; ?>
<?php endif ?>

<b>Catatan:</b> 
<br>
• <b>Alternatif Optimum (A0)</b> bukan merupakan Alternatif yang di inputkan di database.
<br>
• A0 adalah Alternatif yang memiliki nilai <b>tertinggi</b> untuk setiap kriteria yang bertipe <b>benefit</b> dan nilai <b>terendah</b> untuk setiap kriteria yang bertipe <b>cost</b>.
<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Pembentukan Matriks Keputusan (X)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<th>Alternatif</th>
						<?php foreach ($kriterias as $kriteria): ?>
							<th><?= $kriteria->kode_kriteria ?></th>
						<?php endforeach; ?>
					</tr>
				</thead>
				<tbody>
					<tr align="center" class="bg-light">
						<td>A0</td>
						<?php foreach ($kriterias as $kriteria): ?>
						<td>
						<?php 
							$id_kriteria = $kriteria->id_kriteria;
							echo $matriks_x0[$id_kriteria];
						?>
						</td>
						<?php endforeach; ?>
					</tr>
					<?php 
						$no=1;
						foreach ($alternatifs as $alternatif): ?>
					<tr align="center">
						<td><?= $alternatif->kode_alternatif; ?></td>
						<?php
						foreach ($kriterias as $kriteria):
							$id_alternatif = $alternatif->id_alternatif;
							$id_kriteria = $kriteria->id_kriteria;
							echo '<td>';
							echo $matriks_x[$id_kriteria][$id_alternatif];
							echo '</td>';
						endforeach;
						?>
					</tr>
					<?php
						$no++;
						endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Merumuskan Matriks Keputusan (X)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<th>Alternatif</th>
						<?php foreach ($kriterias as $kriteria): ?>
							<th><?= $kriteria->kode_kriteria ?></th>
						<?php endforeach; ?>
					</tr>
				</thead>
				<tbody>
					<tr align="center" class="bg-light">
						<td>A0</td>
						<?php foreach ($kriterias as $kriteria): ?>
						<td>
						<?php 
							$id_kriteria = $kriteria->id_kriteria;
							// Pembulatan bagian Merumuskan Matriks Keputusan (X) (A0 saja) (4 angka belakang koma)
							echo round($matriks_x02[$id_kriteria],4);
							// echo $matriks_x02[$id_kriteria];
						?>
						</td>
						<?php endforeach; ?>
					</tr>
					<?php 
						$no=1;
						foreach ($alternatifs as $alternatif): ?>
					<tr align="center">
						<td><?= $alternatif->kode_alternatif; ?></td>
						<?php
						foreach ($kriterias as $kriteria):
							$id_alternatif = $alternatif->id_alternatif;
							$id_kriteria = $kriteria->id_kriteria;
							echo '<td>';
							// Pembulatan bagian Merumuskan Matriks Keputusan (X) (A1 ke atas) (4 angka belakang koma)
							echo round($matriks_x2[$id_kriteria][$id_alternatif],4);
							// echo $matriks_x2[$id_kriteria][$id_alternatif];
							echo '</td>';
						endforeach;
						?>
					</tr>
					<?php
						$no++;
						endforeach;
					?>
					<tr align="center" class="bg-light">
						<th>TOTAL</th>
						<?php foreach ($kriterias as $kriteria): ?>
						<th>
						<?php 
							$id_kriteria = $kriteria->id_kriteria;
							// Pembulatan bagian Merumuskan Matriks Keputusan (X) (TOTAL saja) (4 angka belakang koma)
							echo round($total_matriks_x[$id_kriteria],4);
							// echo $total_matriks_x[$id_kriteria];
						?>
						</th>
						<?php endforeach; ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Matriks Normalisasi</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<th>Alternatif</th>
						<?php foreach ($kriterias as $kriteria): ?>
							<th><?= $kriteria->kode_kriteria ?></th>
						<?php endforeach; ?>
					</tr>
				</thead>
				<tbody>
					<tr align="center" class="bg-light">
						<td>A0</td>
						<?php foreach ($kriterias as $kriteria): ?>
						<td>
						<?php 
							$id_kriteria = $kriteria->id_kriteria;
							// Pembulatan bagian Matrik Normalisasi (A0 saja) (4 angka belakang koma)
							echo round($matriks_r0[$id_kriteria],4);
							// echo $matriks_r0[$id_kriteria];
						?>
						</td>
						<?php endforeach; ?>
					</tr>
					<?php 
						$no=1;
						foreach ($alternatifs as $alternatif): ?>
					<tr align="center">
						<td><?= $alternatif->kode_alternatif; ?></td>
						<?php
						foreach ($kriterias as $kriteria):
							$id_alternatif = $alternatif->id_alternatif;
							$id_kriteria = $kriteria->id_kriteria;
							echo '<td>';
							// Pembulatan bagian Matrik Normalisasi (A1 ke atas) (4 angka belakang koma)
							echo round($matriks_r[$id_kriteria][$id_alternatif],4);
							// echo $matriks_r[$id_kriteria][$id_alternatif];
							echo '</td>';
						endforeach;
						?>
					</tr>
					<?php
						$no++;
						endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Bobot Kriteria (W)</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<?php foreach ($kriterias as $kriteria): ?>
						<th><?= $kriteria->kode_kriteria ?> (<?= $kriteria->jenis ?>)</th>
						<?php endforeach ?>
					</tr>
				</thead>
				<tbody>
					<tr align="center">
						<?php foreach ($kriterias as $kriteria): ?>
						<td>
						<?php 
						echo ($kriteria->bobot)/100;
						?>
						</td>
						<?php endforeach ?>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Matriks Normalisasi Terbobot</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<th>Alternatif</th>
						<?php foreach ($kriterias as $kriteria): ?>
							<th><?= $kriteria->kode_kriteria ?></th>
						<?php endforeach; ?>
					</tr>
				</thead>
				<tbody>
					<tr align="center" class="bg-light">
						<td>A0</td>
						<?php foreach ($kriterias as $kriteria): ?>
						<td>
						<?php 
							$id_kriteria = $kriteria->id_kriteria;
							// Pembulatan bagian Matrik Normalisasi Terbobot (A0 saja) (4 angka belakang koma)
							echo round($matriks_rb0[$id_kriteria],4);
							// echo $matriks_rb0[$id_kriteria];
						?>
						</td>
						<?php endforeach; ?>
					</tr>
					<?php 
						$no=1;
						foreach ($alternatifs as $alternatif): ?>
					<tr align="center">
						<td><?= $alternatif->kode_alternatif; ?></td>
						<?php
						foreach ($kriterias as $kriteria):
							$id_alternatif = $alternatif->id_alternatif;
							$id_kriteria = $kriteria->id_kriteria;
							echo '<td>';
							// Pembulatan bagian Matrik Normalisasi Terbobot (A1 ke atas) (4 angka belakang koma)
							echo round($matriks_rb[$id_kriteria][$id_alternatif],4);
							// echo $matriks_rb[$id_kriteria][$id_alternatif];
							echo '</td>';
						endforeach;
						?>
					</tr>
					<?php
						$no++;
						endforeach;
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Perhitungan Nilai Akhir</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<th>Alternatif</th>
						<th width="30%">Nilai S</th>
						<th width="30%">Nilai K</th>
					</tr>
				</thead>
				<tbody>
					<tr align="center" class="bg-light">
						<td>A0</td>
						<!-- Pembulatan bagian Nilai S (A0 saja) (4 angka belakang koma) -->
						<td><?= round($total_rb0,4);?></td>
						<!-- <td><?= $total_rb0;?></td> -->
						<td><?= $total_rb0/$total_rb0;?></td>
					</tr>
					<?php 
						$no=1;
						$this->Perhitungan_model->hapus_hasil();
						foreach ($alternatifs as $alternatif):
						$id_alternatif = $alternatif->id_alternatif;
						?>
					<tr align="center">
						<td><?= $alternatif->kode_alternatif; ?></td>
						<?php
							echo '<td>';
							// Pembulatan bagian Nilai S (A1 ke atas) (4 angka belakang koma)
							echo round($total_rb[$id_alternatif],4);
							// echo $total_rb[$id_alternatif];
							echo '</td>';
							echo '<td>';
							// Pembulatan bagian Nilai K (A1 ke atas) (4 angka belakang koma)
							echo $nilai_k = round(($total_rb[$id_alternatif]/$total_rb0),4);
							// echo $nilai_k = ($total_rb[$id_alternatif]/$total_rb0);
							echo '</td>';
						?>
					</tr>
					<?php
						$no++;
						$hasil_akhir = [
							'id_alternatif' => $id_alternatif,
							'nilai_k' => $nilai_k,
						];
						$this->Perhitungan_model->insert_hasil($hasil_akhir);
						endforeach;
					?>
				</tbody>
			</table>
		</div>
		<b>Nilai K</b> dari yang <b>terbesar</b> sampai <b>terkecil</b> akan digunakan untuk perangkingan semua Alternatif (kecuali A0) di halaman <b>Hasil Akhir</b>.
	</div>
</div>

<!-- Untuk redirect User ke Hasil Akhir jika mereka mengganti bobot kriteria sebelumnya (supaya Hasil Akhir ter-update) -->
<?php if($this->session->userdata('id_user_level') != '1'): ?>
	<?php redirect('Perhitungan/hasil'); ?>
<?php endif ?>

<!-- Untuk redirect Admin ke Hasil Akhir jika mereka mengganti kriteria, sub-kriteria, alternatif, atau penilaian sebelumnya (supaya Hasil Akhir ter-update) -->
<?php if($_SERVER['QUERY_STRING'] == 'UpdateHasilAkhir'): ?>
	<?php redirect('Perhitungan/hasil'); ?>
<?php endif ?>

<?php
$this->load->view('layouts/footer_admin');
?>