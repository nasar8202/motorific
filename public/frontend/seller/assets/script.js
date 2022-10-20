//active class

let menutoggle = document.querySelector('.toggle');
let menunav = document.querySelector('.navi');
menutoggle.onclick = function () {
    menutoggle.classList.toggle('active');
    menunav.classList.toggle('active');

}

function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

function myFunction2() {
    var x = document.getElementById("myDIV2");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }

  function myFunction3() {
    var x = document.getElementById("myDIV3");
    if (x.style.display === "none") {
      x.style.display = "block";
    } else {
      x.style.display = "none";
    }
  }



  // for loader
  $(window).on("load",function(){
    $(".loader-wrapper").fadeOut("slow")
  });

