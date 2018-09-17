<?php
session_start();

	if(ISSET ($_POST['submit'])){

		include '../includes/dbh.inc.php';

		$username = $_POST['uid'];
		$password = $_POST['pwd'];
		$sql = "SELECT * FROM `admin` WHERE `username` = '$username' && `password` = '$password'" or die (mysqli_error());
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck > 0){
			
			$_SESSION['admin_id'] = $fetch['admin_id'];
			header('location:../chooseshoecat.php');
		}else{
			header("Location:adminindex.php?login=error");
			exit();
		}
	}
?>