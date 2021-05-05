<html>
    <head>
        <link rel="stylesheet" href="./style.css" type="text/css">
        <link rel="icon" href="./images/logo.png">
        <title>Professionels | JetLava</title>
        <meta charset="utf-8" description="" name="">
    </head>
    <body>
        <div id="">
        <header>
            <div class="logoandfavicon">
                <a href="./index.html"><img class="logo" src="./images/logo.png"></a>
            </div>
            <div class="menu">
                <a href="./index.html">Accueil</a>
                <a href="./pros.html">Professionels</a>
                <a href="./rules.html">Règles</a>
                <a href="./register.html">Inscriptions</a>
            </div>
        </header>
            <a href='principale.php?deconnexion=true'><span>Déconnexion</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:login.php");
                   }
                }
                else if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    echo "<br>Bonjour $user, vous êtes connectés";
                }
            ?>
            
        </div>
    </body>
</html>