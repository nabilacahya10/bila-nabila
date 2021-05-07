<div class="box box-primary">
	<div class="box-header">
		Form Input Data Anggota
	</div>
	<div class="box-body">
		<form action="<?php echo base_url() ?>index.php/Welcome/updateanggota" method="POST">
		<?php
			foreach ($get_id_anggota as $tampilkan) { ?>
				<input type="hidden" name="id_anggota" value="<?php echo $tampilkan->id_anggota?>">
			Nama Anggota		<input type="text" name="nama_anggota" class="form-control" value="<?php echo $tampilkan->nama_anggota?>">
			Kelas      			<input type="text" name="kelas" class="form-control" value="<?php echo $tampilkan->kelas?>">
			Jenis Kelamin    	<input type="text" name="jenis_kelamin" class="form-control" value="<?php echo $tampilkan->jenis_kelamin?>">
			No Hp   			<input type="text" name="no_hp" class="form-control" value="<?php echo $tampilkan->no_hp?>">
			Alamat  			<input type="text" name="alamat" class="form-control" value="<?php echo $tampilkan->alamat?>">
			<br>
			<input class="btn btn-primary btn-md pull-right" type="submit" value="SIMPAN">
		<?php }
		?>
	</form>
</div>
</div>