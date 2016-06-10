<?php
include '../conf/connect.php';

function tampil_guru($i){
include '../conf/connect.php';
  $sql1 = "SELECT * FROM pengajar where id_pengajar = '$i'";
  $s1 = $conn->query($sql1);
  while($row = $s1->fetch_assoc()){
    echo "<option value='".$row['id_pengajar']."'>".$row['nama_guru']."</option>";
  }

  $sql = "SELECT * FROM pengajar where id_pengajar != '$i' order by id_pengajar ASC";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['id_pengajar']."'>".$row['nama_guru']."</option>";  
  }
}
function tampil_mapel($i){
include '../conf/connect.php';
  $sql1 = "SELECT * FROM mata_pelajaran where id_matapelajaran = '$i'";
  $s1 = $conn->query($sql1);
  while($row = $s1->fetch_assoc()){
    echo "<option value='".$row['id_matapelajaran']."'>".$row['matapelajaran']."</option>";
  }

  $sql = "SELECT * FROM mata_pelajaran where id_matapelajaran != '$i' order by id_matapelajaran ASC";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['id_matapelajaran']."'>".$row['matapelajaran']."</option>";  
  }
}
function tampil_sarana($i){
include '../conf/connect.php';
  $sql1 = "SELECT * FROM sarana_sekolah where id_sarana = '$i'";
  $s1 = $conn->query($sql1);
  while($row = $s1->fetch_assoc()){
    echo "<option value='".$row['id_sarana']."'>".$row['nama_sarana']."</option>";
  }

  $sql = "SELECT * FROM sarana_sekolah where id_sarana != '$i' order by id_sarana ASC";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['id_sarana']."'>".$row['nama_sarana']."</option>";  
  }
}

if(isset($_POST['edit'])){
   $id = $_POST['id'];
  $guru = $_POST['guru'];
  $mapel = $_POST['mapel'];
  $sarana = $_POST['sarana'];
  
 
  $s = "UPDATE pengajar_mapel SET id_pengajarmapel='$id',id_pengajar='$guru',
  id_mapel='$mapel',id_sarana='$sarana'";
  $s .= "WHERE id_pengajarmapel='$id'";


 

  $sql = $conn->query($s);
  if($sql){
     echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=guru_mapel");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM pengajar_mapel WHERE id_pengajarmapel='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
	<h2>Edit Guru Mapel</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_pengajarmapel']; ?>">
  </div>
  <div class="form-group">
    <label for="nama"> Guru</label>
    <select name="guru" class="form-control">
      <?php tampil_guru($row['id_pengajar']); ?> 
    </select>
  </div>
   <div class="form-group">
    <label for="nama">Kategori Mapel</label>
    <select  name="mapel" class="form-control" >
    <?php tampil_mapel($row['id_mapel']); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Kategori Sarana</label>
    <select  name="sarana" class="form-control" >
    <?php tampil_sarana($row['id_sarana']); ?>
    </select>
  </div>
  <br/><button type="submit" name="edit" class="btn btn-primary">Edit Guru Mapel</button>
</form>
<?php } ?>