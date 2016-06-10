<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_kelas) as id FROM kelas";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 
?>
<div class="judul">
	<h2>Tambah Kelas</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8" action="?p=tambahkelas">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Kelas</label>
    <input type="text" required name="kelas" class="form-control" placeholder="Kelas">
  </div>
  
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Kelas</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Kelas</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Kelas</th>
	  
	  <th>Event</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT * FROM kelas";
	$s = $conn->query($sql);
	while($row= $s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama_kelas'] ?></td>
	  
	  
	  <td>
	  	<a class="btn btn-danger" href="?p=hapuskelas&id=<?php echo $row['id_kelas'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editkelas&id=<?php echo $row['id_kelas'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>