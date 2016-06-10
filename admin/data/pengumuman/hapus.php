<?php
include '../conf/connect.php';




$s = "DELETE FROM pengumuman WHERE id_pengumuman='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=pengumuman");
}
?>