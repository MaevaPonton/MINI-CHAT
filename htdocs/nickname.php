<?php
// connexion à la base de données via la page connexion.php :
require_once ('connexion.php');


function getUsers() {
        // on précise que l'on doit se servir de la variable bdd qui est à l'extérieur de la fonction
        global $bdd;
        // on requête la BD pour sortir les auteurs des messages et on les affiche :
        $resultats = $bdd -> query ('SELECT author FROM messages ORDER BY author');
        // on traite les résultats : la variable users va aller chercher toutes les lignes de données et va les envoyer sous forme de tableau
        $users = $resultats -> fetchAll();
        // on affiche les données sous forme de JSON :
        echo json_encode($users);
    
}

getUsers();

?>