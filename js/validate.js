$(function() {







});


function validateEmail() {
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var email = document.getElementById("email").value;
    var confirmemail = document.getElementById("confirmemail").value;
    if (email.match(validRegex) && email == confirmemail) {
      return true;
  
    } else {
  
      return false;
  
    }
}

function validatePassword() {
    var password = document.getElementById("").value;
    var confirmpassword = document.getElementByIdById("").value;
    

}