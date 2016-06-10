<?php
include '../conf/connect.php';

if(isset($_POST['edit'])){
  $id = $_POST['id'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];
  ;

  $fotonama = str_replace(' ', '-', $username.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/admin/'.$fotonama) ;


  $s = "UPDATE admin SET id_admin='$id',username='$username',password='$password',
  email='$email',gambar='$fotonama'";
  $s .= "WHERE id_admin='$id'";
  $sql = $conn->query($s);
  if($sql){
    echo "<script>alert('Data berhasil diedit');</script>";
    header("Refresh: 0; URL=?p=admin");
  }
}elseif($_GET['id']){
  $s = "SELECT * FROM admin WHERE id_admin='$_GET[id]'";
  $sql = $conn->query($s);
  $row = $sql->fetch_assoc();
?>

<div class="judul">
  <h2>Edit Admin</h2>
</div>
<form method="post" enctype="multipart/form-data" class="col-md-8">
  <div class="form-group">
    <label for="id">ID</label>
    <input type="text" name="id" class="form-control" readOnly value="<?php echo $row['id_admin'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">username</label>
    <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>">
  </div>
  <div class="form-group">
    <label for="nama">Password</label>
    <input type="password" name="password" class="form-control" value="" required>
  </div>
  <div class="form-group">
    <label for="nama">Email</label>
    <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>">
  </div>
  
  <div class="form-group">
    <label for="fot1o">Foto</label>
    <input type="file" name="gambar" accept="image/jpeg">
  </div>
  <img width="100px" src="../upload/admin/<?php echo $row['gambar'] ?>"><br/><br/>
  <button type="submit" name="edit" class="btn btn-primary">Edit admin</button>
</form>
<div class="bawah" style="margin-bottom:1000px;"></div>
<?php } ?>
