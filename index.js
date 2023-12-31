var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};

function makeItem(text, itemclass, page = false) {
    // Ex V9, v9, V9_chord
    if (page)
        return "<a href='index.php?filter=element&element="+ page +"' style='text-decoration:none'><span class='item "+ itemclass +"'>"+ text +"</span></a>"
    else
        return "<span class='item "+ itemclass +"'>"+ text +"</span>"

}

function formatPage(text) {

    // Regular expression to match digits with a caret symbol (^)
    const regex = /\^(\d)/g;
    const unicodeOffset = 10121; // For back background: soprano
    // Unicode offset for circled numbers: 9311 or 10111 (0x2460)

    // Replace matched digits with their corresponding circled numbers
    text = text.replace(regex, (_, digit) => String.fromCharCode(parseInt(digit) + unicodeOffset));

    // Regular expression to match digits with a star symbol (*)
    const regexBass = /\*(\d)/g;
    const unicodeOffsetBass = 10111; // For back background: soprano

    // Replace matched digits with their corresponding circled numbers
    text = text.replace(regexBass, (_, digit) => String.fromCharCode(parseInt(digit) + unicodeOffsetBass));


    // Replace -> by →
    text = text.replaceAll("-&gt;","→");

    // Inline items
    text = text.replaceAll(/(LT°7|LT°)(?!.*<\/h[1-9]>)(?![^<>]*<\/a>)/g, makeItem("$1", "lt7", "ct_lt#ctlt"));
    text = text.replaceAll(/([A-Za-z]?)CT°7(?!.*<\/h[1-9]>)(?![^<>]*<\/a>)/g, makeItem("$1CT°7", "ct7", "ct_lt#ctlt"));

    text = text.replaceAll(/VChM9/g, makeItem("VCh<small><small>Maj</small><sup>9</sup></small>", "vchMaj9", "chopin_chord#vch9"));
    text = text.replaceAll(/VChmb9/g, makeItem("VCh<small><small>min</small><sup>♭9</sup></small>", "vchMinb9", "chopin_chord#vch9"));
    
    text = text.replaceAll(/VChM/g, makeItem("VCh<small><small>Maj</small></small>", "vchMaj", "chopin_chord#vch"));
    text = text.replaceAll(/VChm/g, makeItem("VCh<small><small>min</small></small>", "vchMin", "chopin_chord#vch"));

    text = text.replaceAll(/V7b9(?!.*<\/h[1-9]>)(?![^<>]*<\/a>)/g, makeItem("V7b9", "v7b9", "V7b9_chord"));
    text = text.replaceAll(/(?<!n)V9(sus)?(?!.*<\/h[1-9]>)(?![^<>]*<\/a>)/g, makeItem("V9<sup>↑</sup>$1", "v9", "V9_chord#v9"));
    // Normal V9
    text = text.replaceAll(/nV9(sus)?(?!.*<\/h[1-9]>)(?![^<>]*<\/a>)/g, makeItem("V9$1", "nv9", "V9_chord#v9"));
    text = text.replaceAll(/V11(?!.*<\/h[1-9]>)(?![^<>]*<\/a>)/g, makeItem("V11<sup>↑</sup>", "v9", "V9_chord#v11"));

    text = text.replaceAll(/WSS(?!.*<\/h[1-9]>)(?![^<>]*<\/a>)/g, makeItem("WSS", "wss", "suspensions"));

    text = text.replaceAll(/\*M\*/g, makeItem("<small><small>Maj.</small></small>", "major"));
    text = text.replaceAll(/\*m\*/g, makeItem("<small><small>min.</small></small>", "minor"));

    return text;
}

$(document).ready(function() {

  // Loop through all elements and replace their content
  $('body *').each(function() {
    const originalText = $(this).html();
    const convertedText = formatPage(originalText);
    $(this).html(convertedText);
  });

  // Setup scroll anchord
  $(document).ready(function() {
      $("a.scrollLink").click(function(event) {
          event.preventDefault();
          $("html, body").animate({
              scrollTop: $($(this).attr("href")).offset().top
            }, 500);
        });
    });

});