<?php
include '../conf/connect.php';
$s = "DELETE FROM siswa WHERE id_siswa='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	header("location: ?p=siswa");
}
?>