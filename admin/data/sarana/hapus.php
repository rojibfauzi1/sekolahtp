<?php
include '../conf/connect.php';




$s = "DELETE FROM sarana_sekolah WHERE id_sarana='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=sarana");
}
?>