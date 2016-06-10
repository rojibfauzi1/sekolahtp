<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $kategori = $_POST['kategori'];
  $judul = $_POST['judul'];
  $isi = $_POST['isi'];
  
  $tgl_posting =  date('Y-m-d H:i:s');
  $jam = date('h:i:s');
  $pengirim = $_SESSION['username'];

  $fotonama = str_replace(' ', '-', $id.'-'.$pengirim.'.jpg');
  $filefoto = move_uploaded_file($_FILES['gambar']['tmp_name'], '../upload/berita/'.$fotonama) ;

$cek = "SELECT * FROM berita where id_berita='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_berita) as id FROM berita";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

 $sql = "INSERT INTO berita(id_berita,id_kategori,judul,isi_berita,gambar,tgl_posting,jam,pengirim) 
  VALUES ('$id','$kategori','$judul','$isi','$fotonama','$tgl_posting','$jam','$pengirim')";
  $s = $conn->query($sql);
  if($s){
    
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=berita");
  }
}else{

  $sql = "INSERT INTO berita(id_berita,id_kategori,judul,isi_berita,gambar,tgl_posting,jam,pengirim) 
  VALUES ('$id','$kategori','$judul','$isi','$fotonama','$tgl_posting','$jam','$pengirim')";
  $s = $conn->query($sql);
  if($s){
  	
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=berita");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>


