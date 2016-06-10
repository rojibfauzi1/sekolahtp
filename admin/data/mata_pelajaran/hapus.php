<?php
include '../conf/connect.php';
$s = "DELETE FROM mata_pelajaran WHERE id_matapelajaran='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	header("location: ?p=matapelajaran");
}
?>