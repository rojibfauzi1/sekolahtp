<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $kelas = $_POST['kelas'];


$cek = "SELECT * FROM kelas where id_kelas='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_kelas) as id FROM kelas";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

  $sql = "INSERT INTO kelas VALUES ('$id','$kelas')";
  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=kelas");
  }
}else{
  
  $sql = "INSERT INTO kelas VALUES ('$id','$kelas')";
  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=kelas");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

