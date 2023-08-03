<?php

function element($pageName, $title, $styles, $composers, $type) {
	// Create element
	$element = [];
	$element["pageName"] = $pageName;
	$element["title"] = $title;
	$element["styles"] = $styles;
	$element["composers"] = $composers;
	$element["type"] = $type; // harmony or texture

	return $element;
}


// Define elements
$mapping = [];
// Romantic
array_push($mapping, element("chopin_chord", "'Chopin Chord' (V7Add6)", ["romantic"], ["chopin", "scriabin"], "harmony"));
array_push($mapping, element("V9_chord", "V9 Chord", ["romantic"], ["chopin"], "harmony"));
array_push($mapping, element("moonlight_modulation", "'Moonlight Modulation'", ["romantic"], ["beethoven"], "harmony"));
array_push($mapping, element("augmented_chord", "Augmented Chords", ["romantic"], ["rachmaninoff"], "harmony"));
array_push($mapping, element("ivM7_iiim7", "IVMaj7 → iiim7", ["romantic"], ["blumenfeld"], "harmony"));
array_push($mapping, element("chromatic_thirds", "(Chromatic) Thirds", ["romantic", "brilliant"], ["chopin"], "harmony"));
array_push($mapping, element("ninth_arps", "Arpeggios with added 9th", ["romantic"], ["blumenfeld"], "harmony"));

array_push($mapping, element("prinner", "The Prinner", ["baroque"], ["mozart"], "harmony"));

array_push($mapping, element("lh_arps", "Left Hand Broken Arpeggios", ["romantic"], ["chopin", "scriabin"], "texture"));


function loadElement($element, $display) {
	// Loads a singular element

	echo '<div class="element">';

		// Test to differentiate romantic / baroque etc. 
		echo "<div class='styleElementWrapper'>";

			foreach($element["styles"] as $style){
				if ($style == "romantic")
					echo '<div class="styleElement"><a href="index.php?filter=style&style=romantic" style="text-decoration:none">🌹</a></div>';
				elseif ($style == "baroque")
					echo '<div class="styleElement"><a href="index.php?filter=style&style=baroque" style="text-decoration:none">🕰</a></div>';
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
		echo "</div>";

	echo "</div>";
}

function loadAllElements() {
	global $mapping;
	foreach ($mapping as $element) {
		loadElement($element, False);
	}
}

function loadStyle($style) {
	global $mapping;
	foreach ($mapping as $element) {
		foreach ($element["styles"] as $currStyle){
			if ($currStyle == $style){
				loadElement($element, False);
			}
		}
	}
}

function loadComposer($composer) {
	global $mapping;
	foreach ($mapping as $element) {
		foreach ($element["composers"] as $currComposer){
			if ($currComposer == $composer){
				loadElement($element, False);
			}
		}
	}
}

function loadType($type) {
	global $mapping;
	foreach ($mapping as $element) {
		if ($element["type"] == $type){
			loadElement($element, False);
		}
	}
}

function loadSingleElement($elementName) {
	global $mapping;
	foreach ($mapping as $element) {
		if ($element["pageName"] == $elementName){
			loadElement($element, True); // Uncollapse
		}
	}
}
