<?php
include '../conf/connect.php';

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  
  $tempat = $_POST['tempat'];
  $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
  $agama = $_POST['agama'];
  
  $alamat = $_POST['alamat'];

  $s = "UPDATE pengajar SET id_pengajar='$id',nis='$nis',nama_siswa='$nama',
  jenis_kelamin='$jk',tempat_lahir='$tempat',tgl_lahir='$tanggal',
  agama='$agama',alamat='$alamat'";
  $s .= "WHERE id_siswa='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=siswa");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM siswa WHERE id_siswa='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
  <h2>Edit Siswa</h2>
</div>
<form method="post" enctype="multipart/form" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_siswa']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">NIP</label>
    <input type="text" name="nip" class="form-control" value="<?php echo $row['nis']?>">
  </div>
  <div class="form-group">
    <label for="nama">Nama Guru</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama_siswa']?>">
  </div>
  <div class="form-group">
    <label for="jk">Jenis Kelamin</label><br/>
    <input type="radio" name="jk" value="laki-Laki"<?php if($row['jenis_kelamin']=='laki-laki'){echo 'checked';}?>>Laki-Laki<br/>
    <input type="radio" name="jk" value="perempuan"<?php if($row['jenis_kelamin']=='perempuan'){echo 'checked';}?>>Perempuan<br/>
  </div>
  
  <div class="form-group">
    <label for="nama">Tempat Lahir</label>
    <input type="text" name="tempat" class="form-control" value="<?php echo $row['tempat_lahir']?>">
  </div>
  <div class="form-group">
    <label for="nama">Tanggal Lahir</label>
    <input type="date" name="tanggal" class="form-control" value="<?php echo $row['tgl_lahir']?>">
  </div>
  <div class="form-group">
    <label for="nama">Agama</label>
    <input type="text" name="agama" class="form-control" value="<?php echo $row['agama']?>">
  </div>
  
  <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea name="alamat" class="form-control" ><?php echo $row['alamat']?></textarea>
  </div>
  <button type="submit" name="edit" class="btn btn-primary">Edit Siswa</button>
</form>
<div class="bawah" style="margin-bottom:1000px;"></div>
<?php } ?>
