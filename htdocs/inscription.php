<?php
// connexion à la base de données via la page connexion.php :
require_once ('connexion.php');
?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>

<body>

    <h1>Informations obligatoires :</h1>

    <form method="post">
    <div class = 'name'>
        <label>Entre ton nom : 
        <input type="text" name="nom"/></label>
    </div>
    <div class = 'prenom'>
        <label>Entre ton prénom : 
        <input type="text" name="prenom"/></label>
    </div>
    <div class = 'futur_pseudo'>
        <label>Entre ton futur pseudo : 
        <input type="text"/></label>
    </div>
    <div class = 'futur_mdp'>
        <label>Entre ton futur mot de passe : 
        <input type="password" name="pass1"/></label>
        <label>Confirme ton mot de passe : 
        <input type="password" name="pass2"/></label>
    </div>
    <div class = 'email'>
        <label>Entre ton adresse e-mail (elle doit être valide pour confirmer ton inscription !) : 
        <input type="text" name="adresse"/></label>
    </div>
    <div class = 'informations'>
        <h2>Informations facultatives :</h2>
        <br><br>
        <div class = 'date_naissance'>
            <label>Quelle est ta date de naissance ?
                <select name="jour">
                    <option value="j1">01</option>
                    <option value="j2">02</option>
                    <option value="j3">03</option>
                    <option value="j4">04</option>
                    <option value="j5">05</option>
                    <option value="j6">06</option>
                    <option value="j7">07</option>
                    <option value="j8">08</option>
                    <option value="j9">09</option>
                    <option value="j10">10</option>
                    <option value="j11">11</option>
                    <option value="j12">12</option>
                    <option value="j13">13</option>
                    <option value="j14">14</option>
                    <option value="j15">15</option>
                    <option value="j16">16</option>
                    <option value="j17">17</option>
                    <option value="j18">18</option>
                    <option value="j19">19</option>
                    <option value="j20">20</option>
                    <option value="j21">21</option>
                    <option value="j22">22</option>
                    <option value="j23">23</option>
                    <option value="j24">24</option>
                    <option value="j25">25</option>
                    <option value="j26">26</option>
                    <option value="j27">27</option>
                    <option value="j28">28</option>
                    <option value="j29">29</option>
                    <option value="j30">30</option>
                    <option value="j31">31</option>
                </select>
            </label>
                <select name="mois">
                    <option value="janvier">Janvier</option>
                    <option value="fevrier">Février</option>
                    <option value="mars">Mars</option>
                    <option value="avril">Avril</option>
                    <option value="mai">Mai</option>
                    <option value="juin">Juin</option>
                    <option value="juillet">Juillet</option>
                    <option value="aout">Août</option>
                    <option value="septembre">Septembre</option>
                    <option value="octobre">Octobre</option>
                    <option value="novembre">Novembre</option>
                    <option value="decembre">Decembre</option>
                </select>
            <input type="text" name="annee"/>
        </div>
        


    <div class = 'validation_inscription'>
        <input type="submit" text="Valider"/>
    </div>
</form>

</body>