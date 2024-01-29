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
array_push($library, element("chopin_chord", "'Chopin Chord' (V7<sup>Add6</sup>)", ["romantic"], ["chopin", "scriabin"], "harmony"));
array_push($library, element("V9_chord", "Upward V<sup>9</sup> Chord in Major", ["romantic"], [], "harmony"));
array_push($library, element("V7b9_chord", "V<sup>7b9</sup> Chord in minor", ["romantic"], [], "harmony", ["sad"]));
array_push($library, element("n6", "Neapolitan 6th Chord", ["romantic"], ["beethoven", "chopin"], "harmony", ["sad"]));
array_push($library, element("augmented_triads", "Augmented Triads", ["romantic"], ["rachmaninoff"], "harmony"));
array_push($library, element("ct_lt", "CT<sup>o7</sup> & LT<sup>o7</sup> Chords", ["romantic"], [], "harmony", ["dreamy"]));
array_push($library, element("V_over_1", "V<sup>7</sup> over *1", ["romantic", "classical"], [], "harmony", ["dreamy"]));
array_push($library, element("suspensions", "Romantic Suspensions", ["romantic"], [], "harmony"));

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
array_push($library, element("harmonic_minor", "Harmonic Minor", ["romantic"], ["rachmaninoff"], "harmony", ["mystical"]));
array_push($library, element("harmonic_major", "Harmonic Major", ["romantic"], ["rachmaninoff"], "harmony", ["bittersweet"]));

array_push($library, element("quartal", "Quartal & Quintal Harmony", ["impressionist"], ["debussy", "hisaishi"], "harmony"));


array_push($library, element("pianoidee", "Pianoidée", ["classical"], ["corelli", "vivaldi"], "harmony"));



// Define small misc elements
$library_misc = [];

array_push($library_misc, element("openers", "Opening Gestures"));

array_push($library_misc, element("spinning_forward", "Spinning Forward"));

array_push($library_misc, element("endings", "Endings"));
