function scroll(id){
  $('html, body').animate({scrollTop:$(id).position().top},1500);
}
$(document).ready(function(){
  $('.parallax').parallax();
  $(".dropdown-button").dropdown({belowOrigin: true});
  $('.modal-trigger').leanModal();
  $(".button-collapse").sideNav();
  $('.tooltipped').tooltip({delay: 50});
  $('ul.tabs').tabs();
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
});
