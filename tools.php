<?php
include 'library.php';

function loadElement($element, $fullSize) {
	// Loads a singular element

	if ($fullSize)
		echo '<div class="element">';
	else
		echo '<div onclick=\'location.href="index.php?filter=element&element=' . $element["pageName"] . '"\' class="element elementSmall" style="cursor: pointer; background-image: url(\'imgs/backgrounds/opa.png\'), url(\'imgs/backgrounds/opa.png\'), url(\'imgs/backgrounds/'. $element["pageName"] .'.jpg\');">';

		// Setup title link
		if (!$fullSize){
			echo '<h2 class="elementTitle"><span class="elementTitleLink">' . $element["title"] . "</span></h4>";
		}

		// Illustration
		if ($fullSize){

			echo '<div class="illustration" style="background-image: url(\'imgs/backgrounds/opa.png\'),  url(\'imgs/backgrounds/opa.png\'), url(\'imgs/backgrounds/' . $element["pageName"]. '.jpg\');" />';

				// Title
				echo '<h2 class="elementTitleFull"><span class="elementTitleLink">' . $element["title"] . "</span></h2>";



			echo '</div>';


			echo '<div class="elementContents">';
			
			// Finally include the bulk of the page!
			include "elements/".$element["pageName"].".php";

			echo '</div>';
		}


		// Liss all tags. To avoid trailing commas, first we get all elements, then echo them.
		$tags = [];
		foreach ($element["styles"] as $style) {
			array_push($tags, "<i><a class='tag' href='index.php?filter=style&style=" . $style . "'>" . ucfirst($style) . "</a></i>");
		}
		foreach ($element["composers"] as $composer) {
			array_push($tags, "<i><a class='tag' href='index.php?filter=composer&composer=" . $composer . "'>" . ucfirst($composer) . "</a></i>");
		}
		foreach ($element["emotions"] as $emotion) {
			array_push($tags, "<i><a class='tag' href='index.php?filter=emotion&emotion=" . $emotion . "'>" . ucfirst($emotion) . "</a></i>");
		}

		// Only if tags has elements or fullsize for buffer margin
		if (count($tags) > 0 || $fullSize){
			// Add tags
			echo "<div class='tagBox'>";
				
				// Echo tags
				for ($i=0; $i < count($tags); $i++) {
					echo $tags[$i];
				  if ($i < count($tags) - 1) {
				  	// Add trailing comma
				  	echo ", ";
				  }
				}
			echo "</div>";
		}

	echo "</div>";
}

function loadAllElements() {
	global $library;
	foreach ($library as $element) {
		loadElement($element, False);
	}

	# Add misc elements too
	echo '<div id="misc" style="margin-top: 100px; margin-bottom:150px">';
 		echo '<h2>Additional elements</h2>';
  		echo '<div class="blurb" style="margin-top:20px; margin-bottom:40px">';
  		echo '<p>These are additional elements and techniques that may not be entirely defined by their sonority, yet can be helpful for improvisation.</p>';
  	echo '</div>';
  
  	loadMisc();

  echo '</div>';


	// Comments using uuid
	addComments("mainPage");
}

function loadStyle($style) {
	global $library;
	foreach ($library as $element) {
		foreach ($element["styles"] as $currStyle){
			if ($currStyle == $style){
				loadElement($element, False);
			}
		}
	}

	// Comments using uuid
	addComments("style_" . $style);
}

function loadComposer($composer) {
	global $library;
	foreach ($library as $element) {
		foreach ($element["composers"] as $currComposer){
			if ($currComposer == $composer){
				loadElement($element, False);
			}
		}
	}

	// Comments using uuid
	addComments("composer_" . $composer);
}

function loadEmotion($emotion) {
	global $library;
	foreach ($library as $element) {
		foreach ($element["emotions"] as $currEmotion){
			if ($currEmotion == $emotion){
				loadElement($element, False);
			}
		}
	}

	// Comments using uuid
	// No comments for emotions at the moment
}

function loadType($type) {
	global $library;
	foreach ($library as $element) {
		if ($element["type"] == $type){
			loadElement($element, False);
		}
	}

	// Comments using uuid
	// No comments for harmony / texture at the moment
	addComments("type_" . $type);
}

function loadMisc() {
	// Loads all additional misc elements
	global $library_misc;
	foreach ($library_misc as $element) {
		loadElement($element, False);
	}
}


function linkSingleElement($elementName) {
	// Links to single elemnt either from library or misc
	// Displays the rectangle with name etc.
	global $library, $library_misc;
	foreach ($library as $element) {
		if ($element["pageName"] == $elementName){
			loadElement($element, False); // Uncollapse
		}
	}

	foreach ($library_misc as $element) {
		if ($element["pageName"] == $elementName){
			loadElement($element, False); // Uncollapse
		}
	}
}

function loadSingleElement($elementName) {
	// Load single elemnt either from library or misc
	global $library, $library_misc;
	foreach ($library as $element) {
		if ($element["pageName"] == $elementName){
			loadElement($element, True); // Uncollapse
		}
	}

	foreach ($library_misc as $element) {
		if ($element["pageName"] == $elementName){
			loadElement($element, True); // Uncollapse
		}
	}

	// Comments using uuid
	addComments("element_" . $elementName);
}


function yt($id, $start = 0, $defaultYT = false) {
	// AMP Seems to bug with Safari sometimes, so in case, use default youtube
	if ($defaultYT) {
		echo '<iframe style="border-radius:10px" width="560" height="315" src="https://www.youtube.com/embed/'. $id .'?start='. $start .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
	} else {
		// Display wrapped youtube vieo
		echo '<amp-youtube style="border-radius:10px" layout="responsive" width="560" height="315" data-videoid="' . $id . '" data-param-start="' . $start . '"></amp-youtube>';
	}
}

function tt($title) {
	// Display composer and title (tt)
	echo '<p class="pieceTitle"><b><i>' . $title .'</i></b></p>';
}

function fl($link) {
	// Flat.io embed
	echo '<iframe style="width:100%; border-radius:10px" src="https://flat.io/embed/'. $link .'" height="315" width="560" frameBorder="0" allowfullscreen allow="autoplay; midi"></iframe>';
}

function addComments($uniqueID){
	// Adds disqus comments for the page
	echo "
	<div id='disqus_thread'></div>
	<script>
	    var disqus_config = function () {
	    	this.page.url = 'https://thelibraryofsonorities.com/" . $uniqueID. ".html';
	    	this.page.identifier = '" . $uniqueID. "_0';
	    	// See https://github.com/disqus/disqus-react/issues/83

	    	this.page.title = 'title_" . $uniqueID. "';
	    };
	    (function() { 

		    // DON'T EDIT BELOW THIS LINE
		    var d = document, s = d.createElement('script');
		    s.src = 'https://thelibraryofsonorities.disqus.com/embed.js';
		    s.setAttribute('data-timestamp', +new Date());
		    (d.head || d.body).appendChild(s);
	    })();
	</script>
	<noscript>Please enable JavaScript to view the <a href='https://disqus.com/?ref_noscript'>comments powered by Disqus.</a>
	</noscript>";
}


function getLastUpdate(){
	// Scans all files to find latest modification
	$files = getDirContents(".");

	$lastFiletime = 0;
	foreach ($files as $file) {
		$currFileTime = filemtime($file);
		if ($currFileTime > $lastFiletime){
			// New last update found, change
			$lastFiletime = $currFileTime;
		}
	}

	return date("F d, Y", $lastFiletime);
}

function getDirContents($dir, &$results = array()) {
	// List all files for check date last update
	// Modified to ignore "." dirs for git etc.
    $files = scandir($dir);

    foreach ($files as $key => $value) {
    		if (substr($value, 0, 1) === "."){
    			continue;
    		}

        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[] = $path;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}




function isSafari() { 
  $u_agent = $_SERVER['HTTP_USER_AGENT'];

  // Next get the name of the useragent yes seperately and for good reason
  if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)){
    $bname = 'Internet Explorer';
    $ub = "MSIE";
    return false;
  } elseif(preg_match('/Firefox/i',$u_agent)){
    $bname = 'Mozilla Firefox';
    $ub = "Firefox";
    return false;
  } elseif(preg_match('/OPR/i',$u_agent)){
    $bname = 'Opera';
    $ub = "Opera";
    return false;
  } elseif(preg_match('/Chrome/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
    $bname = 'Google Chrome';
    $ub = "Chrome";
    return false;
  } elseif(preg_match('/Safari/i',$u_agent) && !preg_match('/Edge/i',$u_agent)){
    $bname = 'Apple Safari';
    $ub = "Safari";
    return true;
  } elseif(preg_match('/Netscape/i',$u_agent)){
    $bname = 'Netscape';
    $ub = "Netscape";
    return false;
  } elseif(preg_match('/Edge/i',$u_agent)){
    $bname = 'Edge';
    $ub = "Edge";
    return false;
  } elseif(preg_match('/Trident/i',$u_agent)){
    $bname = 'Internet Explorer';
    $ub = "MSIE";
    return false;
  }

} 