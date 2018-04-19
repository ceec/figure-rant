var figure = (function () {
  var x = {};
  x.createFriendlyUrl = function (input) {
    input.onpaste = function (e) {
      var pastedText;
      if (e.clipboardData && e.clipboardData.getData) {
        pastedText = e.clipboardData.getData('text/plain');

        //need to convert to lowercase
        pastedText = pastedText.toLowerCase();
        //replace spaces with - 
        pastedText = pastedText.replace(/ /g, "-");
        //replace & with and
        pastedText = pastedText.replace(/&/g, "and");
        //replace : with nothing
        pastedText = pastedText.replace(/:/g, "");

        //need to update the input value
        document.getElementById('url').value = pastedText;
        //this clears out the default paste function
        return false;
      }
    }
  }

  return x;

})();