// fonction qui va récupérer le JSON des users et les afficher correctement :

async function getUsers() {
    let response = await fetch('nickname.php');
    let result = await response.json();
    
        // on va transcrire tous les messages JSON en HTML afin qu'ils puissent s'afficher dans le chat 
        const html = result.map(function(user) { // on va donner un modèle , et l'incrémenter avec les données qui seront saisies 
            return `  
            <div class="pseudo">
                <span class = 'user'> ${user.author}</span>
            </div>
            `
        }).join(''); // va permettre de coller tous les éléments du tableau pour en faire une grande phrase
        const users = document.querySelector('.pseudo') // div 'pseudo'
        // dans users, son InnerHTML doit être notre variable HTML
        users.innerHTML = html;
    } 

    

getUsers();