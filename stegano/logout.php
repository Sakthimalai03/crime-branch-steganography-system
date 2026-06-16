<?php
	session_start();
	session_destroy();
	echo "<script>window.navigate('login.php');</script>";
?>