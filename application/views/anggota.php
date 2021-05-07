<?php $this->load->view('template/header');?>
<div class="box box-primary">
	<div class="box-header">
		Form Input Data Anggota
	</div>
	<div class="box-body">
	<form action="<?php echo base_url() ?>index.php/Welcome/Simpan_anggota" method="POST">
		Nama Anggota 	<input type="text" name="nama_anggota" class="form-control">
		Kelas   		<input type="text" name="jenis_kelamin" class="form-control">
		Jenis Kelamin   <input type="text" name="jenis_kelamin" class="form-control">
		No Hp           <input type="number" name="no_hp" class="form-control">
		Alamat          <input type="text" name="alamat" class="form-control">
		<br>
		<input class="btn btn-primary btn-md pull-right" type="submit" value="SIMPAN">
	</form>
</div>
</div>

<div class="box box-primary">
		<div class="box-body">
			<table class="table table-bordered table-hover">
	<tr>
		<td><b>Id</b></td>
		<td><b>Nama Anggota</b></td>
		<td><b>Kelas</b></td>
		<td><b>Jenis Kelamin</b></td>
		<td><b>No Hp</b></td>
		<td><b>Alamat</b></td>
	</tr>
	<?php foreach($data_anggota as $tampilkan) {
	echo "<tr>";
		echo "<td> $tampilkan->id_anggota</td>";
		echo "<td> $tampilkan->nama_anggota</td>";
		echo "<td> $tampilkan->kelas</td>";
		echo "<td> $tampilkan->jenis_kelamin</td>";
		echo "<td> $tampilkan->no_hp</td>";
		echo "<td> $tampilkan->alamat</td>";
		echo "<td><a href='Editanggota/$tampilkan->id_anggota'<button class='btn btn-warning btn-xs'>Edit</button></a><button class='btn btn-danger btn-xs' onClick='hapus($tampilkan->id_anggota)'>Hapus</button></td>";
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
			url : "<?php echo base_url('index.php/Welcome/Getidanggota') ?>/"+id,
			type :"GET",
			dataType:"JSON",
			success: function(data){
				$('[name="id_anggota"]').val(data.id_anggota);
				$('#modal-default').modal('show');
			},
			error :function(jqHXR,textStatus,errorThrown){
				alert('Gagal Ambil Data Ajax');
			}
		});
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
              <form action="<?php echo base_url() ?>index.php/Welcome/Hapusanggota" method="POST" id="form_hapus">
              	<input type="hidden" name="id_anggota" value="">
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