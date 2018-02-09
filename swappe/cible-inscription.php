
<!DOCTYPE html>
<html>
<body>
<!-- header -->
<?php include('header.php'); ?>

<!-- inscription -->
<?php
// récupération des données
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = $_POST['email'];
$password = $_POST['pass'];

//echo cgu[0];

//vérifications préalables
//du mot de passe
if(checkprenom($prenom) && checkemail($email) && checkPassword($password) && checkbox(isset($_POST['cgu'])))
{
	//connexion à la bdd
	include('bdd.php');

	// écriture dans la bdd
	$req = $bdd->prepare('INSERT INTO user(prenom, nom, email, password) VALUES(:prenom, :nom, :email, :password)');

	$req->execute(array(
		'prenom' => $prenom,
		'nom' => $nom,
		'email' => $email,
		'password' => hash('sha256', 'swappesecuritysaltcode'.$email.$password.'swappethebestsaltcode')
		));

	echo 'Votre compte a bien été créé !';
}

// function check password
function checkPassword($pwd) {

    if (strlen($pwd) < 8) {
        echo 'Votre mot de passe trop court ! (8 charactères au minimum';
        return false;
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        echo 'Votre mot de passe doit contenir au moins un chiffre'; 
        return false;
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        echo 'Votre mot de passe doit contenir au moins une lettre !';
        return false;
    }     

    return true;
}

function checkprenom($prenom){
	if (strlen($prenom) == 0) {
		echo 'Vous devez entrer un prénom.';
		return false;
	}
	return true;
}

function checkemail($email){
	if (strlen($email) == 0) {
		echo 'Vous devez entrer une adresse email.';
		return false;
	}

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    echo "Cette adresse email n'est pas valide.";
	    return false;
	}

	// compter le nb occurences de l'email dans la base de donnée
	//connexion à la bdd
	include('bdd.php');

	// lecture de la bdd
	$stmt = $bdd->prepare('SELECT count(email) FROM user WHERE email="'.$email.'" GROUP BY email LIMIT 1'); 
	$stmt->execute(); 
	$occurence = $stmt->fetch();

	//si il existe deja une occurence de cette adresse mail
	if($occurence[0] == 1){
		echo 'Cette adresse mail est déjà enregistrée.';
		return false;
	}

	return true;
}

function checkbox($verif){
	if(!$verif){
		echo 'Vous devez accepter les conditions générales d\'utilisation pour vous inscrire.';
		return false;
	}
	return true;
}
	// footer
	include('footer.php');
?>

</body>
</html>