<?php
include '../conf/connect.php';



$s = "DELETE FROM album WHERE id_album='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	
	header("location: ?p=album");
}
?>