
<?php  ob_start(); ?>
<?php
$sql = "SELECT max(id_pengajarmapel) as id FROM pengajar_mapel";
$s = $conn->query($sql);
$row = $s->fetch_assoc();
$idku = $row['id'];
$nourut = (int)$idku;
$nourut++;
$idBaru = $nourut; 

function tampil_guru(){
include '../conf/connect.php';
	$sql = "SELECT * FROM pengajar ";
	$s = $conn->query($sql);
	while($row = $s->fetch_assoc()){
		echo "<option value='".$row['id_pengajar']."'>".$row['nama_guru']."</option>";
	}
}
function tampil_mapel(){
include '../conf/connect.php';
	$sql = "SELECT * FROM mata_pelajaran ";
	$s = $conn->query($sql);
	while($row = $s->fetch_assoc()){
		echo "<option value='".$row['id_matapelajaran']."'>".$row['matapelajaran']."</option>";
	}
}
function tampil_sarana(){
include '../conf/connect.php';
	$sql = "SELECT * FROM sarana_sekolah ";
	$s = $conn->query($sql);
	while($row = $s->fetch_assoc()){
		echo "<option value='".$row['id_sarana']."'>".$row['nama_sarana']."</option>";
	}
}
?>
<div class="judul">
	<h2>Tambah Guru Mapel</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8" action="?p=tambahguru_mapel">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" required name="id" class="form-control" readOnly value="<?php echo $idBaru; ?>">
  </div>
  <div class="form-group">
    <label for="nama"> Guru</label>
    <select required name="guru" class="form-control">
    	<?php tampil_guru(); ?> 
    </select>
  </div>
   <div class="form-group">
    <label for="nama">Kategori Mapel</label>
    <select  required name="mapel" class="form-control" >
    <?php tampil_mapel(); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Kategori Sarana</label>
    <select  required name="sarana" class="form-control" >
    <?php tampil_sarana(); ?>
    </select>
  </div>
  
  <button type="submit" name="kirim" class="btn btn-primary">Tambah Guru Mapel</button>
</form>
<div class="clear" style="clear:both;"></div>
<div class="judul">
	<h2>Guru Mapel</h2>
</div>

<table class="table table-striped">
	<thead>
		
	<tr>
	  <th>No</th>
	  
	  <th>Nama Guru</th>
	  <th>Mata Pelajaran</th>
	  <th>Aksi</th>
	</tr>
	</thead>
	<tbody>
		
	<?php
	$no = 1;
	$sql = "SELECT id_pengajarmapel,pengajar.nama_guru,mata_pelajaran.matapelajaran FROM pengajar_mapel 
	join pengajar on pengajar.id_pengajar=pengajar_mapel.id_pengajar 
	join mata_pelajaran on mata_pelajaran.id_matapelajaran=pengajar_mapel.id_mapel";
	

	$s = $conn->query($sql);
	while($row=$s->fetch_assoc()){
	?>
	<tr>
	  <td><?php echo $no; ?></td>
	  <td><?php echo $row['nama_guru'] ?></td>
	  <td><?php echo $row['matapelajaran'] ?></td>
	  <td>
	  	<a class="btn btn-danger" href="?p=hapusguru_mapel&id=<?php echo $row['id_pengajarmapel'] ?>" onclick="return confirm('Anda yakin ingin mengahpus ini ?')">Hapus</a>
	  	<a class="btn btn-warning" href="?p=editguru_mapel&id=<?php echo $row['id_pengajarmapel'] ?>">Edit</a>
	  </td>
	</tr>
	<?php $no++; } ?>
	</tbody>
</table>