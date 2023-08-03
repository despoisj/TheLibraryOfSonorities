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


function loadElement($element) {
	echo "<div class='element'>";

	// Setup title link
	echo '<a style="color:white; text-decoration:none" href="index.php?filter=element&element=' . $element["pageName"] . '"><h2 class="elementTitle">' . $element["title"] . "</h4></a>";

	include "elements/".$element["pageName"].".html";

	// Tags
	echo "<div class='tagBox'>";
	foreach ($element["styles"] as $style) {
		echo "<i><a class='tag' href='index.php?filter=style&style=" . $style . "'>" . ucfirst($style) . "</a></i>, ";
	}
	foreach ($element["composers"] as $composer) {
		echo "<i><a class='tag' href='composers.php?filter=composer&composer=" . $composer . "'>" . ucfirst($composer) . "</a></i>, ";
	}
	echo "</div>";

	echo "</div>";
}

// Define elements
$mapping = [];
array_push($mapping, element("chopin_chord", "'Chopin Chord' (V7Add6)", ["romantic"], ["chopin"], "harmony"));
array_push($mapping, element("V9_chord", "V9 Chord", ["romantic"], ["chopin"], "harmony"));
array_push($mapping, element("moonlight_modulation", "'Moonlight Modulation'", ["romantic"], ["beethoven"], "harmony"));
array_push($mapping, element("augmented_chord", "Augmented Chords", ["romantic"], ["rachmaninoff"], "harmony"));
array_push($mapping, element("lh_arps", "Left Hand Broken Arpeggios", ["romantic"], ["chopin", "scriabin"], "texture"));


function loadAllElements() {
	global $mapping;
	foreach ($mapping as $element) {
		loadElement($element);
	}
}

function loadStyle($style) {
	global $mapping;
	foreach ($mapping as $element) {
		foreach ($element["styles"] as $currStyle){
			if ($currStyle == $style){
				loadElement($element);
			}
		}
	}
}

function loadComposer($composer) {
	global $mapping;
	foreach ($mapping as $element) {
		foreach ($element["composers"] as $currComposer){
			if ($currComposer == $composer){
				loadElement($element);
			}
		}
	}
}

function loadType($type) {
	global $mapping;
	foreach ($mapping as $element) {
		if ($element["type"] == $type){
			loadElement($element);
		}
	}
}

function loadSingleElement($elementName) {
	global $mapping;
	foreach ($mapping as $element) {
		if ($element["pageName"] == $elementName){
			loadElement($element);
		}
	}
}