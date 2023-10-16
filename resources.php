<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "tools.php";

?>

<!DOCTYPE html>
<html translate="no">
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library of Sonorities</title>
    <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@200;300&family=REM:wght@200;400&display=swap" rel="stylesheet"> 

    </head>


    <body>
        <?php
            include "header.html";
            include "navbar.html";
        ?>

        <div style="width:70%; margin-left:auto; margin-right: auto; margin-top: 50px; text-indent: 40px; max-width: 800px; margin-bottom: 80px;">
            <h2 style="margin-top:50px; margin-bottom: 30px;">Resources</h2>

            <p>Here are a couple of resources I find very interesting for improvisation & music theory:</p>
            <br><br>
            
            The incredible lessons from <a target="_blank" href="https://www.youtube.com/@SethMonahan">Seth Monahan</a><br><br>
            The invaluable compilations from John A. Rice aka <a target="_blank" href="https://www.youtube.com/@settecentista8469">Settecentista</a><br><br>
            All the videos, lessons, courses and books from <a target="_blank" href="https://www.youtube.com/@cedarvillemusic">John Mortensen</a> including <a target="_blank" href="http://improvplanet.thinkific.com">ImprovPlanet</a><br><br>
            Content from Derek Remeš, especially his <a target="_blank" href="https://derekremes.com/wp-content/uploads/compendium_english.pdf">Compendium</a><br><br>
            Improvisation videos from Michael Koch aka <a target="_blank" href="https://www.youtube.com/@en-blanc-et-noir">EnBlancEtNoir</a><br><br>
            Videos from <a target="_blank" href="https://www.youtube.com/@NahreSol">Nahre Sol</a><br><br>
            Interviews by <a target="_blank" href="https://www.youtube.com/@NikhilHoganShow">Nikhil Hogan</a><br><br>

            
            Historical videos from <a target="_blank" href="https://www.youtube.com/@EarlyMusicSources">Early Music Sources</a><br><br>

        </div>

        <!-- Not sure why but this works for opacity -->
        <div style="height:1px"></div>

        

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <!-- Main script -->
        <script src="index.js"></script>    
    </body>
</html>
