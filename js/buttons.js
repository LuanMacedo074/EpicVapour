$(document).ready(function() {
    $(".btn3").click( function(){
        if(alertEmail('email')){
        window.alert("Email enviado!"); } else {
            window.alert("Insira um email valido!")
        }
    })
  });

  function alertEmail(campo1){
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    var email = document.getElementById(campo1).value;
  
    return email.match(validRegex) 
  
  }