
<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_pengajarmapel) as id FROM pengajar_mapel";
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
function tampil_siswa(){
include '../conf/connect.php';
	$sql = "SELECT siswa.id_siswa,siswa.nama_siswa FROM siswa left join kelas_siswa  on kelas_siswa.id_siswa=siswa.id_siswa where kelas_siswa.id_siswa is null";
	$s = $conn->query($sql);
	while($row = $s->fetch_assoc()){
		echo "<option value='".$row['id_siswa']."'>".$row['nama_siswa']."</option>";
	}
}

?>
<div class="judul">
	<h2>Tambah Kelas Siswa</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8" action="?p=tambahkelas_siswa">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama"> Kelas</label>
    <select required name="kelas" class="form-control">
    	<?php tampil_kelas(); ?> 
    </select>
  </div>
   <div class="form-group">
    <label for="nama">Siswa</label>
    <select  name="siswa" required class="form-control" >
    <?php tampil_siswa(); ?>
    </select>
  </div>
 
  
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Kelas Siswa</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Guru Kelas Siswa</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Kelas</th>
	  <th>Nama Siswa</th>
	  <th>Aksi</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT id_kelas_siswa,kelas.nama_kelas,siswa.nama_siswa FROM kelas_siswa 
	join kelas on kelas_siswa.id_kelas=kelas.id_kelas 
	join siswa on kelas_siswa.id_siswa=siswa.id_siswa";
	

	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama_kelas'] ?></td>
	  <td><?php echo $row['nama_siswa'] ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapuskelas_siswa&id=<?php echo $row['id_kelas_siswa'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editkelas_siswa&id=<?php echo $row['id_kelas_siswa'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>