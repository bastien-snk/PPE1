<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./style.css" type="text/css">
        <title>Inscriptions | JetLava</title>
        <link rel="icon" href="./images/logo.png">
        <meta charset="utf-8" description="" name="">
    </head>
    <body>
        <header>
            <div class="logoandfavicon">
                <a href="./index.html"><img class="logo" src="./images/logo.png"></a>
            </div>
            <div class="menu">
                <a href="./index.html">Accueil</a>
                <a href="./pros.html">Professionels</a>
                <a href="./rules.html">Règles</a>
                <a href="./register.php">Inscriptions</a>
                <a href="./login.php">Connexions</a>
            </div>
        </header>
        <section class="maintext">
            <h1><u>Inscription à JetLava 2019 !</u></h1>
            <br>
            <div class="divider div-transparent div-arrow-down"></div>
            <br>
    <form method="post" action="">
        <p>Pseudo</p>
        <input type="text" name="pseudo" class="inputinscription" required autocapitalize minlength="4" placeholder="Pseudo">
        <p>email</p>
        <input type="email" name="email" class="inputinscription" required autocapitalize minlength="4" placeholder="e-Mail">
        <p>Password</p>
        <input type="password" name="password" class="inputinscription" required autocapitalize minlength="4" placeholder="Mot de passe">
        <p>Répetez votre password</p>
        <input type="password" name="repeatpassword" class="inputinscription" required autocapitalize minlength="4" placeholder="Répétez le mot de passe"><br><br>
        <input type="submit" name="submit" class="button" value="Valider">
      
    </form>
  
<?php
      
if (isset($_POST['submit']))
{
   /* on test si les champ sont bien remplis */
    if(!empty($_POST['pseudo']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['repeatpassword']))
    {
        /* on test si le mdp contient bien au moins 6 caractère */
        if (strlen($_POST['password'])>=6)
        {
            /* on test si les deux mdp sont bien identique */
            if ($_POST['password']==$_POST['repeatpassword'])
            {
                // On crypte le mot de passe
                $_POST['password']= md5($_POST['password']);
                // on se connecte à MySQL et on sélectionne la base
                $c = new mysqli("localhost","root","","jetlava");
                //On créé la requête
                $sql = "INSERT INTO utilisateur VALUES (NULL,'".$_POST['pseudo']."','".$_POST['password']."','".$_POST['email']."')";
                // INSERT INTO utilisateur (nom_utilisateur, mot_de_passe, email) VALUES (NULL,".$_POST['pseudo']."','".$_POST['password']."','".$_POST['email']."')";
                 
                /* execute et affiche l'erreur mysql si elle se produit */
                if(!$c->query($sql))
                {
                    printf("Message d'erreur : %s\n", $c->error);
                }
            // on ferme la connexion
            mysqli_close($c);
            }
            else echo "Les mots de passe ne sont pas identiques";
        }
        else echo "Le mot de passe est trop court !";
    }
    else echo "Veuillez saisir tous les champs !";
}
?>
</body>
</html>