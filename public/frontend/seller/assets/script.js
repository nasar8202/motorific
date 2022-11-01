//active class

let menutoggle = document.querySelector('.toggle');
let menunav = document.querySelector('.navi');
menutoggle.onclick = function () {
    menutoggle.classList.toggle('active');
    menunav.classList.toggle('active');

}

function myFunction() {
    var x = document.getElementById("myDIV");
    $(x).slideToggle(); 
  }

function myFunction2() {
    var x = document.getElementById("myDIV2");
    $(x).slideToggle(); 
  }

  function myFunction3() {
    var x = document.getElementById("myDIV3");
    $(x).slideToggle();
  }



// for loader
jQuery(document).ready(function($){
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow")
    });
});

