<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_file) as id FROM materi";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 

function tampil_kelas(){
include '../conf/connect.php';
	$sql = "SELECT * FROM kelas ";
	$s = $conn->query($sql);
	while($row = $s->fetch_assoc()){
		echo "<option value='".$row['id_kelas']."'>".$row['nama_kelas']."</option>";
	}
}


function tampil_mapel(){
include '../conf/connect.php';
	$sql = "SELECT * FROM mata_pelajaran join pengajar_mapel on mata_pelajaran.id_matapelajaran=pengajar_mapel.id_mapel WHere id_pengajar='".$_SESSION['id_pengajar']."'";
	$s = $conn->query($sql);
	while($row = $s->fetch_assoc()){
		echo "<option value='".$row['id_matapelajaran']."'>".$row['matapelajaran']."</option>";
	}
}

?>
<div class="judul">
	<h2>Tambah Materi</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8" action="?p=tambahmateri">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul</label>
    <input type="text" required name="judul" class="form-control" placeholder="Judul">
  </div>
   <div class="form-group">
    <label for="nama">Kelas</label>
    <select  required name="kelas" class="form-control" >
    <?php tampil_kelas(); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Mata Pelajaran</label>
    <select  required name="mapel" class="form-control" >
    <?php tampil_mapel(); ?>
    </select>
  </div>
 

  <div class="form-group">
    <label for="foto1">Materi</label>
    <input type="file" required name="materi" accept=".doc,.docx,.pdf,.ppt,.pptx,.xls,.xlsx,.zip,.rar" >

    
  </div>
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Materi</button>
</form>

<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Materi</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Judul</th>
	  <th>Mata Pelajaran</th>
	  <th>Tanggal Posting</th>
	  <th>Aksi</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT id_file,materi.judul,mata_pelajaran.matapelajaran,materi.tgl_posting,id_pengajar 
	FROM mata_pelajaran join materi on materi.id_matapelajaran=mata_pelajaran.id_matapelajaran 
	join pengajar on materi.id_guru=pengajar.id_pengajar  WHERE id_pengajar='$_SESSION[id_pengajar]'";
	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['judul'] ?></td>
	  <td><?php echo $row['matapelajaran'] ?></td>
	  <td><?php echo date('d m Y',strtotime($row['tgl_posting']))  ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusmateri&id=<?php echo $row['id_file'] ?>" onclick="return confirm('Apakah anda yakin menghapus ini ? ')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editmateri&id=<?php echo $row['id_file'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>