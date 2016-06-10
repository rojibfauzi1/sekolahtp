<?php


function tampil_kategori($i){
include '../conf/connect.php';
  $sql1 = "SELECT * FROM kategori where id_kategori = '$i'";
  $s1 = $conn->query($sql1);
  while($row = $s1->fetch_assoc()){
    echo "<option value='".$row['id_kategori']."'>".$row['nama_kategori']."</option>";
  }

  $sql = "SELECT * FROM kategori where id_kategori != '$i' order by id_kategori ASC";
  $s = $conn->query($sql);
  while($row = $s->fetch_assoc()){
    echo "<option value='".$row['id_kategori']."'>".$row['nama_kategori']."</option>";  
  }
}

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $kategori = $_POST['kategori'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  
  $tgl_posting =  date('Y-m-d H:i:s');
  $jam = date('h:i:s');
  $pengirim = $_SESSION['username'];

   $fotonama = str_replace(' ', '-', $id.'-'.$judul.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/berita/'.$fotonama) ;

  $s = "UPDATE berita SET id_berita='$id',id_kategori='$kategori',
  judul='$judul',isi_berita='$isi',gambar='$fotonama',tgl_posting='$tgl_posting',jam='$jam',pengirim='$pengirim'";
  $s .= "WHERE id_berita='$id'";


 

  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=berita");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM berita WHERE id_berita='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
	<h2>Edit Berita</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_berita'] ?>" ReadOnly="">
  </div>
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="judul" class="form-control" value="<?php echo $row['judul'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Kategori</label>
    <select name="kategori" class="form-control">
    <?php tampil_kategori($row['id_kategori']); ?>
    </select> 
  </div>
  <div class="form-group">
    <label for="nama">Isi</label>
    <textarea  name="isi" id="text-ckeditor" class="form-control"><?php echo $row['isi_berita'] ?></textarea>
    <script type="text/javascript">CKEDITOR.replace('text-ckeditor');</script>
  </div>
   <div class="form-group">
    <label for="foto">Foto</label>
    <input type="file" name="gambar" accept="image/jpeg">
  </div>
  <img width="100px" src="../upload/berita/<?php echo $row['gambar'] ?>">
  <br/><br/><button type="submit" name="edit" class="btn btn-primary">Edit Kategori</button>
</form>
<?php } ?><br/><br/><br/><br/>