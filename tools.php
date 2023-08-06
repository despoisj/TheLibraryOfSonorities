<?php
include 'library.php';

function loadElement($element, $display) {
	// Loads a singular element

	echo '<div class="element">';

		// Test to differentiate romantic / baroque etc. 
		echo "<div class='styleElementWrapper'>";

			foreach($element["styles"] as $style){
				if ($style == "romantic")
					echo '<div class="styleElement"><a href="index.php?filter=style&style=romantic" style="text-decoration:none">🌹</a></div>';
				elseif ($style == "classical")
					echo '<div class="styleElement"><a href="index.php?filter=style&style=classical" style="text-decoration:none">🕰</a></div>';
				elseif ($style == "impressionism")
					echo '<div class="styleElement"><a href="index.php?filter=style&style=impressionism" style="text-decoration:none">🖼️</a></div>';
			}
		echo "</div>";

		// Setup title link
		echo '<h2 class="elementTitle"><a style="color:white; text-decoration:none" href="index.php?filter=element&element=' . $element["pageName"] . '">' . $element["title"] . "</a></h4>";


		// If togglable add see more / less
		if (!$display) {
			// echo '<a class="seeMore">Show</a>';
			echo '<div class="seeMore"><div class="seeMoreOverlay">Show</div></div>';
		}


		// Possibility to collapse or not by default
		if ($display)
			echo '<div class="elementContents">';
		else
			echo '<div class="elementContents" style="max-height: 100px">';

		include "elements/".$element["pageName"].".html";

		echo '</div>';

		// If togglable add see more / less
		if (!$display)
			echo '<div class="seeLessContainer" style="display:none;"><a class="seeLess">Hide</a></div>';

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
