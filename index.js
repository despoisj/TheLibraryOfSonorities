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
    // Unicode offset for circled numbers: 9311 or 10111 (0x2460)
    const unicodeOffset = 10121; // For back background: soprano

    // Regular expression to match digits with a caret symbol (^)
    const regex = /\^(\d)/g;

    // Replace matched digits with their corresponding circled numbers
    return text.replace(regex, (_, digit) => "<span style='font-size:20px;'>" + String.fromCharCode(parseInt(digit) + unicodeOffset) + "</span>");
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
    $(this).parent().find(".elementContents").css("max-height", "5000px");

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