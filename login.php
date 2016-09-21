<?php
	
	//var_dump($_GET);
	//echo "<br>";
	//var_dump($_POST);
	
	$loginEmailError = "";
	
	if (isset ($_POST["loginEmail"])) {
		
		
		if(empty($_POST["loginEmail"])) {
			
			$loginEmailError = "Sisesta E-Post !";
		
		}
	
	}
	
	
	$loginPasswordError = "";
	
	if (isset ($_POST["loginPassword"])) {
		
		
		if(empty($_POST["loginPassword"])) {
			
			$loginPasswordError = "Sisesta Parool !";
		
		}
	
	}
	
	
	
	
	
	
	
	$signupEmailError = "*";
	$signupEmail = "";
	//kas keegi vajutas nuppu 
	
	if (isset ($_POST["signupEmail"])) {
		
		//on olemas
		//kas email on olemas
		if(empty($_POST["signupEmail"])) {
			
			//on tühi
			$signupEmailError = "Väli on kohustuslik!";
		
		} else {
			$signupEmail = $_POST["signupEmail"];
		}
	
	}
	
	//kas epost on tühi
	
	$signupPasswordError = "*";
	
	if (isset ($_POST["signupPassword"])) {
		
		if(empty($_POST["signupPassword"])) {
			
			$signupPasswordError = "Väli on kohustuslik!";
			
		} else { 
		
			if (strlen($_POST["signupPassword"]) < 8 ) {
				
				$signupPasswordError = "* Parool peab olema vähemalt kaheksa märki!";
				}
		
			}	
		
	}
	
	
	$birthdateError = "*";
	
	if (isset ($_POST["birthdate"])) {
		
		
		if(empty($_POST["birthdate"])) {
			
			//on tühi
			$birthdateError = "Sisesta sünnikuupäev!";
		
		}
	
	}
	
	$genderError = "";
	
	if (isset ($_POST["gender"])) {
		
		
		if(empty($_POST["gender"])) {
			
			$genderError = "Sisesta sugu !";
		
		}
	
	}
	
		$gender = "Mees";
	
	if (isset ($_POST["gender"])) {
		if (empty ($_POST["gender"])) {
			$genderError = "* Väli on kohustuslik!";
		} else {
			$gender = $_POST["gender"];
		}
		
	} 
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sisselogimise leht</title>
	</head>
<body>

	<h1>Logi Sisse</h1>
	<form method="POST">
	
		<label>E-Post:</label> 
		
		<br>
		
		<input name="loginEmail" type = "email" > <?php echo $loginEmailError ; ?>
		
		<br><br>
		
		<label>Parool:</label>
		
		<br>
		
		<input name="loginPassword" type = "password" > <?php echo $loginPasswordError ; ?>
	
		<br><br>
		
		<input type = "submit" value = "LOGI SISSE" >
		
	</form>
	
	<br><br>
	<h1>Loo kasutaja</h1>
	<form method="POST">
	
		<label>E-Post:</label> 
		
		<br>
		
		<input name="signupEmail" type = "email" value="<?=$signupEmail;?>"> <?php echo $signupEmailError ; ?>
		
		<br><br>
		
		
		<label>Parool:</label>
		
		<br>
		
		<input name="signupPassword" type = "password" > <?php echo $signupPasswordError; ?>
	
		<br><br>
		
		
		<label>Sünnikuupäev:</label>
		
		<br>
		
		<input name="birthdate" type = "date" > <?php echo $birthdateError; ?>
	
		<br><br>
		
		
		<label>Sugu:</label>
		
		<br>
		
		<?php if ($gender == "Mees") { ?>
			<input name="gender" type = "radio" value ="Mees" checked >	Mees
		<?php } else { ?>
			<input name="gender" type = "radio" value ="Mees" >	Mees
		<?php } ?>
		
		<br>
		
		<?php if ($gender == "Naine") { ?>
			<input name="gender" type = "radio" value ="Naine" checked > Naine
		<?php } else { ?>
			<input name="gender" type = "radio" value ="Naine" > Naine
		<?php } ?>
		
		<br><br>
		
		<input type = "submit" value = "LOO KASUTAJA" >
		
		
		
		
		
		
		
		
	</form>
	
	</body>
</html>