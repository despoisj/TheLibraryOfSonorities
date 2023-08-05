<?php 

class Element {
   public $pageName;
   public $title;
   public $styles;
   public $composers;
   public $type;
   public $emotions;

   public function __construct($pageName, $title, $styles = [], $composers = [], $type = "harmony", $emotions = []) {     
       $this->pageName = $pageName;
       $this->title = $title;
       $this->styles = $styles;
       $this->composers = $composers;
       $this->type = $type;
       $this->emotions = $emotions;
   }
}

// Define elements
$library = [];

// Romantic
array_push($library, new Element(pageName: "chopin_chord",
							 title:  "'Chopin Chord' (V7Add6)", 
							 styles: ["romantic", "brilliant"], 
							 composers: ["chopin", "scriabin"], 
							 type: "harmony"));

array_push($library, new Element(pageName: "V9_chord",
							 title:  "V9 Chord", 
							 styles: ["romantic"], 
							 composers: ["chopin"], 
							 type: "harmony"));

array_push($library, new Element(pageName: "moonlight_modulation",
							 title:  "'Moonlight Modulation'", 
							 styles: ["romantic"], 
							 composers: ["beethoven"], 
							 type: "harmony"));

array_push($library, new Element(pageName: "augmented_chord",
							 title:  "Augmented Chords", 
							 styles: ["romantic"], 
							 composers: ["rachmaninoff"], 
							 type: "harmony"));

array_push($library, new Element(pageName: "ivM7_iiim7",
							 title:  "IVMaj7 → iiim7", 
							 styles: ["romantic"],
							 composers: ["blumenfeld"],
							 type: "harmony"));

array_push($library, new Element(pageName: "chromatic_thirds", 
							 title:"(Chromatic) Thirds",
							 styles: ["romantic", "brilliant"], 
							 composers: ["chopin"], 
							 type: "harmony"));

array_push($library, new Element(pageName: "ninth_arps", 
							 title: "Arpeggios with added 9th",
							 styles: ["romantic"], 
							 composers: ["blumenfeld"], 
							 type: "harmony"));

array_push($library, new Element(pageName: "prinner", 
							 title: "The Prinner", 
							 styles: ["baroque"], 
							 composers: ["mozart"], 
							 type: "harmony"));

array_push($library, new Element(pageName: "lh_arps", 
							 title: "Left Hand Broken Arpeggios", 
							 styles: ["romantic"], 
							 composers: ["chopin", "scriabin"], 
							 type: "texture"));

// Todo texture + harmony
array_push($library, new Element(pageName: "lh_waltz", 
							 title: "Left Hand Waltz Patterns", 
							 styles: ["romantic"], 
							 composers: ["chopin", "brahms", "tchaikovsky"], 
							 type: "texture"));