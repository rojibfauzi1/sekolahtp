<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_prestasi) as id FROM prestasi";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 

?>
<div class="judul">
	<h2>Tambah Album Foto</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8" action="?p=tambahprestasi">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama Lomba</label>
    <input type="text" required name="nama" class="form-control" placeholder="Nama Lomba">
  </div>
   
  <div class="form-group">
    <label for="nama">Tingkat</label>
    <input type="text" required name="tingkat" class="form-control" placeholder="Tingkat">
  </div>
  <div class="form-group">
    <label for="nama">Prestasi</label>
    <input type="number" required name="prestasi" class="form-control" placeholder="Prestasi">
  </div>
  <div class="form-group">
    <label for="nama">Tahun</label>
    <input type="number" required name="tahun" class="form-control" placeholder="Tahun">
  </div>

  <button type="submit" name="kirim" class="btn btn-primary">Tambah Prestasi</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Prestasi</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Nama Lomba</th>
	  <th>Tingkat</th>
	  <th>Tahun</th>
	  <th>Peringkat</th>
	  <th>Aksi</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT * FROM prestasi";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama_lomba'] ?></td>
	  <td><?php echo $row['tingkat'] ?></td>
	  <td><?php echo $row['peringkat'] ?></td>
	  <td><?php echo $row['tahun'] ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusprestasi&id=<?php echo $row['id_prestasi'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editprestasi&id=<?php echo $row['id_prestasi'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>