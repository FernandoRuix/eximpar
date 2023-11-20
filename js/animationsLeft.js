
window.addEventListener("scroll", animate_right);
function animate_right(){
  var reveals = document.querySelectorAll(".animate_right");

  for(var i = 0; i < reveals.length; i++){

    var windowheight = window.innerHeight;
    var revealtop = reveals[i].getBoundingClientRect().top;
    var revealpoint = 150;

    if(revealtop < windowheight - revealpoint){
      reveals[i].classList.add("active");
    } 
 
  }
}

//clase reveal para los containers
