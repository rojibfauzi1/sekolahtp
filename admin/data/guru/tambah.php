<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $nip = $_POST['nip'];
  $nama = $_POST['nama'];
  $jk = $_POST['jk'];
  $email = $_POST['email'];
  $hp = $_POST['hp'];
  $tempat = $_POST['tempat'];
  $tanggal = date('Y-m-d',strtotime($_POST['tanggal']));
  $agama = $_POST['agama'];
  $jabatan = $_POST['jabatan'];
  $alamat = $_POST['alamat'];
  $password = md5($_POST['password']);
  

$fotonama = str_replace(' ', '-', $nip.'-'.$nama.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/guru/'.$fotonama) ;


$cek = "SELECT * FROM pengajar where id_pengajar='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_pengajar) as id FROM pengajar";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

  $sql = "INSERT INTO pengajar VALUES ('$id','$nip','$nama','$jk','$email','$hp',
    '$tempat','$tanggal','$agama','$jabatan','$alamat','$password',$fotonama')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=guru");
  }
}else{

  $sql = "INSERT INTO pengajar VALUES ('$id','$nip','$nama','$jk','$email','$hp',
  	'$tempat','$tanggal','$agama','$jabatan','$alamat','$password','$fotonama')";

  $s = $conn->query($sql);

  if($s){
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=guru");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

