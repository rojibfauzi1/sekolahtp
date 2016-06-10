<?php
include '../conf/connect.php';
$q = $conn->query("SELECT * FROM materi WHERE id_file='$_GET[id]'");
$cek = $q->fetch_assoc();
$folder = "../upload/materi/$cek[file_materi]";
if(file_exists($folder)){
	unlink($folder);
	header("location: ?p=materi");
}



$s = "DELETE FROM materi WHERE id_file='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=materi");
}
?>