<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $tema = $_POST['tema'];
  $isi = $_POST['isi'];
  $tempat = $_POST['tempat'];
  $jam = $_POST['jam'] ;
  $tgl_mulai = date('Y-m-d',strtotime($_POST['tgl_mulai']));
  $tgl_selesai = date('Y-m-d',strtotime($_POST['tgl_selesai'])) ;
  $tgl_posting = date('Y-m-d');
  $pengirim = $_SESSION['username'];
  

$cek = "SELECT * FROM pengumuman where id_pengumuman='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_pengumuman) as id FROM pengumuman";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

 $sql = "INSERT INTO pengumuman 
  VALUES ('$id','$tema','$isi','$tempat','$jam','$tgl_mulai','$tgl_selesai','$tgl_posting','$pengirim')";
  $s = $conn->query($sql);
  if($s){
    
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=pengumuman");
  }
}else{ 

  
  $sql = "INSERT INTO pengumuman 
  VALUES ('$id','$tema','$isi','$tempat','$jam','$tgl_mulai','$tgl_selesai','$tgl_posting','$pengirim')";
  $s = $conn->query($sql);
  if($s){
  	
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=pengumuman");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

