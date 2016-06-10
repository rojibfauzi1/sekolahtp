<?php
include '../conf/connect.php';

if(isset($_POST['edit'])){
   $id = $_POST['id'];
  $mapel = $_POST['mapel'];
  $keterangan = $_POST['keterangan'];

  $s = "UPDATE mata_pelajaran SET id_matapelajaran='$id',matapelajaran='$mapel',keterangan='$keterangan'";
  $s .= "WHERE id_matapelajaran='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=matapelajaran");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM mata_pelajaran WHERE id_matapelajaran='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
  <h2>Edit Mata Pelajaran</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_matapelajaran'] ?>" ReadOnly="">
  </div>
  <div class="form-group">
    <label for="nama">Mata Pelajaran</label>
    <input type="text" name="mapel" class="form-control" value="<?php echo $row['matapelajaran'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Keterangan</label>
    <input type="text" name="keterangan" class="form-control" value="<?php echo $row['keterangan'] ?>">
  </div>
  <button type="submit" name="edit" class="btn btn-primary">Edit Mata Pelajaran</button>
</form>
<?php } ?>