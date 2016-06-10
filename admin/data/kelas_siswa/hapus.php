<?php
include '../conf/connect.php';



$s = "DELETE FROM kelas_siswa WHERE id_kelas_siswa='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=kelas_siswa");
}
?>