<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_matapelajaran) as id FROM mata_pelajaran";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 
?>
<div class="judul">
	<h2>Tambah Mata Pelajaran</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8" action="?p=tambahmapel">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Mata Pelajaran</label>
    <input type="text" required name="mapel" class="form-control" placeholder="Mata Pelajaran">
  </div>
  <div class="form-group">
    <label for="nama">Keterangan</label>
    <input type="text" required name="keterangan" class="form-control" placeholder="Keterangan">
  </div>
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Mata Pelajaran</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Mata Pelajaran</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Nama Mata Pelajaran</th>
	  <th>Keterangan</th>
	  <th>Event</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT * FROM mata_pelajaran";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['matapelajaran'] ?></td>
	  <td><?php echo $row['keterangan'] ?></td>
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusmapel&id=<?php echo $row['id_matapelajaran'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editmapel&id=<?php echo $row['id_matapelajaran'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>