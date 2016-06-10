<?php
include '../conf/connect.php';



$s = "DELETE FROM pengajar_mapel WHERE id_pengajarmapel='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=guru_mapel");
}
?>