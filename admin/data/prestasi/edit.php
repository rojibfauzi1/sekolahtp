<?php
include '../conf/connect.php';



if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $tingkat = $_POST['tingkat'];
  $peringkat = $_POST['peringkat'];
  $tahun = $_POST['tahun'];
  
 
  $s = "UPDATE prestasi SET id_prestasi='$id',nama_lomba='$nama',
  tingkat='$tingkat',peringkat='$peringkat',tahun='$tahun'";
  $s .= "WHERE id_prestasi='$id'";


 

  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=prestasi");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM prestasi WHERE id_prestasi='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
	<h2>Edit Prestasi</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_prestasi'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama Lomba</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama_lomba'] ?>">
  </div>
   
  <div class="form-group">
    <label for="nama">Tingkat</label>
    <input type="text" name="tingkat" class="form-control" value="<?php echo $row['tingkat'] ?>">
  </div>
   <div class="form-group">
    <label for="nama">Peringkat</label>
    <input type="number" name="peringkat" class="form-control" value="<?php echo $row['peringkat'] ?>">
  </div>
    <div class="form-group">
    <label for="nama">Tahun</label>
    <input type="number" name="tahun" class="form-control" value="<?php echo $row['tahun'] ?>">
  </div>
  <br/><button type="submit" name="edit" class="btn btn-primary">Edit Prestasi</button>
</form>
<?php } ?>