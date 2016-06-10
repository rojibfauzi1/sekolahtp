<?php
include '../conf/connect.php';



$s = "DELETE FROM prestasi WHERE id_prestasi='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=prestasi");
}
?>