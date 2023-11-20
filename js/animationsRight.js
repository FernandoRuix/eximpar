 
window.addEventListener("scroll", animate_left);
function animate_left(){
  var reveals = document.querySelectorAll(".animate_left");

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
