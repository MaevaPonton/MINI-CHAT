

// fonction qui va récupérer le JSON des messages et les afficher correctement :

async function getMessages() {
    let response = await fetch('handler.php');
    let result = await response.json();
    
        // on va transcrire tous les messages JSON en HTML afin qu'ils puissent s'afficher dans le chat 
        const html = result.reverse().map(function(message) { // on va donner un modèle , et l'incrémenter avec les données qui seront saisies et on va inverser le tableau pour avoir les derniers messages saisis en bas :
            return `  
            <div class = 'message'>
            <span class = 'author'> ${message.created_ad.substring(11,16)} </span>
            <span class = 'author'> ${message.author} </span>
            <span class = 'content'> ${message.content}</span>
            </div>
            `
        }).join(''); // va permettre de coller tous les éléments du tableau pour en faire une grande phrase
       
        const messages = document.querySelector('.messages') // div 'messages'
        // dans messages, son InnerHTML doit être notre variable HTML
        messages.innerHTML = html;
        // on va faire en sorte que la scrollbarre descende directement quand il y a un message saisi , la hauteur de mon curseur sera à hauteur de ma barre de défilement :
        messages.scrollTop = messages.scrollHeight; 
    } 



// fonction qui va envoyer le nouveau message au serveur et rafraichir les messages :

async function postMessage(event) {

    // elle doit stopper le submit du formulaire , éviter que le formulaire réinitialise la page
    event.preventDefault();
    

    // elle doit récupérer les données du formulaire pour les traiter 
    const author = document.querySelector('#author');
    const content = document.querySelector('#content');

    // elle doit conditionner les données, je crée un ensemble de données, et j'ajoute une donnée qui va s'appeler author et qui va contenir mon champ author :
    const data = new FormData();
    data.append('author', author.value);
    data.append('content', content.value); 
   

    // elle doit configurer une requête AJAX en POST et envoyer les données

   fetch('handler.php?task=write', {
        method: 'post',
        body: data,
    }).then(getMessages());
    

        return content.value = '';
       /*  return content.focus();
        getMessages();  */

}

getMessages();  
// on va lier cette dernière fonction à la soumission du formulaire :

document.querySelector('form').addEventListener('submit',postMessage); // je prends mon formulaire et j'ajoute un écouteur d'évènements sur l'évènement submit tu vas appeler la fonction postMessage 



// on va faire une intervalle qui demande le rafraichissement des messages toutes les 3 secondes et qui donne l'illusion du temps réel :

const interval = window.setInterval(getMessages, 1000); // je demande à mon navigateur de créer une intervalle où je vais appeler getMessages toutes les 3000 millisecondes



// je veux que dès le chargement de la page, on appelle getMessages pour supprimer le temps de chargement de 3 secondes à l'ouverture de la page


