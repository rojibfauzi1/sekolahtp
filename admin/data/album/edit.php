<?php
include '../conf/connect.php';



if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $judul = $_POST['judul'];
  $keterangan = $_POST['keterangan'];
  $tanggal = date('Y-m-d');
  
 
  $s = "UPDATE album SET id_album='$id',jdl_album='$judul',
  album_seo='$keterangan',tanggal='$tanggal'";
  $s .= "WHERE id_album='$id'";


 

  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=album");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM album WHERE id_album='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
	<h2>Edit Album</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_album'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul Album</label>
    <input type="text" name="judul" class="form-control" value="<?php echo $row['jdl_album'] ?>">
  </div>
   
  <div class="form-group">
    <label for="nama">Keterangan</label>
    <input type="text" name="keterangan" class="form-control" value="<?php echo $row['album_seo'] ?>">
  </div>
  <br/><button type="submit" name="edit" class="btn btn-primary">Edit Album</button>
</form>
<?php } ?>