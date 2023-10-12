<?php
include 'library.php';

function loadElement($element, $display) {
	// Loads a singular element

	if ($display)
		echo '<div class="element">';
	else
		echo '<div onclick=\'location.href="index.php?filter=element&element=' . $element["pageName"] . '"\' class="element elementSmall" style="cursor: pointer; background-image: url(\'imgs/backgrounds/opa.png\'), url(\'imgs/backgrounds/opa.png\'), url(\'imgs/backgrounds/'. $element["pageName"] .'.jpg\');">';

		// Test to differentiate romantic / baroque etc. 
		// echo "<div class='styleElementWrapper'>";

		// 	foreach($element["styles"] as $style){
		// 		if ($style == "romantic")
		// 			echo '<div class="styleElement"><a href="index.php?filter=style&style=romantic" style="text-decoration:none">🌹</a></div>';
		// 		elseif ($style == "classical")
		// 			echo '<div class="styleElement"><a href="index.php?filter=style&style=classical" style="text-decoration:none">🕰</a></div>';
		// 		elseif ($style == "impressionism")
		// 			echo '<div class="styleElement"><a href="index.php?filter=style&style=impressionism" style="text-decoration:none">🖼️</a></div>';
		// 	}
		// echo "</div>";

		// Setup title link
		if (!$display){
			echo '<h2 class="elementTitle"><a style="color:white; text-decoration:none" href="index.php?filter=element&element=' . $element["pageName"] . '">' . $element["title"] . "</a></h4>";
		}

		// Possibility to collapse or not by default
		if ($display){

			echo '<div class="illustration" style="background-image: url(\'imgs/backgrounds/opa.png\'),  url(\'imgs/backgrounds/opa.png\'), url(\'imgs/backgrounds/' . $element["pageName"]. '.jpg\');" />';

			// Title
			echo '<h2 class="elementTitleFull"><a style="color:white; text-decoration:none" href="index.php?filter=element&element=' . $element["pageName"] . '">' . $element["title"] . "</a></h4>";

			echo '</div>';


			echo '<div class="elementContents">';
			
			// Finally include the bulk of the page!
			include "elements/".$element["pageName"].".php";

			echo '</div>';
		}

		// Tags
		echo "<div class='tagBox'>";
			foreach ($element["styles"] as $style) {
				echo "<i><a class='tag' href='index.php?filter=style&style=" . $style . "'>" . ucfirst($style) . "</a></i>, ";
			}
			foreach ($element["composers"] as $composer) {
				echo "<i><a class='tag' href='index.php?filter=composer&composer=" . $composer . "'>" . ucfirst($composer) . "</a></i>, ";
			}
			foreach ($element["emotions"] as $emotion) {
				echo "<i><a class='tag' href='index.php?filter=emotion&emotion=" . $emotion . "'>" . ucfirst($emotion) . "</a></i>, ";
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

function listElements() {
	global $library;
	// Lists all elements in compact form
	foreach ($library as $element) {
		$emoji = "";
		if (in_array("romantic", $element["styles"]))
			$emoji = $emoji . '<a href="index.php?filter=style&style=romantic" style="text-decoration:none">🌹</a>';
		if (in_array("classical", $element["styles"]))
			$emoji = $emoji . '<a href="index.php?filter=style&style=classical" style="text-decoration:none">🕰️</a>';
		if (in_array("impressionism", $element["styles"]))
			$emoji = $emoji . '<a href="index.php?filter=style&style=impressionism" style="text-decoration:none">🖼️</a>';
		
		echo "<div><a href='index.php?filter=element&element=" . $element["pageName"] . "'>" . $element["title"] . "</a> " . $emoji . "</div>";
	}
}



function yt($id, $start = 0) {
	// Display wrapped youtube vieo
	echo '<amp-youtube layout="responsive" width="560" height="315" data-videoid="' . $id . '" data-param-start="' . $start . '"></amp-youtube>';
}

function tt($title) {
	// Display composer and title (tt)
	echo '<p class="pieceTitle"><b><i>' . $title .'</i></b></p>';
}



