<?php

if(isset($_POST['kirim'])){
  $id = $_POST['id'];
  $judul = $_POST['judul'];
  $kelas = $_POST['kelas'];
  $mapel = $_POST['mapel'];
  $guru = $_SESSION['id_pengajar'];
  $tgl_posting = date('Y-m-d');

 
/*
  $valid_ext = array('doc','docx','pdf','ppt','pptx','xls','xlsx','zip','rar');
  $ukuran = $_FILES['materi']['size'];
  $ukuran = 3432432;
  $ext = strtolower(end(explode('.', $_FILES['materi']['name'])));
  if(in_array($ext, $valid_ext)){
    move_uploaded_file($_FILES['materi']['tmp_name'], '../upload/materi/'.$_FILES['materi']['name']) ;    
  }else{
    echo "Maaf ekstensi file tidak boleh";
  }
  $filenama = str_replace(' ', '-', $_FILES['materi']['name']);*/
/*$lokasi_file    = $_FILES['materi']['tmp_name'];
    $tipe_file      = $_FILES['materi']['type'];
    $valid_ext = array('doc','docx','pdf','ppt','pptx','xls','xlsx','zip','rar');
    $ext = strtolower(end(explode('.', $_FILES['materi']['name'])));*/
    /*print_r($ext);
    die();*/
   /* $nama_file      = $_POST['judul'].''.'.'.in_array($ext, $valid_ext); */
   /* print_r($nama_file);
    die();
    // Apabila ada gambar yang diupload
    if (!empty($lokasi_file)){      
      if ($tipe_file != $ext && $tipe_file != $ext){
        echo "<script>window.alert('Upload Gagal, Pastikan File Foto yang di Upload Bertipe *.JPG')</script>";
        //ARAHKAN
        echo "<script>window.location='javascript:history.go(-1)';</script>";
      }else {
        //buat folder
        if(is_dir("../upload/materi"))
        {
          $tempat_gambar = "../upload/materi";
        }else{
          mkdir("../upload/materi");
          $tempat_gambar = "../upload/materi";
        }
        UploadImage($nama_file, $tempat_gambar ,"gambar");
      }
    }else{
      $nama_file = "default.jpg";
    }

*/

  $filenama = $_FILES['materi']['name'];
  $filefoto = move_uploaded_file($_FILES['materi']['tmp_name'], '../upload/materi/'.$filenama) ;

$cek = "SELECT * FROM materi where id_file ='$id'";
$sql = $conn->query($cek);
if($sql->num_rows > 0){
  $sql = "SELECT max(id_file) as id FROM materi";
  $s = $conn->query($sql);
  $row = $s->fetch_assoc();
  $idku = $row['id'];
  $nourut = (int)$idku;
  $nourut++;
  $id = $nourut; 

   $sql = "INSERT INTO materi 
  VALUES ('$id','$judul','$kelas','$mapel','$filenama','$tgl_posting','$guru')";
  $s = $conn->query($sql);
  if($s){
    
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 90; URL=?p=materi");
  }
}else{ 

  $sql = "INSERT INTO materi 
  VALUES ('$id','$judul','$kelas','$mapel','$filenama','$tgl_posting','$guru')";
  $s = $conn->query($sql);
  if($s){
  	
    echo "<script>alert('Data berhasil dimasukkan');</script>";
    header("Refresh: 0; URL=?p=materi");
  }else{
  echo "<script>alert('Data Gagal Dimasukkan');</script>";
}
}
}
?>
<?php ob_flush(); ?>

