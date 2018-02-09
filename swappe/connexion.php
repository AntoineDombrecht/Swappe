<!DOCTYPE html>
<html>
<body>
<!-- header -->
<?php include('header.php'); ?>

<br />
<a href="https://tinyurl.com/yax7qkdb">Se connecter avec Facebook</a>

<br />
<a href="https://tinyurl.com/y7yvp8kr">Se connecter avec Google</a>

<form method="post" action="cible-connexion.php">
   <fieldset>
   	   <legend>Ou</legend>

   	   <br />
       <label for="pseudo">Votre e-mail :</label>
       <input type="text" name="pseudo" id="pseudo" />
       
       <br />
       <label for="pass">Votre mot de passe :</label>
       <input type="password" name="pass" id="pass" />
   </fieldset>
   <a href="resetMdp.php">Réinitialiser le mot de passe</a>
   <br />
       <input type="submit" value="Se connecter" />
</form>

<p>Pas encore de compte ?<a href="inscription.php">S'inscrire</a></p>
<br />


<!-- footer -->
<?php include('footer.php'); ?>

</body>
</html>