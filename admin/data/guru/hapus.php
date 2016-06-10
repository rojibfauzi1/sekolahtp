<?php
include '../conf/connect.php';
$q = $conn->query("SELECT * FROM pengajar WHERE id_pengajar='$_GET[id]'");
$cek = $q->fetch_assoc();
$folder = "../upload/guru/$cek[gambar]";
if(file_exists($folder)){
	unlink($folder);
	header("location: ?p=guru");
}


$s = "DELETE FROM pengajar WHERE id_pengajar='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	header("location: ?p=guru");
}
?>