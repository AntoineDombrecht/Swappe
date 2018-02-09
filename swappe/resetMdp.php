<!DOCTYPE html>
<html>
<body>
<!-- header -->
<?php include('header.php'); ?>

<h3> Mot de passe oublié ? </h3>
<p> Merci de saisir votre adresse email. Nous vous enverrons un email avec un nouveau mot de passe.

  <form method="post" action="cible-resetMdp.php">
    <br />
    <label for="email">Votre e-mail :</label>
    <input type="text" name="email" id="email" />
    
    <br />
    <input type="submit" value="Envoyer" />
</form>

<!-- footer -->
<?php include('footer.php'); ?>

</body>
</html>