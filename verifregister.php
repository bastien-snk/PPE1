<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // Déclaration des informations de connexion
    $db_username = 'root';
    $db_password = '';
    $db_name     = 'jetlava';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('Connexion à la base de données impossible');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
	$requete = "INSERT INTO table (nom_utilisateur, mot_de_passe) VALUES ('".$username."' ,'".$password."')";
	if (strlen($_POST["password"]) < 6)
    {
        echo('Mot de passe pas assez sécurisé');
    }
    
    if (mysqli_query($db,$requete))
	{
	}
	
	
	
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM utilisateur where 
              nom_utilisateur = '".$username."' and mot_de_passe = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // Si nom d'utilisateur et mot de passe sont bons alors redirection vers la page principale
        {
           $_SESSION['username'] = $username;
           header('Location: principale.php');
        }
        else // Sinon erreur
        {
           header('Location: login.php?erreur=1'); // Utilisateur ou MDP incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // Utilisateur ou MDP vide
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db); // Arrêter la connexion avec la BDD
?>