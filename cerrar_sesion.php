<?php
session_start();
if(isset($_SESSION['US'])){
	session_destroy();
	header("Location:index.php?m=1");
}else{
echo"NO ah cerrado session";
}

?>