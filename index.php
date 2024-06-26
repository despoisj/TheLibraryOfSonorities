<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(error_reporting(E_ALL ^ E_DEPRECATED));

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

// Note: filter can also be "harmony", "texture", "blog" or nothing

?>

<!DOCTYPE html>
<html lang="en" translate="no">
    <head>
        <meta name="google" content="notranslate" />
        <script async src="https://cdn.ampproject.org/v0.js"></script>
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

   <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SS5BRBTWKH"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-SS5BRBTWKH');
    </script>


    <body>
        <?php
            include "header.html";
            include "navbar.html";
        ?>

        <!-- Blurb for intro page -->
        <?php if ($filter == "") { ?>

            <div class="blurb" style="margin-top: 50px;margin-bottom:80px;">
                <p>Have you ever wondered what makes Chopin sound like Chopin? Or why your improvisation doesn't sound 'Romantic' despite your best efforts?</p>
                <p>The goal of the Library of Sonorities is to document the most interesting sounds found in classical music and help you recognize them by ear so that you can incorporate them in your improvisation. I have chosen to focus mostly on romantic music as it's my favorite, and resources on it are very scarce.</p>
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
                        <a class="navElement" href="index.php?filter=style&style=impressionist">Impressionist</a>
                    </div>
                </div>

            <?php } elseif ($filter == "emotion") { ?>

                <div style="margin-top: 30px; margin-bottom: 50px;">
                    <div style="width: 90%; margin-left: 5%;">
                        <a class="navElement" href="index.php?filter=emotion&emotion=bright">Bright</a>
                        <a class="navElement" href="index.php?filter=emotion&emotion=sad">Sad</a>
                        <a class="navElement" href="index.php?filter=emotion&emotion=dreamy">Dreamy</a>
                        <a class="navElement" href="index.php?filter=emotion&emotion=bittersweet">Bittersweet</a>
                        <a class="navElement" href="index.php?filter=emotion&emotion=triumphant">Triumphant</a>
                        <a class="navElement" href="index.php?filter=emotion&emotion=mystical">Mystical</a>
                    </div>
                </div>

             <?php } ?>


            
            <?php 
                $isHomePage = false;

                // Define title for section
                if ($filter == "element"){
                    // Do nothing, no title
                } elseif ($filter == "composer") {
                    $title = ucfirst($composer);

                    // Special case
                    echo '<h2>';
                    echo $title;
                    echo '</h2>';

                    // Add blurb if we have one
                    $composerBlurb = 'composers/'. $composer .'.php';
                    if (file_exists($composerBlurb)){
                        echo "<div class='blurb' style='margin-top:20px'>";
                        include($composerBlurb);
                        echo "</div>";
                    }
                    
                } elseif ($filter == "emotion") {
                    $title = ucfirst($emotion);

                    // Special case
                    echo '<h2>';
                    echo $title;
                    echo '</h2>';
                } elseif ($filter == "style") {
                    if($style == "classical")
                        $title = "Baroque/Classical";
                    else
                        $title = ucfirst($style);

                    // Special case
                    echo '<h2>';
                    echo $title;
                    echo '</h2>';
                } elseif ($filter == "harmony") {
                    $title = "Harmony";
                } elseif ($filter == "texture") {
                    $title = "Texture";
                } elseif ($filter == "blog") {
                    $title = "Blog";

                    ?>

                    <div class="blurb" style="margin-top:20px">
                        <p>This sections presents musical concepts and resources on a wider range of topics.</p>
                    </div>


                    <?php

                } else {
                    $title = "All sonorities";
                    $isHomePage = true;
                }

                // Display title
                if ($isHomePage){
                    // Special case
                    echo '<h2>';
                    echo $title;
                    echo '</h2>';
                    echo "<i style='opacity:0.5'><small>Last update: " . getLastUpdate() . "</small></i>";
                }


            ?>

        </div>

            

        <!-- CONTENT -->
        <div id="elements" style="margin-top: 50px; margin-bottom:150px">

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
                elseif ($filter == "blog")
                    loadBlog();
                else
                    loadAllElements();
            ?>

        </div>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>


        <!-- Main script -->
        <script src="index.js"></script>    
    </body>
</html>
