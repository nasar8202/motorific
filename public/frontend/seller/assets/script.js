//active class

let menutoggle = document.querySelector('.toggle');
let menunav = document.querySelector('.navi');
// menutoggle.onclick = function () {
//     menutoggle.classList.toggle('active');
//     menunav.classList.toggle('active');

// }

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
function myFunction4() {
    var x = document.getElementById("myDIV4");
    $(x).slideToggle();
}

function myFunction5() {
    var x = document.getElementById("myDIV5");
    $(x).slideToggle();
}



// for loader
jQuery(document).ready(function($){
    $(window).on("load",function(){
        $(".loader-wrapper").fadeOut("slow")
    });
});






// hamza js 

 $( document ).ready(function() {


var child = 1;
var length = $("section.step-sec").length - 1;
$("#prev").addClass("disabled");
$("#submit").addClass("disabled");

$("section.step-sec").not("section.step-sec:nth-of-type(1)").hide();
$("section.step-sec").not("section.step-sec:nth-of-type(1)").css('transform','translateX(100px)');


function makeSVG(tag, attrs) {
  var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
  for (var k in attrs) el.setAttribute(k, attrs[k]);
  return el;
}

 
$(".step-button").click(function () {

  var id = $(this).attr("id");
  if (id == "next") {
    $("#prev").removeClass("disabled");
    if (child >= length) {
      $(this).addClass("disabled");
      $('#submit').removeClass("disabled");
    }
    if (child <= length) {
      child++;
    }
  } else if (id == "prev") {
    $("#next").removeClass("disabled");
    $('#submit').addClass("disabled");
    if (child <= 2) {
      $(this).addClass("disabled");
    }
    if (child > 1) {
      child--;
    }
  }

  var currentSection = $("section.step-sec:nth-of-type(" + child + ")");
  currentSection.fadeIn();
  currentSection.css('transform','translateX(0)');
 currentSection.prevAll('section.step-sec').css('transform','translateX(-100px)');
  currentSection.nextAll('section.step-sec').css('transform','translateX(100px)');
  $('section.step-sec').not(currentSection).hide();
  $('section.step-sec:last-child()').next('#next').hide();
});


// exterior ==================



var childext = 1;
var lengthext = $("section.step-sec-ext").length - 1;
$("#prev-ext").addClass("disabled");
$("#submit-ext").addClass("disabled");

$("section.step-sec-ext").not("section.step-sec-ext:nth-of-type(1)").hide();
$("section.step-sec-ext").not("section.step-sec-ext:nth-of-type(1)").css('transform','translateX(100px)');


function makeSVG(tagext, attrsext) {
  var elext = document.createElementNS("http://www.w3.org/2000/svg", tagext);
  for (var kext in attrsext) elext.setAttribute(kext, attrsext[kext]);
  return elext;
}

 
$(".step-button-ext").click(function () {

  var idext = $(this).attr("id");
  if (idext == "next-ext") {
    $("#prev-ext").removeClass("disabled");
    if (childext >= lengthext) {
      $(this).addClass("disabled");
      $('#submit-ext').removeClass("disabled");
    }
    if (childext <= lengthext) {
      childext++;
    }
  } else if (idext == "prev-ext") {
    $("#next-ext").removeClass("disabled");
    $('#submit-ext').addClass("disabled");
    if (childext <= 2) {
      $(this).addClass("disabled");
    }
    if (childext > 1) {
      childext--;
    }
  }

  var currentSectionext = $("section.step-sec-ext:nth-of-type(" + childext + ")");
  currentSectionext.fadeIn();
  currentSectionext.css('transform','translateX(0)');
 currentSectionext.prevAll('section.step-sec-ext').css('transform','translateX(-100px)');
  currentSectionext.nextAll('section.step-sec-ext').css('transform','translateX(100px)');
  $('section.step-sec-ext').not(currentSectionext).hide();
//   $('section.step-sec-ext:last-child()').next('#next-ext').hide();
});

});


// hamza js 
