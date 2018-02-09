<?php
	//header
	include('header.php');

	$email = $_POST['pseudo'];
	$password = $_POST['pass'];

	//vérifie que les identifiants saisis sont correct
	if(checkid($email,$password)){
		//set les variables globales de l'utilisateur
		$GLOBALS['connected'] = true;
		$GLOBALS['prenom'] = getPrenom($email);
		$GLOBALS['email'] = $email;
		echo 'Bienvenue sur votre compte '.$GLOBALS['prenom'].'!';
	}
	//footer
	include('footer.php');

function checkid($email,$password){
	//connexion à la bdd
	include('bdd.php');

	// lecture du nb d'occurences de l'email
	$stmt = $bdd->prepare('SELECT count(email) FROM user WHERE email="'.$email.'" GROUP BY email LIMIT 1'); 
	$stmt->execute(); 
	$occurence = $stmt->fetch();

	//si il existe deja une occurence de cette adresse mail
	if($occurence[0] != 1){
		echo 'Cette adresse mail n\'est pas enregistrée.';
		return false;
	}

	// lecture du mot de passe correspondant à cette adresse mail
	$stmt = $bdd->prepare('SELECT password FROM user WHERE email = "'.$email.'" LIMIT 1'); 
	$stmt->execute(); 
	$verifpassword = $stmt->fetch();

	// si le mot de passe n'est pas le bpn
	if($verifpassword[0] != hash('sha256', 'swappesecuritysaltcode'.$email.$password.'swappethebestsaltcode')){
		echo 'Le mot de passe saisit n\'est pas bon.';
		return false;
	}
	return true;
}

function getPrenom($email){
	//connexion à la bdd
	include('bdd.php');

	// lecture du prenom en fonction de l'email
	$stmt = $bdd->prepare('SELECT prenom FROM user WHERE email="'.$email.'" GROUP BY email LIMIT 1'); 
	$stmt->execute(); 
	return $stmt->fetch()[0];
}
?>