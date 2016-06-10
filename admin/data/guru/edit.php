<?php
include '../conf/connect.php';

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  $email = $_POST['email'];
  $hp = $_POST['hp'];
  $tempat = $_POST['tempat'];
  $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
  $agama = $_POST['agama'];
  $jabatan = $_POST['jabatan'];
  $alamat = $_POST['alamat'];
  $password = md5($_POST['password']);

 $fotonama = str_replace(' ', '-', $nip.'-'.$nama.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar1']['tmp_name'], '../upload/guru/'.$fotonama);



  $s = "UPDATE pengajar SET id_pengajar='$id',nip='$nip',nama_guru='$nama',
  jenis_kelamin='$jk',email='$email',No_HP='$hp',tempat_lahir='$tempat',tgl_lahir='$tanggal',
  agama='$agama',jabatan='$jabatan',alamat='$alamat',password='$password',gambar='$fotonama'";
  $s .= " WHERE id_pengajar='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=guru");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM pengajar WHERE id_pengajar='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
  <h2>Edit Guru</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_pengajar']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">NIP</label>
    <input type="text" name="nip" class="form-control" value="<?php echo $row['nip']?>">
  </div>

  <div class="form-group">
    <label for="nama">Nama Guru</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama_guru']?>">
  </div>
  <div class="form-group">
    <label for="jk">Jenis Kelamin</label><br/>
    <input type="radio" name="jk" value="laki-Laki"<?php if($row['jenis_kelamin']=='laki-laki'){echo 'checked';}?>>Laki-Laki<br/>
    <input type="radio" name="jk" value="perempuan"<?php if($row['jenis_kelamin']=='perempuan'){echo 'checked';}?>>Perempuan<br/>
  </div>
  <div class="form-group">
    <label for="nama">Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $row['email']?>">
  </div>
  <div class="form-group">
    <label for="nama">No HP</label>
    <input type="text"  required name="hp" value="<?php echo $row['No_HP']?>" class="form-control" pattern="08[0-9]{10,11}">
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
    <label for="nama">Jabatan</label>
    <input type="text" name="jabatan" class="form-control" value="<?php echo $row['jabatan']?>">
  </div>
  <div class="form-group">
    <label for="nama">Alamat</label>
    <textarea name="alamat" class="form-control" ><?php echo $row['alamat']?></textarea>
  </div>
  <div class="form-group">
    <label for="nama">Password</label>
    <input type="text" name="password" class="form-control" >
  </div>
   
  <div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" name="gambar1" accept="image/jpeg">
  </div><br/>
  <img width="100px" src="../upload/guru/<?php echo $row['gambar'] ?>"><br/><br/>
  <button type="submit" name="edit" class="btn btn-primary">Edit Guru</button>
</form>
<div class="bawah" style="margin-bottom:1000px;"></div>
<?php } ?>
