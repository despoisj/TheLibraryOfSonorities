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

function replaceDigitsWithCircledNumbers(text) {

    // Regular expression to match digits with a caret symbol (^)
    const regex = /\^(\d)/g;
    const unicodeOffset = 10121; // For back background: soprano
    // Unicode offset for circled numbers: 9311 or 10111 (0x2460)

    // Replace matched digits with their corresponding circled numbers
    // text = text.replace(regex, (_, digit) => "<span style='font-size:20px;'>" + String.fromCharCode(parseInt(digit) + unicodeOffset) + "</span>");
    text = text.replace(regex, (_, digit) => "<span>" + String.fromCharCode(parseInt(digit) + unicodeOffset) + "</span>");



    // Regular expression to match digits with a star symbol (*)
    const regexBass = /\*(\d)/g;
    const unicodeOffsetBass = 10111; // For back background: soprano

    // Replace matched digits with their corresponding circled numbers
    // text = text.replace(regexBass, (_, digit) => "<span style='font-size:20px;'>" + String.fromCharCode(parseInt(digit) + unicodeOffsetBass) + "</span>");
    text = text.replace(regexBass, (_, digit) => "<span'>" + String.fromCharCode(parseInt(digit) + unicodeOffsetBass) + "</span>");



    // Replace -> by →
    text = text.replaceAll("-&gt;","→");


    text = text.replaceAll(/(LT°7|LT°)/g, "<span class='item lt7'>LT°7</span>");
    text = text.replaceAll(/([A-Za-z]?)CT°7|([A-Za-z]?)CT°/g, "<span class='item ct7'>$1CT°7</span>");

    return text;
}

$(document).ready(function() {

  // Loop through all elements and replace their content
  $('body *').each(function() {
    const originalText = $(this).html();
    const convertedText = replaceDigitsWithCircledNumbers(originalText);
    $(this).html(convertedText);
  });

});