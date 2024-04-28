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
array_push($library, element("chopin_chord", "'Chopin Cadence' (V7<sup>Add6</sup>)", ["romantic"], ["chopin", "scriabin", "field", "blumenfeld", "lizst"], "harmony"));
array_push($library, element("V9_chord", "'Dream Cadence' (V<sup>9↑</sup>)", ["romantic"], ["scriabin", "chopin", "liszt", "field", "schumann"], "harmony", ["dreamy"]));
array_push($library, element("V7b9_chord", "V<sup>7♭9</sup> Chord in minor", ["romantic"], [], "harmony", ["sad"]));
array_push($library, element("n6", "Neapolitan 6th Chord", ["romantic"], ["beethoven", "chopin"], "harmony", ["sad"]));
array_push($library, element("augmented_triads", "Augmented Triads", ["romantic"], ["rachmaninoff", "liszt"], "harmony"));

array_push($library, element("augmented_maj7", "Maj<sup>7#5</sup> Chord", ["classical", "romantic"], ["couperin", "bach"], "harmony", ["tragic", "sad", "anguish"]));
array_push($library, element("iv_hdim", "iv<sup>ø7</sup> & ♭vi Chords", ["romantic"], ["rachmaninoff", "schubert"], "harmony", ["dark"]));

array_push($library, element("ct_lt", "CT<sup>o7</sup> & LT<sup>o7</sup> Chords", ["romantic"], [], "harmony", ["dreamy"]));
array_push($library, element("V_over_1", "V<sup>7</sup> over *1", ["romantic", "classical"], ["chopin", "scriabin"], "harmony", ["dreamy"]));
array_push($library, element("suspensions", "Romantic Suspensions", ["romantic"], [], "harmony"));

// Modulation
array_push($library, element("moonlight_modulation", "'Moonlight' Modulation (i to ♭VI)", ["romantic"], ["beethoven", "chopin"], "harmony"));
array_push($library, element("rel_maj_modulation", "Relative Major Modulation (i to III)", ["classical", "romantic"], [], "harmony"));

// Progressions
array_push($library, element("ivmaj7_iiimin7", "IVMaj7 → iiim7", ["romantic"], ["blumenfeld"], "harmony", ["bittersweet"]));
array_push($library, element("omnibus", "The Omnibus Family", ["romantic"], ["beethoven", "tchaikovsky"], "harmony", ["tense"]));

// Todo texture + harmony
array_push($library, element("lh_arps", "Left Hand Broken Arpeggios", ["romantic"], ["chopin", "scriabin"], "texture"));
array_push($library, element("lh_waltz", "Left Hand Waltz Patterns", ["romantic"], ["chopin", "brahms", "tchaikovsky"], "texture"));

// Arps
array_push($library, element("ninth_arps", "Arpeggios with added 9th", ["romantic", "impressionist"], ["blumenfeld", "scriabin", "rachmaninoff"], "harmony"));

// Other
array_push($library, element("chromatic_thirds", "(Chromatic) Thirds", ["romantic", "brilliant"], ["chopin", "rachmaninoff", "schubert"], "texture"));


array_push($library, element("picardy_third", "Picardy Third", ["romantic", "classical"], ["chopin"], "harmony"));

array_push($library, element("prinner", "The Prinner", ["classical"], ["mozart"], "harmony"));
array_push($library, element("tb", "The Tied Bass", ["classical"], ["bach"], "harmony"));
array_push($library, element("stepwise_leo", "Stepwise Romanesca & The Leo", ["classical"], ["bach", "haydn", "mozart"], "harmony", ["triumphant", "happy"]));

array_push($library, element("harmonic_minor", "Harmonic Minor", ["romantic"], ["rachmaninoff"], "harmony", ["mystical"]));
array_push($library, element("harmonic_major", "Harmonic Major", ["romantic"], ["rachmaninoff", "chopin"], "harmony", ["bittersweet"]));

array_push($library, element("monte_principale", "Monte Principale", ["classical", "romantic"], [], "harmony", ["bittersweet"]));

array_push($library, element("quartal", "Quartal & Quintal Harmony", ["impressionist"], ["debussy", "ravel", "hisaishi"], "harmony"));
array_push($library, element("predominants", "Predominants & Predominant Extensions", ["romantic"], ["scriabin", "chopin", "rachmaninoff", "ravel"], "harmony"));


array_push($library, element("pianoidee", "Pianoidée", ["classical"], ["corelli", "vivaldi"], "harmony"));



// Define small misc elements
$library_misc = [];

array_push($library_misc, element("openers", "Opening Gestures"));

array_push($library_misc, element("spinning_forward", "Spinning Forward"));

array_push($library_misc, element("endings", "Endings"));


// Define blog elements
$library_blog = [];

array_push($library_blog, element("romantic_schemata", "Schemata in the Romantic Era"));

