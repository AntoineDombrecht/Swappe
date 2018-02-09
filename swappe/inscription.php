<!DOCTYPE html>
<html>
<body>
<!-- header -->
<?php include('header.php'); ?>

<br />
<a href="https://tinyurl.com/y8aowzk7">S'inscrire avec Facebook</a>

<br />
<a href="https://tinyurl.com/y7yvp8kr">S'inscrire avec Google</a>

<form method="post" action="cible-inscription.php">
   <fieldset>
       <legend>Ou avec votre email </legend> 
       <br />
 
       <label for="prenom">Quel est votre prénom ?</label>
       <input type="prenom" name="prenom" id="prenom" />
       <br />

       <label for="nom">Quel est votre nom ?</label>
       <input type="nom" name="nom" id="nom" />
       <br />

       <label for="email">Quel est votre Email</label>
       <input type="email" name="email" id="email" />

       <br />
       <label for="pass">Quel est votre mot de passe ?</label>
       <input type="password" name="pass" id="pass" />

       <br />
       <input type="checkbox" name="cgu" id="cgu">En créant un compte, j'accepte les <a href="cgu.html"> Conditions Générales d'Utilisation </a>
   </fieldset>

   <br />
   <input type="submit" value="S'inscrire" />
</form>

 <br />
 <p>Vous avez déjà un compte ? <a href="connexion.php">Se connecter</a></p>




<!-- footer -->
<?php include('footer.php'); ?>
</body>
</html>