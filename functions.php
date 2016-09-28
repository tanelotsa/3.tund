<?php
	$database = "if16_taneotsa_4";
	
	function signup($email, $password) {
		
		//loon ühenduse 
		
		
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli ->prepare("INSERT INTO user_sample (email, password, gender, birthdate) VALUE(?,?,?,?)");
		echo $mysqli->error;
		//asendan küsimärgid
		//iga märgikohta tuleb lisada üks täht ehk mis tüüpi muutuja on
		//	s - string
		//	i - int,arv
		//  d - double
		$stmt->bind_param("ssss", $email, $password, $gender, $_POST["birthdate"]);
		
		
		//täida käsku 
		if($stmt->execute() ) {
			echo "õnnests";			
		} else{
			echo "ERROR".$stmterror;
		}
		
	}
	
	function login ($email, $password) {
	
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli ->prepare("
		
					SELECT id, email, password, created, gender, birthdate
					FROM user_sample
					WHERE email = ? 
					
		");	
		echo $mysqli->error;
	
		//asendan ?
		
		$stmt->bind_param("s", $email);
		
		//rea kohta tulba väärtus
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb, $created);
		
		$stmt->execute();
		//ainult SELECT'i puhul
		if($stmt->fetch()) {
			//oli olemas, rida käes
			$hash = hash("sha512", $password);
			
			if ($hash == $passwordFromDb) {
				echo "Kasutaja logis sisse";
			} else {
				echo "Parool vale !";
			}
		
		} else {	
			//ei olnud ühtegi rida
			echo "Sellise e-mailiga ".$email." kasutajat ei ole olemas!";
		}
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	/*
	function hello ($firstname, $lastname) {
		return "Tere tulemast ".$firstname." ".$lastname."!";		
	}

	echo hello ("Tanel","Otsa");
	*/
	
?>