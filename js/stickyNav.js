// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var barra = document.getElementById("barra");

// Get the offset position of the navbar
var sticky = barra.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    barra.classList.add("sticky");
    $('.sidebar').css({"margin-top":"30px"});
  } else {
    barra.classList.remove("sticky");
    $('.sidebar').removeAttr("style");
  }
}