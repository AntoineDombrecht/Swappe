<?php
	$email = $_POST['email'];	

	if(checkemail($email)){
		echo 'Un nouveau mot de passe a été envoyé à '.$email.', veuillez consulter votre boite mail.';
		sendemail($email);
	}
	else{
		echo 'Cette adresse mail est inconnue';
	}



function checkemail($email){
	//connexion à la bdd
	include('bdd.php');

	// lecture du nb d'occurences de l'email
	$stmt = $bdd->prepare('SELECT count(email) FROM user WHERE email="'.$email.'" GROUP BY email LIMIT 1'); 
	$stmt->execute(); 
	$occurence = $stmt->fetch();

	//si il existe deja une occurence de cette adresse mail
	if($occurence[0] == 1){
		return true;
	}
	false;
}


function sendemail($to){

	// le nouveau mdp
	$password =  randomPassword();

	// Le message
	$message = 'Voici votre nouveau mot de passe
	'.$password.'
	Ne le perdez pas cette fois-ci !';

	// Dans le cas où nos lignes comportent plus de 70 caractères, nous les coupons en utilisant wordwrap()
	$message = wordwrap($message, 70, "\r\n");

	// Envoi du mail
	mail($to, 'Swappe:Votre nouveau mot de passe', $message);

	// Changement du mot de passe
	$password = hash('sha256', 'swappesecuritysaltcode'.$to.$password.'swappethebestsaltcode');
	changePasseword($to, $password);
 }

 function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function changePasseword($email, $password){

	//connexion à la bdd
	include('bdd.php');

	// lecture du prenom en fonction de l'email
	$stmt = $bdd->prepare('	UPDATE user
	SET password = "'.$password.'"
	WHERE email= "'.$email.'"
	LIMIT 1'); 
	$stmt->execute(); 
	$result = $stmt->fetch();
}

/*
     // Sujet
     $subject = 'Swappe:Votre nouveau mot de passe';

     // message
     $message = '
     <html>
      <head>
       <title>Swappe:Votre nouveau mot de passe</title>
      </head>
      <body>
       <p>Voici votre nouveau mot de passe </html>

       <html>
        ne le perdez pas cette fois !</p>
      </body>
     </html>
     ';

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     // En-têtes additionnels
     $headers .= 'To: '.$to.' <'.$to."\r\n";
     $headers .= 'From: Swappe <swappe.com@gmail.com>' . "\r\n";

     // Envoi
     mail($to, $subject, $message, $headers);*/
?>