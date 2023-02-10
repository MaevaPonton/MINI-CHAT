<?php
// connexion à la base de données via la page connexion.php :
require_once ('connexion.php');
?>

<form method="post" action="">
    <div class = 'connexion-pseudo'>
        <label>Entre ton pseudo : </label>
        <input type="text"/>
    </div>
    <div class = 'connexion-mdp'>
        <label>Entre ton mot de passe : </label>
        <input type="password"/>
    </div> 
    <div class = 'connexion-bouton'>
        <input type="submit"/>
    </div>
</form>

<a href="inscription.php">Tu n'es pas encore inscrit !? Clique vite ici !</a>

<?php

if(isset($_POST['pseudo']) && isset($_POST['mot_de_passe']))
{
    // On tente de sélectionner une entrée dans la base de données qui y correspond
    $reponse = mysql_query('SELECT*FROM users WHERE pseudo = '.mysql_real_escape_string($_POST['pseudo']).', mot_de_passe = '.mysql_real_escape_string($_POST['mot_de_passe'])) or die(error());
}

function error()
{
    echo 'Error';
} 

?>

<a href="login.php">Accueil</a>