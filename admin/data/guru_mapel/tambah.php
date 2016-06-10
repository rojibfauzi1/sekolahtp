<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $guru = $_POST['guru'];
  $mapel = $_POST['mapel'];
  $sarana = $_POST['sarana'];
  

$cek = "SELECT * FROM pengajar where id_pengajar='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_pengajarmapel) as id FROM pengajar_mapel";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

 $sql = "INSERT INTO pengajar_mapel VALUES ('$id','$guru','$mapel','$sarana')";
  /*print_r($sql);
  die();*/
  $s = $conn->query($sql);
  
  if($s){
    
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=guru_mapel");
  }
}else{


  $sql = "INSERT INTO pengajar_mapel VALUES ('$id','$guru','$mapel','$sarana')";
  /*print_r($sql);
  die();*/
  $s = $conn->query($sql);
  
  if($s){
  	
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=guru_mapel");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

