<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $album = $_POST['album'];
  $judul = $_POST['judul'];
  $seo = $_POST['judul'];
  $keterangan = $_POST['keterangan'];
  
  

  $fotonama = str_replace(' ', '-', $id.'-'.$judul.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/gallery/'.$fotonama) ;

$cek = "SELECT * FROM gallery where id_gallery='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_gallery) as id FROM gallery";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

  $sql = "INSERT INTO gallery 
  VALUES ('$id','$album','$judul','$seo','$keterangan','$fotonama')";
  $s = $conn->query($sql);
  if($s){
    
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=gallery");
  }
}else{

  $sql = "INSERT INTO gallery 
  VALUES ('$id','$album','$judul','$seo','$keterangan','$fotonama')";
  $s = $conn->query($sql);
  if($s){
  	
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=gallery");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

