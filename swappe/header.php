<!-- directories -->
<?php include_once 'directories.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/map.css">
        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Swappe</title>
    </head>

    <body>
        <!-- LE BANDEAU -->
        <a href="main.php"><img src="<?php echo $imgpath; ?>logo.png" alt="logo" height="60" width="60"></a>
        <h1> SWAPPE </h1>
        <p> Tu viens pour <strong>échanger</strong> ? Tu es au bon endroit ! <p>
        <ul>
            <!-- LE SITE VITRINE -->
            <li><a href="kesako.php">Comment ça marche ? </a></li>
            <!-- LA CONNECTION -->
            <li><a href="connexion.php">Se connecter </a></li>
            <!-- L'INSCRIPTION -->
            <li><a href="inscription.php">S'inscrire ? </a></li>
            <!-- CHANGER LA LANGUE -->
            <li>
                <label for="menu_destination_liste">Langue</label> 
                <select name="menu_destination" id="menu_destination_liste"> 
                <option value="français">Français</option> 
                 <option value="chinois">Chinois</option> 
                 <option value="arabe">Arabe</option>
                </select>
                </li>
        </ul>
    </body>
</html>