<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $email = $_POST['email'];
 
  
  $fotonama = str_replace(' ', '-', $id.'-'.$username.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/admin/'.$fotonama) ;

$cek = "SELECT * FROM admin where id_admin='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_admin) as id FROM admin";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

  $sql = "INSERT INTO admin VALUES ('$id','$username','$password','$email','$fotonama')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=admin");
  }
}else{

  $sql = "INSERT INTO admin VALUES ('$id','$username','$password','$email','$fotonama')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=admin");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

