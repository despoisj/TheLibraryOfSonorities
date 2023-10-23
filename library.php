<?php

function element($pageName, $title, $styles = [], $composers = [], $type = "harmony", $emotions = [], $img="") {
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


// Chords
array_push($library, element("chopin_chord", "'Chopin Chord' (V7Add6)", ["romantic"], ["chopin", "scriabin"], "harmony"));
array_push($library, element("V9_chord", "Upward V9 Chord in Major", ["romantic"], [], "harmony"));
array_push($library, element("n6", "Neapolitan 6th Chord", ["romantic"], ["beethoven", "chopin"], "harmony", ["sad"]));
array_push($library, element("augmented_triads", "Augmented Triads", ["romantic"], ["rachmaninoff"], "harmony"));
array_push($library, element("ct_lt", "CT°7 & LT°7 Chords", ["romantic"], [], "harmony", ["dreamy"]));
array_push($library, element("V_over_1", "V(7) over *1", ["romantic", "classical"], [], "harmony", ["dreamy"]));

// Modulation
array_push($library, element("moonlight_modulation", "'Moonlight' Modulation (i to bVI)", ["romantic"], ["beethoven"], "harmony"));
array_push($library, element("rel_maj_modulation", "Relative Major Modulation (i to III)", ["classical", "romantic"], [], "harmony"));

// Progressions
array_push($library, element("ivM7_iiim7", "IVMaj7 → iiim7", ["romantic"], ["blumenfeld"], "harmony", ["bittersweet"]));
array_push($library, element("omnibus", "The Omnibus Family", ["romantic"], ["beethoven", "tchaikovsky"], "harmony", ["tense"]));

// Todo texture + harmony
array_push($library, element("lh_arps", "Left Hand Broken Arpeggios", ["romantic"], ["chopin", "scriabin"], "texture"));
array_push($library, element("lh_waltz", "Left Hand Waltz Patterns", ["romantic"], ["chopin", "brahms", "tchaikovsky"], "texture"));

// Arps
array_push($library, element("ninth_arps", "Arpeggios with added 9th", ["romantic"], ["blumenfeld"], "harmony"));

// Other
array_push($library, element("chromatic_thirds", "(Chromatic) Thirds", ["romantic", "brilliant"], ["chopin", "rachmaninoff"], "texture"));


array_push($library, element("picardy_third", "Picardy Third", ["romantic"], ["chopin"], "harmony"));

array_push($library, element("prinner", "The Prinner", ["classical"], ["mozart"], "harmony"));
array_push($library, element("tb", "The Tied Bass", ["classical"], ["bach"], "harmony"));
array_push($library, element("stepwise_leo", "Stepwise Romanesca & The Leo", ["classical"], ["bach", "haydn", "mozart"], "harmony", ["triumphant", "happy"]));

// WIP
array_push($library, element("harmonic_minor", "(WIP) Harmonic Minor", ["romantic"], ["rachmaninoff"], "harmony", ["mystical"]));

