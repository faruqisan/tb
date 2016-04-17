function scroll(id){
  $('html, body').animate({scrollTop:$(id).position().top},1500);
}
$(document).ready(function(){
  $('.parallax').parallax();
  $(".dropdown-button").dropdown();
  $('.modal-trigger').leanModal()
});
