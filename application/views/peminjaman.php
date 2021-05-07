<?php $this->load->view('template/header');?>
<div class="box box-primary">
	<div class="box-header">
		Form Input Data Peminjaman
	</div>
	<div class="box-body">
	<form action="<?php echo base_url() ?>index.php/Welcome/Simpan_peminjaman" method="POST">
		Nama Peminjam 		 <input type="text" name="nama_peminjam" class="form-control">
		Kelas  				 <input type="text" name="kelas" class="form-control">
		Nama Buku   		 <input type="text" name="nama_buku" class="form-control">
		Tanggal Pinjam  	 <input type="text" name="tanggal_pinjam" class="form-control">
		Tanggal Kembali 	 <input type="text" name="tanggal_kembali" class="form-control">
		Tanggal Pengembalian <input type="text" name="tanggal_pengembalian" class="form-control">
		Telat  				 <input type="text" name="telat" class="form-control">
		Denda  				 <input type="text" name="denda" class="form-control">
		Jumlah Pinjam   	 <input type="number" name="jumlah_pinjam" class="form-control">
		Petugas         	 <input type="text" name="petugas" class="form-control">
		<br>
		<input type="submit" class="btn btn-primary btn-md pull-right">
	</form>
</div>
</div>

<div class="box box-primary">
	<div class="box-header">
		<div class="box-body">
			<table class="table table-bordered table-hover">
	</div>
	</div>
	<tr>
		<td><b>Id</b></td>
		<td><b>Nama Peminjam</b></td>
		<td><b>Kelas</b></td>
		<td><b>Nama Buku</b></td>
		<td><b>Tanggal Pinjam</b></td>
		<td><b>Tanggal Kembali</b></td>
		<td><b>Tanggal Pengembalian</b></td>
		<td><b>Telat</b></td>
		<td><b>Denda</b></td>
		<td><b>Jumlah Pinjam</b></td>
		<td><b>Petugas</b></td>
		<td><b>Aksi</b></td>
	</tr>
	<?php foreach($data_peminjaman as $tampilkan) {
	echo "<tr>";
		echo "<td> $tampilkan->id_peminjaman</td>";
		echo "<td> $tampilkan->nama_peminjam</td>";
		echo "<td> $tampilkan->kelas</td>";
		echo "<td> $tampilkan->nama_buku</td>";
		echo "<td> $tampilkan->tanggal_pinjam</td>";
		echo "<td> $tampilkan->tanggal_kembali</td>";
		echo "<td> $tampilkan->tanggal_pengembalian</td>";
		echo "<td> $tampilkan->telat</td>";
		echo "<td> $tampilkan->denda</td>";
		echo "<td> $tampilkan->jumlah_pinjam</td>";
		echo "<td> $tampilkan->petugas</td>";
		echo "<td><a href='Editpeminjaman/$tampilkan->id_peminjaman'<button class='btn btn-warning btn-xs'>Edit</button></a><button class='btn btn-danger btn-xs' onClick='hapus($tampilkan->id_peminjaman)'>Hapus</button></td>";
	echo "</tr>";
	} ?>
</table>
			
		</div>
	</div>
</div>
<!-- JS -->
<script>
	function hapus(id){
		$('#form_hapus')[0].reset();
		$.ajax({
			url : "<?php echo base_url('index.php/Welcome/Getidpeminjaman') ?>/"+id,
			type :"GET",
			dataType:"JSON",
			success: function(data){
				$('[name="id_peminjaman"]').val(data.id_peminjaman);
				$('#modal-default').modal('show');
			},
			error :function(jqXHR,textStatus,errorThrown){
				alert('Gagal Ambil Data');
			}
		})
	}
</script>
<!-- Modal -->
		 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Pesan Hapus Data</h4>
              </div>
              <div class="modal-body">
              <form action="<?php echo base_url() ?>index.php/Welcome/Hapuspeminjaman"method="POST" id="form_hapus">
              	<input type="hidden" name="id_peminjaman" value="">
              	Apakah Data Tersebut akan dihapus?<br>
                
              </div>
              <div class="modal-footer">
              	<button type="button" class="btn btn-default pull-left" data-dismiss="modal">TIDAK</button>
                <button type="submit" class="btn btn-primary pull-right">YA</button>
              </form>
                
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>