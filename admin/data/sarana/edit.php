<?php
include '../conf/connect.php';

function tampil_pengajar($i){
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

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $jumlah = $_POST['jumlah'];
  $keterangan = $_POST['keterangan'];
  $pengajar = $_POST['pengajar'];
  $nama = $_POST['nama'];
  $fungsi = $_POST['fungsi'];;
  
  
  $s = "UPDATE sarana_sekolah SET id_sarana='$id',jumlah='$jumlah',
  keterangan='$keterangan',id_pengajar='$pengajar',nama_sarana='$nama',fungsi='$fungsi'";
  $s .= "WHERE id_sarana='$id'";


 

  $sql = $conn->query($s);
  /*print_r($sql);
  die();*/
  if($sql){
     echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=sarana");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM sarana_sekolah WHERE id_sarana='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
	<h2>Edit Sarana Sekolah</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_sarana']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama Sarana</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama_sarana']; ?>">
  </div>
   <div class="form-group">
    <label for="nama">Jumlah</label>
    <input type="number" name="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>">
  </div>
   <div class="form-group">
    <label for="nama">Keterangan</label>
    <input type="text" name="keterangan" class="form-control" value="<?php echo $row['keterangan']; ?>">
  </div>

   <div class="form-group">
    <label for="nama">Guru</label>
    <select  name="pengajar" class="form-control" >
    <?php tampil_pengajar($row['id_pengajar']); ?>
    </select>
  </div>
   <div class="form-group">
    <label for="nama">Fungsi</label>
    <input type="text" name="fungsi" class="form-control" value="<?php echo $row['fungsi']; ?>">
  </div>
  <br/><br/><button type="submit" name="edit" class="btn btn-primary">Edit Sarana</button>
</form>
<?php } ?><br/><br/><br/><br/>