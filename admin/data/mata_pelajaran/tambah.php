<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $mapel = $_POST['mapel'];
  $keterangan = $_POST['keterangan'];


$cek = "SELECT * FROM mata_pelajaran where id_matapelajaran='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_matapelajaran) as id FROM mata_pelajaran";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

   $sql = "INSERT INTO mata_pelajaran VALUES ('$id','$mapel','$keterangan')";
  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=matapelajaran");
  }
}else{ 

  $sql = "INSERT INTO mata_pelajaran VALUES ('$id','$mapel','$keterangan')";
  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=matapelajaran");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

