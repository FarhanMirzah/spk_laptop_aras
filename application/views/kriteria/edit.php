<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Kriteria</h1>

	<a href="<?= base_url('Kriteria'); ?>" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-edit"></i> Edit Data Kriteria</h6>
    </div>
	
	<?php echo form_open('Kriteria/update/'.$kriteria->id_kriteria); ?>
		<div class="card-body">
			<div class="row">
				<?php echo form_hidden('id_kriteria', $kriteria->id_kriteria) ?>
				<div class="form-group col-md-6" <?php if ($this->session->userdata('id_user_level') != "1") echo " style='display: none';"; ?>>
					<label class="font-weight-bold">Kode Kriteria</label>
					<input autocomplete="off" type="text" name="kode_kriteria" value="<?php echo $kriteria->kode_kriteria ?>" required class="form-control" <?php if($this->session->userdata('id_user_level') != "1"){echo "readonly";} ?> />
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Nama Kriteria</label>
					<input autocomplete="off" type="text" name="keterangan" value="<?php echo $kriteria->keterangan ?>" required class="form-control" <?php if($this->session->userdata('id_user_level') != "1"){echo "readonly";} ?> />
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Bobot Kriteria</label>
					<input autocomplete="off" type="number" name="bobot" step="0.01" min="0.01" max="1" value="<?php echo $kriteria->bobot ?>" required class="form-control"/>
				</div>
				
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jenis Kriteria</label>
					<select name="jenis" class="form-control" required <?php if($this->session->userdata('id_user_level') != "1"){echo "readonly style='pointer-events: none';";} ?>>
						<option value="Benefit" <?php if($kriteria->jenis == "Benefit"){ echo 'selected'; } ?>>Benefit</option>
						<option value="Cost" <?php if($kriteria->jenis == "Cost"){ echo 'selected'; } ?>>Cost</option>						
					</select>
				</div>

				<div class="form-group col-md-6">
					<label class="font-weight-bold">Status Kriteria</label>
					<select name="status_kriteria" class="form-control" required >
						<option value="Aktif" <?php if($kriteria->status_kriteria == "Aktif"){ echo 'selected'; } ?>>Aktif</option>
						<option value="Nonaktif" <?php if($kriteria->status_kriteria == "Nonaktif"){ echo 'selected'; } ?>>Nonaktif</option>						
					</select>
				</div>
			</div>
			<!-- Penjelasan Benefit / Cost jika Admin -->
			<?php if($this->session->userdata('id_user_level') == '1'): ?>
				<h6> Kriteria jenis <b>Benefit</b>: Nilai Sub Kriteria yang lebih besar = lebih baik </h6>
				<h6> Kriteria jenis <b>Cost</b>: Nilai Sub Kriteria yang lebih kecil = lebih baik </h6>
				<h6> Kriteria status <b>Aktif</b>: Digunakan dalam perhitungan pemilihan alternatif </h6>
				<h6> Kriteria status <b>Nonaktif</b>: Tidak digunakan dalam perhitungan pemilihan alternatif </h6>
			<?php endif; ?>

			<!-- Penjelasan Benefit / Cost jika User -->
			<?php if($this->session->userdata('id_user_level') != '1'): ?>
				<h6> Kriteria jenis <b>Benefit</b> bersifat "lebih besar = lebih baik" </h6>
				<h6> Kriteria jenis <b>Cost</b> bersifat "lebih kecil = lebih baik" </h6>
				<h6> Kriteria status <b>Aktif</b>: Digunakan dalam perhitungan pemilihan laptop </h6>
			<h6> Kriteria status <b>Nonaktif</b>: Tidak digunakan dalam perhitungan pemilihan laptop </h6>
			<?php endif; ?>
		</div>
		<div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	<?php echo form_close() ?>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>