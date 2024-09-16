<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-list"></i> Data Alternatif</h1>

	<?php if($this->session->userdata('id_user_level') == '1'): ?>
    	<a href="<?= base_url('Alternatif/create'); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
	<?php endif; ?>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Daftar Data Alternatif</h6>
    </div>

    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th width="5%">Kode</th>
						<th>Nama Alternatif</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($alternatif as $keys): 
					?>
					<tr align="center">
						<td><?=$no ?></td>
						<td><?=$keys->kode_alternatif ?></td>
						<td align="left"><?php echo $keys->nama_alternatif ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="modal" title="Detail Data" href="#detail<?= $keys->id_alternatif ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
								<?php if($this->session->userdata('id_user_level') == '1'): ?>
									<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?=base_url('Alternatif/edit/'.$keys->id_alternatif)?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
									<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=base_url('Alternatif/destroy/'.$keys->id_alternatif)?>" onclick="return confirm ('Apakah anda yakin untuk menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								<?php endif; ?>
							</div>
						</td>
					</tr>

					<!-- Modal untuk Detail Alternatif -->
					<!-- Modal -->
					<div class="modal fade" id="detail<?= $keys->id_alternatif ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel"><i class="fa fa-eye"></i> Detail Alternatif</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>
								<?= form_open('Alternatif/detail_alternatif') ?>
									<div class="modal-body">
										<h5 class="modal-title" id="myModalLabel"><b>(<?= $keys->kode_alternatif ?>)</b> <?= $keys->nama_alternatif ?></h5>
										<hr>
										<?php foreach ($kriteria as $key): ?>
										<?php 
										$sub_kriteria = $this->Alternatif_model->data_sub_kriteria($key->id_kriteria);
										?>
										<?php if ($sub_kriteria!=NULL): ?>
										<input type="text" name="id_alternatif" value="<?= $keys->id_alternatif ?>" hidden>
										<input type="text" name="id_kriteria[]" value="<?= $key->id_kriteria ?>" hidden>
										
										<!-- Detail Alternatif -->
										<div class="form-group">
											<label class="font-weight-bold" for="<?= $key->id_kriteria ?>"><?= $key->keterangan ?></label>
											<?php foreach ($sub_kriteria as $subs_kriteria): ?>
												<?php $s_option = $this->Alternatif_model->data_penilaian($keys->id_alternatif,$subs_kriteria['id_kriteria']); ?>
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

										<?php if ($this->session->userdata('id_user_level') != "1"): ?>
											<hr>
											Jika ada <b>Data Penilaian</b> yang belum di input. Silahkan login kembali dengan level <b>Administrator</b> untuk menginput.
										<?php endif ?>
									</div>
								</form>
							</div>
						</div>
					</div>
			<?php
				$no++;
				endforeach
			?>
			</tbody>
		</table>
	</div>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>