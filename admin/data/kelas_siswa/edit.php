<?php
include '../conf/connect.php';

function tampil_kelas($i){
include '../conf/connect.php';
  $sql1 = "SELECT * FROM kelas where id_kelas = '$i'";
  $s1 = $conn->query($sql1);
  while($row = $s1->fetch_assoc()){
    echo "<option value='".$row['id_kelas']."'>".$row['nama_kelas']."</option>";
  }

  $sql = "SELECT * FROM kelas where id_kelas != '$i' order by id_kelas ASC";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['id_kelas']."'>".$row['nama_kelas']."</option>";  
  }
}
function tampil_siswa($i){
include '../conf/connect.php';
  $sql1 = "SELECT * FROM siswa where id_siswa = '$i'";
  $s1 = $conn->query($sql1);
  while($row = $s1->fetch_assoc()){
    echo "<option value='".$row['id_siswa']."'>".$row['mata_siswa']."</option>";
  }

  $sql = "SELECT * FROM siswa where id_siswa != '$i' order by id_siswa ASC";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['id_siswa']."'>".$row['mata_siswa']."</option>";  
  }
}


if(isset($_POST['edit'])){
   $id = $_POST['id'];
  $kelas = $_POST['kelas'];
  $siswa = $_POST['siswa'];
    
 
  $s = "UPDATE kelas_siswa SET id_kelas_siswa='$id',id_kelas='$kelas',
  id_siswa='$siswa'";
  $s .= "WHERE id_kelas_siswa='$id'";


 

  $sql = $conn->query($s);
  if($sql){
     echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=guru_mapel");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM kelas_siswa WHERE id_kelas_siswa='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
	<h2>Edit Kelas Siswa</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_kelas_siswa']; ?>">
  </div>
  <div class="form-group">
    <label for="nama"> Kelas</label>
    <select name="kelas" class="form-control">
      <?php tampil_kelas($row['id_kelas']); ?> 
    </select>
  </div>
   <div class="form-group">
    <label for="nama">Nama Siswa</label>
    <select  name="siswa" class="form-control" >
    <?php tampil_siswa($row['id_siswa']); ?>
    </select>
  </div>
  
  <br/><button type="submit" name="edit" class="btn btn-primary">Edit Kelas Siswa</button>
</form>
<?php } ?>