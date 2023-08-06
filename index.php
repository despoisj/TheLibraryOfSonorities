<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "tools.php";

// Finding which filter to apply
if (isset($_GET["filter"]))
    $filter = htmlspecialchars($_GET["filter"]);
else
    $filter = "";

if ($filter == "element"){
    $elementName = htmlspecialchars($_GET["element"]);
} elseif ($filter == "composer") {
    $composer = htmlspecialchars($_GET["composer"]);
} elseif ($filter == "style") {
    $style = htmlspecialchars($_GET["style"]);
} elseif ($filter == "emotion") {
    $emotion = htmlspecialchars($_GET["emotion"]);
} 

// Note: filter can also be "harmony", "texture" or nothing

?>

<!DOCTYPE html>
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

        <!-- Blurb for intro page -->
        <?php if ($filter == "") { ?>

            <div style="width:70%; margin-left:auto; margin-right: auto; margin-top: 50px; text-indent: 40px; max-width: 800px;">
            <p>Have you ever wondered what makes Chopin sound like Chopin? Or why your improvisation doesn't sound 'Romantic' despite your best efforts? The Library of Sonorities aims at listing and dissecting some very specific sounds found in classical music so that you can incorporate them in your improvisation.</p>
            <p>Note: The goal of this site is to list a number of 'sonorities', as well as which sonorities are landmarks of a given composer. Even if you can find augmented chords in Bach's works, they aren't a staple of his style.</p>
            </div>

        <?php } ?>


        <div id="titles" style="margin-top: 30px;">


        <!-- Local navbar for composer/style -->
             <?php if ($filter == "composer") { ?>

                <div style="margin-top: 30px; margin-bottom: 50px;">
                    <div style="width: 90%; margin-left: 5%;">
                        <a class="navElement" href="index.php?filter=composer&composer=beethoven">Beethoven</a>
                        <a class="navElement" href="index.php?filter=composer&composer=chopin">Chopin</a>
                        <a class="navElement" href="index.php?filter=composer&composer=scriabin">Scriabin</a>
                        <a class="navElement" href="index.php?filter=composer&composer=rachmaninoff">Rachmaninoff</a>
                    </div>
                </div>

             <?php } elseif ($filter == "style") { ?>

                <div style="margin-top: 30px; margin-bottom: 50px;">
                    <div style="width: 90%; margin-left: 5%;">
                        <a class="navElement" href="index.php?filter=style&style=classical">Baroque/Classical</a>
                        <a class="navElement" href="index.php?filter=style&style=romantic">Romantic</a>
                        <a class="navElement" href="index.php?filter=style&style=impressionism">Impressionism</a>
                    </div>
                </div>

            <?php } elseif ($filter == "emotion") { ?>

                <div style="margin-top: 30px; margin-bottom: 50px;">
                    <div style="width: 90%; margin-left: 5%;">
                        <a class="navElement" href="index.php?filter=emotion&emotion=sad">Sad</a>
                        <a class="navElement" href="index.php?filter=emotion&emotion=happy">Happy</a>
                        <a class="navElement" href="index.php?filter=emotion&emotion=bittersweet">Bitterweet</a>
                        <a class="navElement" href="index.php?filter=emotion&emotion=triumphant">Triumphant</a>
                        <a class="navElement" href="index.php?filter=emotion&emotion=mystical">Mystical</a>
                    </div>
                </div>

             <?php } ?>


            
            <?php 

                // Define title for section
                if ($filter == "element"){
                    $title = "Sonority";
                } elseif ($filter == "composer") {
                    $title = ucfirst($composer);
                } elseif ($filter == "emotion") {
                    $title = ucfirst($emotion);
                } elseif ($filter == "style") {
                    if($style == "classical")
                        $title = "Baroque/Classical";
                    else
                        $title = ucfirst($style);
                } elseif ($filter == "harmony") {
                    $title = "Harmony";
                } elseif ($filter == "texture") {
                    $title = "Texture";
                } else {
                    $title = "All sonorities";
                }

            ?>
            <h2 style="margin-bottom: 30px;"><?php echo $title; ?></h2>

            <?php 
                if ($filter == "")
                    echo "<a href='list.php' style='padding-bottom:40px'>(view as list)</a>";
                    
            ?>
        </div>

            

        <!-- CONTENT -->
        <div id="elements" style="margin-top: 50px;">



            <?php
                if ($filter == "element")
                    loadSingleElement($elementName);
                elseif ($filter == "composer")
                    loadComposer($composer);
                elseif ($filter == "style")
                    loadStyle($style);
                elseif ($filter == "emotion")
                    loadEmotion($emotion);
                elseif ($filter == "harmony" || $filter == "texture")
                    loadType($filter);
                else
                    loadAllElements();
            ?>

        </div>
        

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <!-- Main script -->
        <script src="index.js"></script>    
    </body>
</html>
