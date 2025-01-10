<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<!-- Judul halaman jika Admin -->
	<?php if($this->session->userdata('id_user_level') == '1'): ?>
    	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Kriteria</h1>
    	<a href="<?= base_url('Kriteria/create'); ?>" class="btn btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
	<?php endif; ?>

	<!-- Judul halaman jika User -->
	<?php if($this->session->userdata('id_user_level') != '1'): ?>
		<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Pembobotan Kriteria</h1>
	<?php endif; ?>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <!-- /.card-header -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fa fa-table"></i> Daftar Data Kriteria</h6>
    </div>
    <div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead class="bg-info text-white">
					<tr align="center">
						<th width="5%">No</th>
						<?php if($this->session->userdata('id_user_level') == '1'): ?>
							<th>Kode Kriteria</th>
						<?php endif; ?>
						<th>Nama Kriteria</th>
						<th>Bobot</th>
						<th>Jenis</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=1;
						foreach ($list as $data => $value) {
					?>
					<tr align="center">
						<td><?=$no ?></td>
						<?php if($this->session->userdata('id_user_level') == '1'): ?>
							<td><?php echo $value->kode_kriteria ?></td>
						<?php endif; ?>
						<td><?php echo $value->keterangan ?></td>
						<td><?php echo ($value->bobot)*100 ?>% (<?php echo $value->bobot ?>)</td>
						<td><?php echo $value->jenis ?></td>
						<td>
							<div class="btn-group" role="group">
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?=base_url('Kriteria/edit/'.$value->id_kriteria)?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
								<?php if($this->session->userdata('id_user_level') == '1'): ?>
									<a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?=base_url('Kriteria/destroy/'.$value->id_kriteria)?>" onclick="return confirm ('Apakah anda yakin untuk menghapus data ini?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
								<?php endif; ?>
							</div>
						</td>
					</tr>
					<?php
						$no++;
						}
					?>
				</tbody>
			</table>
			<!-- Penjelasan Benefit / Cost jika Admin -->
			<?php if($this->session->userdata('id_user_level') == '1'): ?>
				<h6> Kriteria jenis Benefit: Nilai Sub Kriteria yang lebih besar = lebih baik </h6>
				<h6> Kriteria jenis Cost: Nilai Sub Kriteria yang lebih kecil = lebih baik </h6>
			<?php endif; ?>

			<!-- Penjelasan Benefit / Cost jika User -->
			<?php if($this->session->userdata('id_user_level') != '1'): ?>
				<h6> Kriteria jenis Benefit bersifat "lebih besar = lebih baik" </h6>
				<h6> Kriteria jenis Cost bersifat "lebih kecil = lebih baik" </h6>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php $this->load->view('layouts/footer_admin'); ?>