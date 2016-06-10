<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $tingkat = $_POST['tingkat'];
  $peringkat = $_POST['peringkat'];
  $tahun = $_POST['tahun'];
  
 $cek = "SELECT * FROM prestasi where id_prestasi='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_prestasi) as id FROM prestasi";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

 $sql = "INSERT INTO prestasi 
  VALUES ('$id','$nama','$tingkat','$peringkat','$tahun')";
  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=prestasi");

  }
}else{

  $sql = "INSERT INTO prestasi 
  VALUES ('$id','$nama','$tingkat','$peringkat','$tahun')";
  $s = $conn->query($sql);
  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=prestasi");

  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

