<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Annot'TonImage</title>
</head>
<body>
    <!-- Header -->
        <header>
            <nav class="navbar navbar-ppl">
                <div class="container">
                    <a class="navbar-brand" href="#">
                    <img src="image/logoannot.png" width="120" height="60">
                    </a>
                    <div class="btn-home">
                        <a href="index.php?module=accueil">
                            <img src="image/home.png" height="40">
                        </a>
                    </div>
                    <div class="informations">
                        <a href="#">
                            <img src="image/informations.png" height="25">
                        </a>
                    </div>
                </div>
            </nav>
        </header>

<?php

    if (isset($_GET["module"])){
        $module = $_GET["module"];
    }
    else{
        $module = "accueil";
    }

    switch ($module) {
        case 'annotation':
        case 'decouvrir':
        case 'accueil':
            include_once "Modules/mod_$module/mod_$module.php";
            break;
        default:
            die("interdiction");
    }

    if (isset($module)) {
        $nom_class = "Mod" . $module;
        $mod = new $nom_class();
    }



?>

 <!-- Footer -->
    <footer>
        <div class="img-footer">
            <img src="image/logoannot.png" alt="" width="177px" height="90px">
        </div>
        <div class="liens-utiles">
            <ul>
                <li><a href="#">À propos de nous</a></li>
                <li><a href="#">Conditions d'utilisations</a></li>
                <li><a href="#">Mentions Légales</a></li>
                <li><a href="#">Politique de confidentialité</a></li>
            </ul>
        </div>
        <div class="copyright">
            <p>MyWatch © Copyright 2020, Tous droits réservés.</p>
        </div>
    </footer>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>
