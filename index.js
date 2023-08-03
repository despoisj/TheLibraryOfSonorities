function replaceDigitsWithCircledNumbers(text) {
    // Unicode offset for circled numbers: 9311 (0x2460)
    const unicodeOffset = 9311;

    // Regular expression to match digits with a caret symbol (^)
    const regex = /\^(\d)/g;

    // Replace matched digits with their corresponding circled numbers
    return text.replace(regex, (_, digit) => "<span style='font-size:20px'>" + String.fromCharCode(parseInt(digit) + unicodeOffset) + "</span>");
}

$(document).ready(function() {

  // Loop through all elements and replace their content
  $('body *').each(function() {
    const originalText = $(this).html();
    const convertedText = replaceDigitsWithCircledNumbers(originalText);
    $(this).html(convertedText);
  });
});