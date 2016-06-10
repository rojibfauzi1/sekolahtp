<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_gallery) as id FROM gallery";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 

function tampil_album(){
include '../conf/connect.php';
	$sql = "SELECT * FROM album ";
	$s = $conn->query($sql);
	while($row = $s->fetch_assoc()){
		echo "<option value='".$row['id_album']."'>".$row['jdl_album']."</option>";
	}
}
?>
<div class="judul">
	<h2>Tambah Galeri Foto</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahgallery">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" required class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul Gallery</label>
    <input type="text" name="judul" required class="form-control" placeholder="Judul">
  </div>
   <div class="form-group">
    <label for="nama">Album</label>
    <select  required name="album" class="form-control" >
    <?php tampil_album(); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Keterangan</label>
    <textarea  required name="keterangan" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="foto1">Gambar</label>
    <input type="file" name="gambar" accept="image/jpeg">
   
  </div>
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Gallery</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Gallery Foto</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Judul Gallery</th>
	  <th>Album</th>
	  <th>Aksi</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT gallery.judul_gallery,album.jdl_album,id_gallery FROM gallery join album 
	on gallery.id_album=album.id_album order by id_gallery desc";
	/*$sql = "SELECT * FROM gallery";*/
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['judul_gallery'] ?></td>
	  <td><?php echo $row['jdl_album'] ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusgallery&id=<?php echo $row['id_gallery'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editgallery&id=<?php echo $row['id_gallery'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>