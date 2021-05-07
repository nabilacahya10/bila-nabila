<div class="box box-primary">
	<div class="box-header">
		Form Input Data Peminjaman
	</div>
	<div class="box-body">
		<form action="<?php echo base_url() ?>index.php/Welcome/updatepeminjaman" method="POST">
		<?php
			foreach ($get_id_peminjaman as $tampilkan) { ?>
				<input type="hidden" name="id_peminjaman" value="<?php echo $tampilkan->id_peminjaman?>">
			Nama peminjam		  <input type="text" name="nama_peminjam" class="form-control" value="<?php echo $tampilkan->nama_peminjam?>">
			Kelas      			  <input type="text" name="kelas" class="form-control" value="<?php echo $tampilkan->kelas ?>">
			Nama Buku    		  <input type="text" name="nama_buku" class="form-control" value="<?php echo $tampilkan->nama_buku ?>">
			Tanggal Pinjam   	  <input type="text" name="tanggal_pinjam" class="form-control" value="<?php echo $tampilkan->tanggal_pinjam ?>">
			Tanggal Kembali  	  <input type="text" name="tanggal_kembali" class="form-control" value="<?php echo $tampilkan->tanggal_kembali ?>">
			Tanggal Pengembalian  <input type="text" name="tanggal_pengembalian" class="form-control" value="<?php echo $tampilkan->tanggal_pengembalian ?>">
			Telat  				  <input type="text" name="telat" class="form-control" value="<?php echo $tampilkan->telat ?>">
			Denda 				  <input type="text" name="denda" class="form-control" value="<?php echo $tampilkan->denda ?>">
			Jumlah Pinjam  		  <input type="number" name="jumlah_pinjam" class="form-control" value="<?php echo $tampilkan->jumlah_pinjam ?>">
			Petugas  		      <input type="text" name="petugas" class="form-control" value="<?php echo $tampilkan->petugas ?>">
			<br>
			<input class="btn btn-primary btn-md pull-right" type="submit" value="SIMPAN">
		<?php }
		?>
	</form>
</div>
</div>