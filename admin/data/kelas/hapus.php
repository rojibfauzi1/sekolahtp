<?php
include '../conf/connect.php';
$s = "DELETE FROM kelas WHERE id_kelas='$_GET[id]'";
$sql = $conn->query($s);
if($sql){
	header("location: ?p=kelas");
}
?>