<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  
  $tempat = $_POST['tempat'];
  $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
  $agama = $_POST['agama'];
  
  $alamat = $_POST['alamat'];

 
$cek = "SELECT * FROM siswa where id_siswa='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
  $sql = "SELECT max(id_siswa) as id FROM siswa";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

   $sql = "INSERT INTO siswa VALUES ('$id','$nis','$nama','$jk',
    '$tempat','$tanggal','$agama','$alamat')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=siswa");
  }
}else{ 

  $sql = "INSERT INTO siswa VALUES ('$id','$nis','$nama','$jk',
  	'$tempat','$tanggal','$agama','$alamat')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=siswa");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

