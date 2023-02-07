// fonction qui va récupérer le JSON des messages et les afficher correctement :

function getMessages() {

    // 1e : la fonction doit créer une requête AJAX (objet xmlhttp request) pour se connecter au serveur ( fichier handler.php):
    const requestAjax = new XMLHttpRequest(); // on crée une nouvelle variable
    requestAjax.open("GET", "handler.php"); // quand on va t'envoyer, tu iras en GET sur le fichier handler.php

    // 2e : quand elle reçoit les données, elle doit les traiter en exploitant le JSON et afficher les données au format HTML :

    requestAjax.onload = function() { // quand tu auras changé la réponse du serveur, je veux que tu mettes dans une variable résultat la possibilité de voir ce que le serveur a répondu
     /* console.log(requestAjax.responseText); */
     
         const result = JSON.parse(requestAjax.responseText);
        // on va transcrire tous les messages JSON en HTML afin qu'ils puissent s'afficher dans le chat 
        const html = result.reverse().map(function(message) { // on va donner un modèle , et l'incrémenter avec les données qui seront saisies et on va inverser le tableau pour avoir les derniers messages saisis en bas :
            console.log(message.id);
            return `  
            <div class = 'message'>
            <span class = 'date'> ${message.created_at.substring(11,16)} </span> 
            <span class = 'author'> ${message.author} </span>
            <span class = 'content'> ${message.content}</span>
            </div>
            `
        }).join(''); // va permettre de coller tous les éléments du tableau pour en faire une grande phrase
       
        // je vais créer une nouvelle variable message :
        const messages = document.querySelector('.messages') // div 'messages'
        // dans messages, son InnerHTML doit être notre variable HTML
        messages.innerHTML = html;
        // on va faire en sorte que la scrollbarre descende directement quand il y a un message saisi , la hauteur de mon curseur sera à hauteur de ma barre de défilement :
        messages.scrollTop = messages.scrollHeight; 
    } 


    // 3e : on peut envoyer la requête :
    requestAjax.send();
}


// fonction qui va envoyer le nouveau message au serveur et rafraichir les messages :

function postMessage(event) {

    // elle doit stopper le submit du formulaire 
    event.preventDefault();

    // elle doit récupérer les données du formulaire pour les traiter 
    const author = document.querySelector('#author');
    const content = document.querySelector('#content');
    // elle doit conditionner les données, je crée un ensemble de données, et j'ajoute une donnée qui va s'appeler author et qui va contenir mon champ author :
    const data = new FormData();
    data.append('author', author.value);
    data.append('content', content.value);
    // elle doit configurer une requête AJAX en POST et envoyer les données
    const requestAjax = new XMLHttpRequest();
    requestAjax.open('POST','handler.php?task=write') // on envoie cette requête AJAX en POST vers handler.php mais avec la tâche wxrite car je ne veux pas recevoir mais envoyer des messages
    requestAjax.onload = function() {// quand tu as fini, je veux que tu réaffiches les messages
        content.value = '';
        content.focus() // pour la souris
        getMessages();
    }
    requestAjax.send(data); 

}

// on va lier cette dernière fonction à la soumission du formulaire :
document.querySelector('form').addEventListener('submit',postMessage); // je prends mon formulaire et j'ajoute un écouteur d'évènements sur l'évènement submit tu vas appeler la fonction postMessage 