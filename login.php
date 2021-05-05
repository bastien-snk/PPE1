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
                <a href="./login.php">Connexions</a>
            </div>
        </header>
        <div id="container">
            <!-- zone de connexion -->
        <section class="maintext">
            <form action="verification.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Pseudo</b></label>
                <input type="text" placeholder="Entrez le nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrez le mot de passe" name="password" required>

                <input type="submit" class="button" value="Connexion">
            </form>
        </section>
		</div>
		        <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect !</p>";
                }
                ?>
    </body>
    <footer>
        <a href="./copyrights.html">Copyright - JetLava - 2019</a>
    </footer>
</html>