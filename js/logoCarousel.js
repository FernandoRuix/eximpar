$(function(){
 // vars for clients list carousel
  // http://stackoverflow.com/questions/6759494/jquery-function-definition-in-a-carousel-script
  var $clientcarousel = $('#animation_marcas');
  var clients = $clientcarousel.children().length;
  var clientwidth = (clients * 220); // 140px width for each client item 
  $clientcarousel.css('width',clientwidth);
  
  var rotating = true;
  var clientspeed = 0;
  var seeclients = setInterval(rotateClients, clientspeed);
  
  $(document).on({
    mouseenter: function(){
      rotating = true; // turn off rotation when hovering
    },
    mouseleave: function(){
      rotating = true;
    }
  }, '#clients');
  
  function rotateClients() {
    if(rotating != false) {
      var $first = $('#animation_marcas li:first');
      $first.animate({ 'margin-left': '-220px' }, 5000, "linear", function() {
        $first.remove().css({ 'margin-left': '0px' });
        $('#animation_marcas li:last').after($first);
      });
    }
  }
});