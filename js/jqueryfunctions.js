$(document).ready(function(){
    $('.img').mouseenter(function() {
        $('#logo').replaceWith('<img src="./siteimages/logo2.png" id="logo">')
      });
      $('.img').mouseleave(function() {
        $('#logo').replaceWith('<img src="./siteimages/logo.png" id="logo">')
      });
})