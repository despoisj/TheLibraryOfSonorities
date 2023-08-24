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

    return text;
}

$(document).ready(function() {

  // Loop through all elements and replace their content
  $('body *').each(function() {
    const originalText = $(this).html();
    const convertedText = replaceDigitsWithCircledNumbers(originalText);
    $(this).html(convertedText);
  });

  // Display on click
  $(".seeMore").click(function(event) {
    // $(this).parent().find(".elementContents").slideToggle(700);
    $(this).parent().find(".elementContents").css("max-height", "20000px");

    // Buttons
    $(this).hide();
    $(this).parent().find(".seeLessContainer").show();
  });

  $(".seeLess").click(function(event) {
    // $(this).parent().parent().find(".elementContents").slideToggle(400);
    $(this).parent().parent().find(".elementContents").css("max-height", "100px");

    // Buttons
    $(this).parent().hide();
    $(this).parent().parent().find(".seeMore").show();

    // Scroll to top
    $('html, body').scrollTop($(this).parent().parent().offset().top - 100);
  });

});