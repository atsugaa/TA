<?php
	require_once("../base.php");
	require_once(BASEPATH . "/app/database.php");
	session_start();
	if (!isset($_SESSION['user'])) {
		header("Location: ../index.php");
		exit();
	}
	$a = $_SESSION['id'];
	BayarOrder($_POST["metode"],$_POST["productid"]);
?>
