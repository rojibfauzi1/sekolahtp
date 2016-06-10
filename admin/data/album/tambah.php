<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $judul = $_POST['judul'];
  $keterangan = $_POST['keterangan'];
  $tanggal = date('Y-m-d');
  
 $cek = "SELECT * FROM album where id_album='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_album) as id FROM album";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

 $sql = "INSERT INTO album 
  VALUES ('$id','$judul','$keterangan','$tanggal')";
  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=album");

  }
}else{

  $sql = "INSERT INTO album 
  VALUES ('$id','$judul','$keterangan','$tanggal')";
  $s = $conn->query($sql);
  if($s){
  	echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=album");

  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

