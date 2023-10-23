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
			echo '<h2 class="elementTitle"><a class="elementTitleLink" href="index.php?filter=element&element=' . $element["pageName"] . '">' . $element["title"] . "</a></h4>";
		}

		// Possibility to collapse or not by default
		if ($fullSize){

			echo '<div class="illustration" style="background-image: url(\'imgs/backgrounds/opa.png\'),  url(\'imgs/backgrounds/opa.png\'), url(\'imgs/backgrounds/' . $element["pageName"]. '.jpg\');" />';

				// Title
				echo '<h2 class="elementTitleFull"><a  class="elementTitleLink" href="index.php?filter=element&element=' . $element["pageName"] . '">' . $element["title"] . "</a></h2>";

			echo '</div>';


			echo '<div class="elementContents">';
			
			// Finally include the bulk of the page!
			include "elements/".$element["pageName"].".php";

			echo '</div>';
		}

		// Tags
		echo "<div class='tagBox'>";
			// To avoid trailing commas, first get all elements, then echo them.
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
			// Echo tags
			for ($i=0; $i < count($tags); $i++) {
				echo $tags[$i];
			  if ($i < count($tags) - 1) {
			  	// Add trailing comma
			  	echo ", ";
			  }
			}
		echo "</div>";

	echo "</div>";
}

function loadAllElements() {
	global $library;
	foreach ($library as $element) {
		loadElement($element, False);
	}
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
}

function loadType($type) {
	global $library;
	foreach ($library as $element) {
		if ($element["type"] == $type){
			loadElement($element, False);
		}
	}
}

function loadSingleElement($elementName) {
	global $library;
	foreach ($library as $element) {
		if ($element["pageName"] == $elementName){
			loadElement($element, True); // Uncollapse
		}
	}
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