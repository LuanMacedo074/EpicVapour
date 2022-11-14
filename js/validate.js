function isEmail(campo1){ 
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  var email = document.getElementById(campo1).value;
  if (email.match(validRegex)){
    return true;
  } else{
    return false;
  }
}

function validateEmail(campo1, campo2) {
    var email = document.getElementById(campo1).value;
    var confirmemail = document.getElementById(campo2).value;
    if (isEmail(email) && email == confirmemail) {
      return true;
    } else {
      return false;
    }
}

function validatePassword(campo1, campo2) {
    var password = document.getElementById(campo1).value;
    var confirmpassword = document.getElementById(campo2).value;
    if (password && password == confirmpassword){
      return true
    } else {
      return false
    }

}

function passwordValue(campo){
  var password = document.getElementById(campo).value;
  const number = /[0-9]/;
  const upperChar = /[A-Z]/
  const lowerChar = /[a-z]/
  const specialChar = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

  if (password.length >= 8 && number.test(password) && upperChar.test(password) && lowerChar.test(password) && specialChar.test(password)){
    return true
  } else{
    return false
  }
}

function validateForm() {
  var email = "email"
  var email2 = "confirmemail"
  var pass = "password"
  var pass2 = "confirmpassword"

  if (validatePassword(pass, pass2) && validateEmail(email, email2) && passwordValue(pass)){
    return true
  } else{ 
    return false
  }
}

function validateLogin(){
  var email = document.getElementById("email").value;

  if (isEmail(email) && passwordValue("password")){
    return true
  } else{
    return false
  }
}

function validateRecovery(){
  if (passwordValue('password') && passwordValue('oldpassword') && validatePassword('password', 'confirmpassword')){
    return true
  } else{
    return false
  }
}
