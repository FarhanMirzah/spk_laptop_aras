<?php $this->load->view('layouts/header_admin'); ?>

<!-- Custom styles for this template-->
<link href="<?= base_url('assets/')?>css/sb-admin-2.css" rel="stylesheet">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>
	
	<?php if($this->session->userdata('id_user_level') == '1'): ?>
		<a href="<?= base_url('Laporan'); ?>" class="btn btn-primary"> <i class="fa fa-print"></i> Cetak Data </a>
	<?php endif ?>
</div>

<!-- Fungsi Filter [WIP], sebaiknya dijadikan sidebar -->
<div class="hasil-akhir-filter">
	<form method="post">
		<!-- Kode ubah warna tombol Filter -->
		<!-- Tidak ada filter = Tombol warna abu-abu -->
		<?php if(!isset($_POST['id_sub_kriteria'])): ?>
			<button type="submit" name="submit" class="btn btn-secondary"><i class="fa fa-filter"></i> Filter</button>
		<?php endif ?>

		<!-- Ada filter = Tombol warna biru -->
		<?php if(isset($_POST['id_sub_kriteria'])): ?>
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
						<div href="#filter_id_kriteria<?= $key->id_kriteria ?>" data-toggle="collapse">
							<label class="font-weight-bold text-info"><?= $key->keterangan ?></label>
							<a><i style="color: #36b9cc" class="fa fa-plus float-right pr-2"></i></a>
						</div>
						<?php foreach ($sub_kriteria as $subs_kriteria): ?>
							<!-- Kode untuk checklist jika tidak ada filter (kosong) -->
							<?php if(!isset($_POST['id_sub_kriteria'])): ?>
								<!-- Kode untuk collapse filter hasil akhir yang di tidak checklist -->
								<div id="filter_id_kriteria<?= $key->id_kriteria ?>" class="collapse">
									<input class="form-check-input" type="checkbox" name="id_sub_kriteria[]" value="<?= $subs_kriteria['id_sub_kriteria'] ?>" id="<?= $subs_kriteria['id_sub_kriteria'] ?>">
									<label class="form-check-label" for="<?= $subs_kriteria['id_sub_kriteria'] ?>"><?= $subs_kriteria['deskripsi'] ?></label>
								</div>
							<?php endif ?>

							<!-- Kode untuk checklist yang dipilih tetap checked setelah filter (label jadi bold dan warna biru) -->
							<?php if(isset($_POST['id_sub_kriteria'])): ?>
								<!-- Kode untuk collapse filter hasil akhir yang di checklist -->
								<?php 
									$id_sub_kriteria = join(',', $_POST['id_sub_kriteria']);
									$id_kriteria = $this->Perhitungan_model->get_id_kriteria($id_sub_kriteria);
									$id_kriteria_unique = array_unique(array_column($id_kriteria, 'id_kriteria'));
								?>
								<div id="filter_id_kriteria<?= $key->id_kriteria ?>" class="collapse<?php if(in_array($subs_kriteria['id_kriteria'], $id_kriteria_unique)){echo ".show";} ?>">
									<input class="form-check-input" type="checkbox" name="id_sub_kriteria[]" value="<?= $subs_kriteria['id_sub_kriteria'] ?>" id="<?= $subs_kriteria['id_sub_kriteria'] ?>" <?php if(in_array($subs_kriteria['id_sub_kriteria'], $_POST['id_sub_kriteria'])){echo "checked";} ?>>
									<?php if(!in_array($subs_kriteria['id_sub_kriteria'], $_POST['id_sub_kriteria'])): ?>
										<label class="form-check-label" for="<?= $subs_kriteria['id_sub_kriteria'] ?>"><?= $subs_kriteria['deskripsi'] ?></label>
									<?php endif ?>

									<?php if(in_array($subs_kriteria['id_sub_kriteria'], $_POST['id_sub_kriteria'])): ?>
										<label class="form-check-label text-primary font-weight-bold" for="<?= $subs_kriteria['id_sub_kriteria'] ?>"><?= $subs_kriteria['deskripsi'] ?></label>
									<?php endif ?>
								</div>
							<?php endif ?>
						<?php endforeach ?>
						<hr class="sidebar-divider">
					</div>
				<?php endif ?>
			<?php endforeach ?>
		</div>
	</form>
</div>

<!-- Tabel sebelum di filter -->
<?php if(!isset($_POST['id_sub_kriteria'])): ?>
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
											<img src="../uploads/<?= $keys->gambar_alternatif ?>" alt="<?= $keys->nama_alternatif ?>" style="max-width: 450px; max-height: 275px">
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
<?php if(isset($_POST['id_sub_kriteria'])): ?>
	<div class="hasil-akhir-content">
		<!-- /.card-header -->
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Hasil Akhir Perankingan (Filtered)</h6>
			<?php $arr=$_POST['id_sub_kriteria']; ?>
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
						<!-- Kode untuk menampilkan total alternatif yang ditampilkan pada Ranking (filtered) -->
						<?php
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
						<?php endforeach ?>
						<?php $jumlah_filtered = count($f_unique); ?>

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
													<img src="../uploads/<?= $keys->gambar_alternatif ?>" alt="<?= $keys->nama_alternatif ?>" style="max-width: 450px; max-height: 275px">
													<h6><b>Nilai K:</b> <?= $keys->nilai_k ?></h6>
													<h6><b>Ranking (filtered):</b> <?= $no_filtered ?> dari <?= $jumlah_filtered ?></h6>
													<h6><b>Ranking (all):</b> <?= $no ?> dari <?= $jumlah_ranking ?></h6>
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
							<?php $no_filtered++; endif ?>	
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