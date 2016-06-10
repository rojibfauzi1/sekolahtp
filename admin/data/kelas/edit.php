<?php
include '../conf/connect.php';

if(isset($_POST['edit'])){
   $id = $_POST['id'];
  $kelas = $_POST['kelas'];
  

  $s = "UPDATE kelas SET id_kelas='$id',nama_kelas='$kelas'";
  $s .= "WHERE id_kelas='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=kelas");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM kelas WHERE id_kelas='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
  <h2>Edit Kelas</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_kelas'] ?>" ReadOnly="">
  </div>
  <div class="form-group">
    <label for="nama">Kelas</label>
    <input type="text" name="kelas" class="form-control" value="<?php echo $row['nama_kelas'] ?>">
  </div>
  
  <button type="submit" name="edit" class="btn btn-primary">Edit Kelas</button>
</form>
<?php } ?>