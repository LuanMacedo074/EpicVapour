var changeBorder = function() {
    var output = document.getElementById('email');
    output.style.borderColor = 'red'
  };

  var loadFile = function(event) {
    var output = document.getElementById('avatar');
    output.style.opacity = '1'
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };