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


function yt($id, $start = 0) {
	// Display wrapped youtube vieo
	echo '<amp-youtube style="border-radius:10px" layout="responsive" width="560" height="315" data-videoid="' . $id . '" data-param-start="' . $start . '"></amp-youtube>';
}

function tt($title) {
	// Display composer and title (tt)
	echo '<p class="pieceTitle"><b><i>' . $title .'</i></b></p>';
}

