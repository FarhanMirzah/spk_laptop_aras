<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-list"></i> Data Alternatif</h1>

	<a href="<?= base_url('Alternatif'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-edit"></i> Edit Data Alternatif</h6>
    </div>
	
	<?php echo form_open_multipart('Alternatif/update/'.$alternatif->id_alternatif); ?>
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_alternatif', $alternatif->id_alternatif) ?>
				<div class="form-group col-md-12">
					<label class="font-weight-bold">Kode Alternatif</label>
					<input autocomplete="off" type="text" name="kode_alternatif" value="<?php echo $alternatif->kode_alternatif ?>" required class="form-control"/>
					<br>
					<label class="font-weight-bold">Nama Alternatif</label>
					<input autocomplete="off" type="text" name="nama_alternatif" value="<?php echo $alternatif->nama_alternatif ?>" required class="form-control"/>
				</div>
			</div>
			<h6 class="font-weight-bold">Gambar Alternatif sekarang (<?= $alternatif->gambar_alternatif ?>)</h6>
			<img src="../../uploads/<?= $alternatif->gambar_alternatif ?>" alt="<?= $alternatif->nama_alternatif ?>" style="max-width: 450px; max-height: 275px">
			<br>
			<br>

			<label class="font-weight-bold">Gambar Alternatif baru</label>
			<input type="file" name="userfile" id="userfile" class="form-control" accept="image/*"/>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>