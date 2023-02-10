<?php
// connexion à la base de données via la page connexion.php :
require_once ('connexion.php');
?>


<?php

// 1e étape : analyser la demande faite à l'URL  (GET) pour déterminer si on souhaite récupérer ou écrire un message :


    // on a deux tâches : un tâche de restitution des messages et une tâche de sauvegarde des messages :

    $task = 'list';

    if(array_key_exists('task',$_GET)) {    // si dans mon tableau GET j'ai une clé qui s'appelle task
        $task = $_GET['task']; // si on me précise une autre task, alors tu prends dans le GET la task demandée
    }

    // si on a pas de valeurs dans le GET, alors la valeur par défaut sera list

     if ($task == "write") { 
        postMessage();
    } else {
        getMessages();
    } 

  


    // 2e étape : on crée un fonction qui va nous permettre de récupérer les données :

    function getMessages() {
        // on précise que l'on doit se servir de la variable bdd qui est à l'extérieur de la fonction
        global $bdd;
        // on requête la BD pour sortir les 20 derniers messages et on les affiche par date ordre décroissant :
        $resultats = $bdd -> query ("SELECT * FROM messages ORDER BY created_ad DESC LIMIT 20");
        // on traite les résultats : la variable messages va aller chercher toutes les lignes de données et va les envoyer sous forme de tableau
        $messages = $resultats -> fetchAll();
        // on affiche les données sous forme de JSON :
        echo json_encode($messages);
    
    }

    // on veut écrire les messages, il faut analyser les paramètres envoyés en POST et les sauver dans la BD :

    function postMessage() {
        // on précise que l'on doit se servir de la variable bdd qui est à l'extérieur de la fonction
        global $bdd; 
        // analyser les paramètres passés en POST (author et content), si les clés author et content n'existent pas dans POST, alors j'affiche un tableau d'erreur :
        if(!array_key_exists('author', $_POST) || !array_key_exists('content', $_POST)) {
            echo json_encode (['status' => 'error', 'message' => 'one field or many have not been sent']);
            return;
        }

        $author = $_POST['author'];
        $content = $_POST['content'];

        // créer une requête qui va permettre d'insérer ces données et l'exécuter :
        $query = $bdd -> prepare("INSERT INTO messages SET author = :author, content = :content, created_ad = NOW()");
        $query -> execute([
            "author" => $author,
            "content" => $content
        ]);
        // donner un statut de succès ou erreur au format JSON
        echo json_encode(['status'=> 'success']);
    }

   

    ?>



