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
	
	if ( 	 isset($_POST["age"]) &&
			 isset($_POST["color"]) &&
			 !empty($_POST["age"]) &&
			 !empty($_POST["color"]) 
		
		) {
			saveEvent($_POST["age"],$_POST["color"]);
		}
	
	
		
?>

<h1>Data</h1>

<p>

	Tere Tulemast <?=$_SESSION ["userEmail"];?> !
	<a href="?logout=1">Logi Välja</a>

</p>

<html>

<body>

	<h1>Kes läks üle tee?</h1>
	
	<form method="POST">
	
		<label>Vanus:</label> 
		
		<br>
		
		<input name="age" type = "number"> <//?php echo $loginEmailError ; ?>
		
		<br><br>
		
		<label>Foori tule värv:</label>
		
		<br>
		
		<input name="color" type = "color" > <//?php echo $loginPasswordError ; ?>
	
		<br><br>
		
		<input type = "submit" value = "SAVE" >
		
	</form>
</body>	
</html>