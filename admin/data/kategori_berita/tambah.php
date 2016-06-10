<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];


$cek = "SELECT * FROM kategori where id_kategori='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_kategori) as id FROM kategori";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

 $sql = "INSERT INTO kategori VALUES ('$id','$nama')";
  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=kategori");
  }
}else{

  $sql = "INSERT INTO kategori VALUES ('$id','$nama')";
  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=kategori");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

