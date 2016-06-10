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

if(isset($_POST['edit'])){
   $id = $_POST['id'];
  $judul = $_POST['judul'];
  $kelas = $_POST['kelas'];
  $mapel = $_POST['mapel'];
  $guru = $_POST['guru'];
  $tgl_posting = date('Y-m-d');

 
  $valid_ext = array('doc','docx','pdf','ppt','pptx','xls','xlsx','zip','rar');
  $ukuran = $_FILES['materi']['size'];
  $ukuran = 3432432;
  $ext = strtolower(end(explode('.', $_FILES['materi']['name'])));
  if(in_array($ext, $valid_ext)){
    move_uploaded_file($_FILES['materi']['tmp_name'], '../upload/materi/'.$_FILES['materi']['name']) ;    
  }else{
    echo "Maaf ekstensi file tidak boleh";
  }
  $filenama = str_replace(' ', '-', $_FILES['materi']['name']);

  $s = "UPDATE materi SET id_file='$id',judul='$judul',
  id_kelas='$kelas',id_matapelajaran='$mapel',file_materi='$filenama',tgl_posting='$tgl_posting',id_guru='$guru'";
  $s .= "WHERE id_file='$id'";


 

  $sql = $conn->query($s);
  if($sql){
    cho "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=materi");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM materi WHERE id_file='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
	<h2>Edit Materi</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_file']; ?>">
  </div>
  <div class="form-group">
    <label for="nama">Judul</label>
    <input type="text" name="judul" class="form-control" value="<?php echo $row['judul']; ?>">
  </div>
   <div class="form-group">
    <label for="nama">Kelas</label>
    <select  name="kelas" class="form-control" >
    <?php tampil_kelas($row['id_kelas']); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Mata Pelajaran</label>
    <select  name="mapel" class="form-control" >
    <?php tampil_mapel($row['id_matapelajaran']); ?>
    </select>
  </div>
  <div class="form-group">
    <label for="nama">Guru</label>
    <select  name="guru" class="form-control" >
    <?php tampil_guru($row['id_guru']); ?>
    </select>
  </div>

  <div class="form-group">
    <label for="foto1">Materi</label>
    <input type="file" name="materi" >
    <p class="help-block"><?php echo $row['file_materi'] ?></p>
  </div>
  <br/><button type="submit" name="edit" class="btn btn-primary">Edit Materi</button>
</form>
<?php } ?>