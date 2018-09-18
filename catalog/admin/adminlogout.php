<?php

if (isset($_POST['submit'])) {
	session_start();
	session_unset(admin_id);
	session_destroy();
	header("Location: adminindex.php");
	exit();
}