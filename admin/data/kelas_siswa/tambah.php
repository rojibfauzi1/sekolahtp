<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $kelas = $_POST['kelas'];
  $siswa = $_POST['siswa'];
  

$cek = "SELECT * FROM kelas_siswa where id_kelas_siswa='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_kelas_siswa) as id FROM kelas_siswa";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

  $sql = "INSERT INTO kelas_siswa VALUES ('$id','$kelas','$siswa')";
  /*print_r($sql);
  die();*/
  $s = $conn->query($sql);
  
  if($s){
    
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=kelas_siswa");
  }
}else{  
 
  $sql = "INSERT INTO kelas_siswa VALUES ('$id','$kelas','$siswa')";
  /*print_r($sql);
  die();*/
  $s = $conn->query($sql);
  
  if($s){
  	
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=kelas_siswa");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

