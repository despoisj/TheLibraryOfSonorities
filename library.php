<?php

function element($pageName, $title, $styles = [], $composers = [], $type = "harmony", $emotions = []) {
	// Create element
	$element = [];
	$element["pageName"] = $pageName;
	$element["title"] = $title;
	$element["styles"] = $styles;
	$element["composers"] = $composers;
	$element["type"] = $type; // harmony or texture
	$element["emotions"] = $emotions;

	return $element;
}


// Define elements
$library = [];
// Romantic
array_push($library, element("chopin_chord", "'Chopin Chord' (V7Add6)", ["romantic"], ["chopin", "scriabin"], "harmony"));
array_push($library, element("V9_chord", "V9 Chord", ["romantic"], ["chopin"], "harmony"));
array_push($library, element("moonlight_modulation", "'Moonlight Modulation'", ["romantic"], ["beethoven"], "harmony"));
array_push($library, element("augmented_chord", "Augmented Chords", ["romantic"], ["rachmaninoff"], "harmony"));
array_push($library, element("ivM7_iiim7", "IVMaj7 → iiim7", ["romantic"], ["blumenfeld"], "harmony", ["bittersweet"]));
array_push($library, element("chromatic_thirds", "(Chromatic) Thirds", ["romantic", "brilliant"], ["chopin"], "harmony"));
array_push($library, element("ninth_arps", "Arpeggios with added 9th", ["romantic"], ["blumenfeld"], "harmony"));

array_push($library, element("prinner", "The Prinner", ["classical"], ["mozart"], "harmony"));

array_push($library, element("lh_arps", "Left Hand Broken Arpeggios", ["romantic"], ["chopin", "scriabin"], "texture"));

array_push($library, element("stepwise_leo", "Stepwise Romanesca & The Leo", ["classical"], ["bach", "haydn", "mozart"], "texture", ["triumphant", "happy"]));

// Todo texture + harmony
array_push($library, element("lh_waltz", "Left Hand Waltz Patterns", ["romantic"], ["chopin", "brahms", "tchaikovsky"], "texture"));
