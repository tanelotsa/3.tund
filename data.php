<?php
	//ühendan sessiooniga
	require("functions.php");
	
	//kui ei ole sisseloginud, suunan login lehele
	if (!isset($_SESSION["userId"])) {
		header("Location: login.php");		
	}
	
	
	
	//kas aadressi real on logout
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
		
	}

?>

<h1>Data</h1>

<p>

	Tere Tulemast <?=$_SESSION ["userEmail"];?> !
	<a href="?logout=1">Logi Välja</a>

</p>