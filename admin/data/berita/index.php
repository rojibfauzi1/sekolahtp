
<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_berita) as id FROM berita";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 

function tampil_kategori(){
include '../conf/connect.php';
	$sql = "SELECT * FROM kategori ";
	$s = $conn->query($sql);
	while($row = $s->fetch_assoc()){
		echo "<option value='".$row['id_kategori']."'>".$row['nama_kategori']."</option>";
	}
}
?>
<div class="judul">
	<h2>Tambah Berita</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahberita">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul Berita</label>
    <input type="text" required name="judul" class="form-control" placeholder="Nama">
  </div>
   <div class="form-group">
    <label for="nama">Kategori Berita</label>
    <select  required name="kategori" class="form-control" >
    <?php tampil_kategori(); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Isi Berita</label>
    <textarea  required name="isi" id="text-ckeditor" class="form-control"></textarea>
  	<script>CKEDITOR.replace('text-ckeditor');</script>
  </div>
  <div class="form-group">
    <label for="foto1">Foto</label>
    <input type="file"  name="gambar" accept="image/jpeg">
    
  </div>
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Berita</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Berita</h2>
</div>

<table class="table table-striped" id="datatable">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Judul</th>
	  <th>Tanggal Posting</th>
	  <th>pengirim</th>
	  <th>Aksi</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$no = 1;
	$sql = "SELECT * FROM berita order by tgl_posting desc";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
		
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['judul'] ?></td>
	  <td><?php echo $row['tgl_posting'] ?></td>
	  <td><?php echo $row['pengirim'] ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusberita&id=<?php echo $row['id_berita'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editberita&id=<?php echo $row['id_berita'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>