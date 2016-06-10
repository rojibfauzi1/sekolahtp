<?php
include '../conf/connect.php';

function tampil_album($i){
include '../conf/connect.php';
  $sql1 = "SELECT * FROM album where id_album = '$i'";
  $s1 = $conn->query($sql1);
  while($row = $s1->fetch_assoc()){
    echo "<option value='".$row['id_album']."'>".$row['jdl_album']."</option>";
  }

  $sql = "SELECT * FROM album where id_album != '$i' order by id_album ASC";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['id_album']."'>".$row['jdl_album']."</option>";  
  }
}

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $album = $_POST['album'];
  $judul = $_POST['judul'];
  $seo = $_POST['judul'];
  $keterangan = $_POST['keterangan'];
  
  

  $fotonama = str_replace(' ', '-', $id.'-'.$judul.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'],'../upload/gallery/'.$fotonama) ;

  $s = "UPDATE gallery SET id_gallery='$id',id_album='$album',
  judul_gallery='$judul',gallery_seo='$seo',keterangan='$keterangan',gambar_gallery='$fotonama'";
  $s .= "WHERE id_gallery='$id'";
  /*print_r($s);
  die();*/

 

  $sql = $conn->query($s);

  if($sql){
     echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=gallery");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM gallery WHERE id_gallery='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
	<h2>Edit Gallery</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_gallery']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul Gallery</label>
    <input type="text" name="judul" class="form-control" value="<?php echo $row['judul_gallery']; ?>">
  </div>
   <div class="form-group">
    <label for="nama">Album</label>
    <select  name="album" class="form-control" >
    <?php tampil_album($row['jdl_album']); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Keterangan</label>
    <textarea  name="keterangan" class="form-control"><?php echo $row['keterangan']; ?></textarea>
  </div>
  <div class="form-group">
    <label for="foto1">Gambar</label>
    <input type="file" name="gambar" accept="image/jpeg">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <img width="100px" src="../upload/gallery/<?php echo $row['gambar_gallery'] ?>">
  <br/><br/><button type="submit" name="edit" class="btn btn-primary">Edit Gallery</button>
</form>
<?php } ?>