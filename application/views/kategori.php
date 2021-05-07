<div class="box box-primary">
	<div class="box-header">
		Form Input Data Kategori
	</div>
	<div class="box-body">
	<form action="<?php echo base_url() ?>index.php/Welcome/Simpankategori" method="POST">
		Nama Buku 		<input type="text" name="nama_buku" class="form-control">
		Jenis Buku   	<input type="text" name="jenis_buku" class="form-control">
		Penulis Buku    <input type="text" name="penulis_buku" class="form-control">
		Penerbit Buku   <input type="text" name="penerbit_buku" class="form-control">
		<br>
		<button class="btn btn-primary btn-md pull-right" type="submit">SIMPAN</button>
	</form>
</div>
</div>

<?php $this->load->view('template/header');?>
<div class="box box-primary">
	<div class="box-header">
		<div class="box-body">
			<table class="table table-bordered table-hover">
	</div>
	</div>
	<tr>
		<td><b>Id Buku</b></td>
		<td><b>Nama Buku</b></td>
		<td><b>Jenis Buku</b></td>
		<td><b>Penulis Buku</b></td>
		<td><b>Penerbit Buku</b></td>
	</tr>
	<?php foreach($data_kategori as $tampilkan) {
	echo "<tr>";
		echo "<td> $tampilkan->id_buku</td>";
		echo "<td> $tampilkan->nama_buku</td>";
		echo "<td> $tampilkan->jenis_buku</td>";
		echo "<td> $tampilkan->penulis_buku</td>";
		echo "<td> $tampilkan->penerbit_buku</td>";
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
			url : "<?php echo base_url('index.php/Welcome/getidkategori') ?>/"+id,
			type :"GET",
			dataType:"JSON",
			success: function(data){
				$('[name="id_kategori"]').val(data.id_kategori);
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
              <form action="<?php echo base_url() ?>index.php/Welcome/Hapuskategori"method="POST" id="form_hapus">
              	<input type="hidden" name="id_kategori" value="">
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

