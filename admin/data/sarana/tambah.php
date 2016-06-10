<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $jumlah = $_POST['jumlah'];
  $keterangan = $_POST['keterangan'];
  $pengajar = $_POST['pengajar'];
  $nama = $_POST['nama'];
  $fungsi = $_POST['fungsi'];
  
 
$cek = "SELECT * FROM sarana_sekolah where id_sarana='$id'";
$sql = $conn->query($cek);
 if($sql->num_rows > 0){
  $sql = "SELECT max(id_sarana) as id FROM sarana_sekolah";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

  $sql = "INSERT INTO sarana_sekolah
  VALUES ('$id','$jumlah','$keterangan','$pengajar','$nama','$fungsi')";
  $s = $conn->query($sql);
  if($s){
    
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=sarana");
  }
}else{ 

  $sql = "INSERT INTO sarana_sekolah
  VALUES ('$id','$jumlah','$keterangan','$pengajar','$nama','$fungsi')";
  $s = $conn->query($sql);
  if($s){
  	
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=sarana");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

