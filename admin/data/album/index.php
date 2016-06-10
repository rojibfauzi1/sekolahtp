<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_album) as id FROM album";
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
<form method="post" enctype="multipart/form" class="col-md-8" action="?p=tambahalbum">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul Album</label>
    <input type="text" required name="judul" class="form-control" placeholder="Judul Album">
  </div>
   
  <div class="form-group">
    <label for="nama">Keterangan</label>
    <input type="text" required name="keterangan" class="form-control" placeholder="Keterangan">
  </div>

  <button type="submit" name="kirim" class="btn btn-primary">Tambah Album</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Album Foto</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Judul</th>
	  <th>Tanggal Posting</th>
	  <th>Aksi</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT * FROM album";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['jdl_album'] ?></td>
	  <td><?php echo $row['album_seo'] ?></td>
	  <td><?php echo date('d m Y',strtotime($row['tanggal'])) ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusalbum&id=<?php echo $row['id_album'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editalbum&id=<?php echo $row['id_album'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>