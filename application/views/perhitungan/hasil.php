<?php $this->load->view('layouts/header_admin'); ?>

<!-- Custom styles for this template-->
<link href="<?= base_url('assets/')?>css/sb-admin-2.css" rel="stylesheet">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>
	
	<a href="<?= base_url('Laporan'); ?>" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak Data </a>
</div>

<!-- Fungsi Filter [WIP], sebaiknya dijadikan sidebar -->
<div class="hasil-akhir-filter">
	<form method="post">
		<?php if(!isset($_POST['submit'])): ?>
			<button type="submit" name="submit" class="btn btn-secondary"><i class="fa fa-filter"></i> Filter</button>
		<?php endif ?>
		<?php if(isset($_POST['submit'])): ?>
			<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-filter"></i> Filter</button>
		<?php endif ?>
		<br></br>
		<div class="form-check">
			<?php foreach ($kriteria as $key): ?>
				<?php 
					$sub_kriteria = $this->Perhitungan_model->data_sub_kriteria($key->id_kriteria);
					$f_unique=[];
				?>
				<?php if ($sub_kriteria!=NULL): ?>
					<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
					<div class="form-group">
						<label class="font-weight-bold" for="<?= $key->id_kriteria ?>"><?= $key->keterangan ?></label>
						<?php foreach ($sub_kriteria as $subs_kriteria): ?>
							<br>
							<input class="form-check-input" type="checkbox" name="id_sub_kriteria[]" value="<?= $subs_kriteria['id_sub_kriteria'] ?>" id="<?= $subs_kriteria['id_sub_kriteria'] ?>">
							<label class="form-check-label" for="<?= $subs_kriteria['id_sub_kriteria'] ?>"><?= $subs_kriteria['deskripsi'] ?></label>
						<?php endforeach ?>
					</div>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	</form>
</div>

<!-- Tabel sebelum di filter -->
<?php if(!isset($_POST['submit'])): ?>
	<div class="hasil-akhir-content">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Hasil Akhir Perankingan</h6>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-info text-white">
						<tr align="center">
							<th width="5%">Ranking</th>
							<th width="5%">Kode</th>
							<th>Alternatif</th>
							<th width="10%">Nilai K</th>
							<th width="10%">Aksi</th>
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
							<td align="left"><?= $keys->nama_alternatif ?></td>
							<td><?= $keys->nilai_k ?></td>
							<td>
								<div class="btn-group" role="group">
									<a data-toggle="modal" title="Detail Data" href="#detail<?= $keys->id_alternatif ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
								</div>
							</td>
						</tr>

						<!-- Modal untuk Detail Alternatif - Hasil Akhir -->
						<!-- Modal -->
						<div class="modal fade" id="detail<?= $keys->id_alternatif ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="myModalLabel"><i class="fa fa-eye"></i> Detail Alternatif - Hasil Akhir</h5>
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<?= form_open('Perhitungan/detail_alternatif') ?>
										<div class="modal-body">
											<h5 class="modal-title" id="myModalLabel"><b>(<?= $keys->kode_alternatif ?>)</b> <?= $keys->nama_alternatif ?></h5>
											<h6><b>Nilai K:</b> <?= $keys->nilai_k ?></h6>
											<h6><b>Ranking:</b> <?= $no ?> dari <?= $jumlah_ranking ?></h6>
											<hr>
											<?php foreach ($kriteria as $key): ?>
											<?php 
											$sub_kriteria = $this->Perhitungan_model->data_sub_kriteria($key->id_kriteria);
											?>
											<?php if ($sub_kriteria!=NULL): ?>
											<input type="text" name="id_alternatif" value="<?= $keys->id_alternatif ?>" hidden>
											<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
											
											<!-- Detail Alternatif - Hasil Akhir -->
											<div class="form-group">
												<label class="font-weight-bold" for="<?= $key->id_kriteria ?>"><?= $key->keterangan ?></label>
												<?php foreach ($sub_kriteria as $subs_kriteria): ?>
													<?php $s_option = $this->Perhitungan_model->data_penilaian($keys->id_alternatif,$subs_kriteria['id_kriteria']); ?>
													<?php if ($s_option!=NULL): ?>
														<h6>
															<?php if($subs_kriteria['id_sub_kriteria']==$s_option['id_sub_kriteria']){
																$pilihan = $subs_kriteria['deskripsi'];
																echo "<h6>$pilihan</h6>";
															} ?> 
														</h6>
													<?php endif ?>
												<?php endforeach ?>	
														
												<?php if ($s_option==NULL): ?>
													<h6>--Data Penilaian belum di Input--</h6>
												<?php endif ?>
											</div>
											<?php endif ?>
											<?php endforeach ?>
										</div>
									</form>
								</div>
							</div>
						</div>

						<?php
							$no++;
							endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif ?>

<!-- [WIP] Tabel untuk hasil sudah di filter -->
<?php if(isset($_POST['submit'])): ?>
	<div class="hasil-akhir-content">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Hasil Akhir Perankingan (Filtered)</h6>
			<?php
				$arr=$_POST['id_sub_kriteria'];
				echo "id_sub_kriteria yang di checklist: ";
				echo implode(", ",$arr ?? []);
			?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead class="bg-info text-white">
						<tr align="center">
							<th width="5%">Ranking</th>
							<th width="5%">Kode</th>
							<th>Alternatif</th>
							<th width="10%">Nilai K</th>
							<th width="10%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no=1;
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
									<td><?= $no; ?></td>
									<td><?= $keys->kode_alternatif ?></td>
									<td align="left"><?= $keys->nama_alternatif ?></td>
									<td><?= $keys->nilai_k ?></td>
									<td>
										<div class="btn-group" role="group">
											<a data-toggle="modal" title="Detail Data" href="#detail<?= $keys->id_alternatif ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
										</div>
									</td>
								</tr>

								<!-- Modal untuk Detail Alternatif - Hasil Akhir -->
								<!-- Modal -->
								<div class="modal fade" id="detail<?= $keys->id_alternatif ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="myModalLabel"><i class="fa fa-eye"></i> Detail Alternatif - Hasil Akhir</h5>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<?= form_open('Perhitungan/detail_alternatif') ?>
												<div class="modal-body">
													<h5 class="modal-title" id="myModalLabel"><b>(<?= $keys->kode_alternatif ?>)</b> <?= $keys->nama_alternatif ?></h5>
													<h6><b>Nilai K:</b> <?= $keys->nilai_k ?></h6>
													<h6><b>Ranking:</b> <?= $no ?> dari <?= $jumlah_ranking ?></h6>
													<hr>
													<?php foreach ($kriteria as $key): ?>
													<?php 
													$sub_kriteria = $this->Perhitungan_model->data_sub_kriteria($key->id_kriteria);
													?>
													<?php if ($sub_kriteria!=NULL): ?>
													<input type="text" name="id_alternatif" value="<?= $keys->id_alternatif ?>" hidden>
													<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
													
													<!-- Detail Alternatif - Hasil Akhir -->
													<div class="form-group">
														<label class="font-weight-bold" for="<?= $key->id_kriteria ?>"><?= $key->keterangan ?></label>
														<?php foreach ($sub_kriteria as $subs_kriteria): ?>
															<?php $s_option = $this->Perhitungan_model->data_penilaian($keys->id_alternatif,$subs_kriteria['id_kriteria']); ?>
															<?php if ($s_option!=NULL): ?>
																<h6>
																	<?php if($subs_kriteria['id_sub_kriteria']==$s_option['id_sub_kriteria']){
																		$pilihan = $subs_kriteria['deskripsi'];
																		echo "<h6>$pilihan</h6>";
																	} ?> 
																</h6>
															<?php endif ?>
														<?php endforeach ?>	
																
														<?php if ($s_option==NULL): ?>
															<h6>--Data Penilaian belum di Input--</h6>
														<?php endif ?>
													</div>
													<?php endif ?>
													<?php endforeach ?>
												</div>
											</form>
										</div>
									</div>
								</div>
							<?php endif ?>	
						<?php
							$no++;
							endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif ?>

<?php
$this->load->view('layouts/footer_admin');
?>