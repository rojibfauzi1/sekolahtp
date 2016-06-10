<?php

if(!empty($_POST['login'])){
  $user = $_POST['username'];
  $pass1 = md5($_POST['password']);

  

  $s1 = "SELECT * FROM admin WHERE username='$user' and password='$pass1'";
  $sql1 = $conn->query($s1);
  
 $nip = $_POST['username'];
  $pass2 = md5($_POST['password']);

 $s2 = "SELECT * FROM pengajar WHERE nip='$nip' and password='$pass2'";
  $sql2 = $conn->query($s2);
$cek2 = $sql2->num_rows;


  $cek1 = $sql1->num_rows;
  if($cek1){
    $row = $sql1->fetch_assoc();
    if($sql1 > 0){
      $_SESSION['login'] = 1;
      $_SESSION['username'] = $user;
      $_SESSION['password'] = $pass;
    /*  $_SESSION['level'] = $row['level'];*/
      
      
    /*  if($_SESSION['level']=='admin'){*/
        header("Refresh: 0; URL=admin/index.php?p=dasboard_admin");
       
     /* } */  
     /* elseif ($_SESSION['level']=='guru') {
        
        header("Refresh: 0; URL=../admin/guru.php");
      }*/
    }

  }elseif($cek2){
    $row = $sql2->fetch_assoc();
    if($sql2 > 0){
      $_SESSION['login'] = 2;
      $_SESSION['nip'] = $nip;
      $_SESSION['password'] = $pass2;
      $_SESSION['nama_guru'] = $row['nama_guru'];
      $_SESSION['id_pengajar'] = $row['id_pengajar'];
      $_SESSION['gambar'] = $row['gambar'];

        header("Refresh: 0; URL=admin/guru.php?p=dasboard_guru");
       
   
    }
  }else{
      echo "<script>window.alert('gagal login username / password salah')</script>";
    }
}
?>