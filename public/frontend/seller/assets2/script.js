// Loader
var i = 0;

function move() {
  if (i == 0) {
    i = 1;
    var loadedPage = document.getElementById("loadedPage");
    var progessMain = document.getElementById("myProgress");
    var elem = document.getElementById("bar");
    var barTxt = document.getElementById("bar-txt");
    loadedPage.style.transform = "none";
    var width = 0;
    var id = setInterval(frame, 15);
    function frame() {
      if (width >= 100) {
        progessMain.style.opacity = 0.5;
        progessMain.style.display = "none";
        clearInterval(id);
        i = 0;
        // loadedPage.classList.remove("overflow-hidden");
        loadedPage.style.display = "block";
      } else {
        width++;
        // loadedPage.classList.add("overflow-hidden");
        // elem.style.width = width + "%";
        // barTxt.innerHTML = width + "%";
      }
    }
  }
}

// End

// Step Form Toggle by As
$(document).ready(function () {
  $(".form-wraper").hide();
  $(".form-toggle-btn").click(function () {
    $(this).parent().parent().parent().next(".form-wraper").slideToggle(500);
  });
});
// End

// Toggle Menu

$(document).ready(function () {
  $(".toggle").click(function () {
    $(this).toggleClass("active");
    $(".navi").toggleClass("active");
    $("body").toggleClass("overflow-hidden");
  });
});

//active class

// let menutoggle = document.querySelector('.toggle');
// let menunav = document.querySelector('.navi');
//  menutoggle.onclick = function () {
//      menutoggle.classList.toggle('active');
//     menunav.classList.toggle('active');

//  }

// function myFunction() {
//     var x = document.getElementById("myDIV");
//     $(x).slideToggle();
//   }

function myFunction2() {
    var x = document.getElementById("myDIV2");
    $(x).slideToggle();
 }

function myFunction3() {
    var x = document.getElementById("myDIV3");
    $(x).slideToggle();
}
// function myFunction4() {
//     var x = document.getElementById("myDIV4");
//     $(x).slideToggle();
// }

// function myFunction5() {
//     var x = document.getElementById("myDIV5");
//     $(x).slideToggle();
// }

// for loader
jQuery(document).ready(function ($) {
  $(window).on("load", function () {
    $(".loader-wrapper").fadeOut("slow");
  });
});

// hamza js

$(document).ready(function () {
//   var child = 1;
//   var length = $("section.step-sec-qambar").length - 1;
  $("#prev").addClass("disabled");
  $("#submit").addClass("disabled");

  $("section.step-sec-qambar").not("section.step-sec-qambar:nth-of-type(1)").hide();
  $("section.step-sec-qambar")
    .not("section.step-sec-qambar:nth-of-type(1)")
    .css("transform", "translateX(100px)");

  function makeSVG(tag, attrs) {
    var el = document.createElementNS("http://www.w3.org/2000/svg", tag);
    for (var k in attrs) el.setAttribute(k, attrs[k]);
    return el;
  }

  
  
  

  //////-----> QAMBAR FINAL JS FOR STEP FORM <-----////// 
  $(".completed-status").hide();
  var child = 1;
  
  // $(".step-button-qambar").click(function () {
  //   var classname = $(this).attr("class");
  //   var length_steps = $(this).parent().prevAll("section.step-sec-qambar").length - 1
  //   var isNextBtn = $(this).hasClass("next-qambar");
  //   var isPrevBtn = $(this).hasClass("prev-qambar");
     
  //   if (isNextBtn) {
  //     $(this).prev().removeClass("disabled");
  //     if (child > length_steps) {
  //       $(this).parent().parent().slideToggle(500);
  //       $(this).parent().parent().prev(".row").children(".col-sm-6").children(".completed-status").show();
  //       length_steps = $(this).parent().prevAll("section.step-sec-qambar").length - 1
  //       child = 1;
  //     }
  //     if (child === length_steps) {
  //       $(this).text("Submit");
  //       $(this).parent().parent().prev(".row").children(".col-sm-6").children(".f-btn").children(".form-toggle-btn").text("EDIT");
  //       $(this).parent().parent().prev(".row").children(".col-sm-6").children(".f-btn").children(".form-toggle-btn").css({ background: "#7977a2" });
  //     }
  //     if (child <= length_steps) {
  //       child++;
  //     }
  //   } 
  //   else if (isPrevBtn) {
  //     $(this).next().text("Next");
  //     $(this).next().removeClass("disabled");
  //     if (child <= 2) {
  //       $(this).addClass("disabled");
  //     }
  //     if (child > 1) {
  //       child--;
  //     }
  //   }
  //   // console.log('length_steps ',length_steps)
  //   // console.log("child ", child);
  //   var currentSection = $("section.step-sec-qambar:nth-of-type(" + child + ")");
  //   currentSection.fadeIn();
  //   currentSection.css("transform", "translateX(0)");
  //   currentSection.prevAll("section.step-sec-qambar").css("transform", "translateX(-100px)");
  //   currentSection.nextAll("section.step-sec-qambar").css("transform", "translateX(100px)");
  //   $("section.step-sec-qambar").not(currentSection).hide();
  //   $("section.step-sec-qambar:last-child()").next(".next-qambar").hide();
  // });
  
  
  
  //   $(".step-button").click(function () {
//     var id = $(this).attr("id");
//     if (id == "next") {
//       $("#prev").removeClass("disabled");
//       if (child >= length) {
//         $(this).text("Submit");
//         $(this).parent().parent().prev(".row").children(".col-sm-6").children(".f-btn").children(".form-toggle-btn").text("EDIT");
//         $(this).parent().parent().prev(".row").children(".col-sm-6").children(".f-btn").children(".form-toggle-btn").css({ background: "#7977a2" });
//         $(this).parent().parent().slideToggle(500);

//         $(".completed-status").show();
//       }
//       if (child <= length) {
//         child++;
//       }
//     } else if (id == "prev") {
//       $("#next").text("Next");
//       $("#next").removeClass("disabled");
//       $("#submit").addClass("disabled");
//       if (child <= 2) {
//         $(this).addClass("disabled");
//       }
//       if (child > 1) {
//         child--;
//       }
//     }

//     console.log("length ", length);
//     console.log("child ", child);

//     var currentSection = $("section.step-sec:nth-of-type(" + child + ")");
//     currentSection.fadeIn();
//     currentSection.css("transform", "translateX(0)");
//     currentSection
//       .prevAll("section.step-sec")
//       .css("transform", "translateX(-100px)");
//     currentSection
//       .nextAll("section.step-sec")
//       .css("transform", "translateX(100px)");
//     $("section.step-sec").not(currentSection).hide();
//     $("section.step-sec:last-child()").next("#next").hide();
//   });
  
  
  

  // exterior ==================

//   var childext = 1;
//   var lengthext = $("section.step-sec-ext").length - 1;
//   $("#prev-ext").addClass("disabled");
//   $("#submit-ext").addClass("disabled");

//   $("section.step-sec-ext").not("section.step-sec-ext:nth-of-type(1)").hide();
//   $("section.step-sec-ext")
//     .not("section.step-sec-ext:nth-of-type(1)")
//     .css("transform", "translateX(100px)");

  function makeSVG(tagext, attrsext) {
    var elext = document.createElementNS("http://www.w3.org/2000/svg", tagext);
    for (var kext in attrsext) elext.setAttribute(kext, attrsext[kext]);
    return elext;
  }

//   $(".step-button-ext").click(function () {
//     var idext = $(this).attr("id");
//     if (idext == "next-ext") {
//       $("#prev-ext").removeClass("disabled");
//       if (childext >= lengthext) {
//         $(this).addClass("disabled");
//         $("#submit-ext").removeClass("disabled");
//       }
//       if (childext <= lengthext) {
//         childext++;
//       }
//     } else if (idext == "prev-ext") {
//       $("#next-ext").removeClass("disabled");
//       $("#submit-ext").addClass("disabled");
//       if (childext <= 2) {
//         $(this).addClass("disabled");
//       }
//       if (childext > 1) {
//         childext--;
//       }
//     }

//     var currentSectionext = $(
//       "section.step-sec-ext:nth-of-type(" + childext + ")"
//     );
//     currentSectionext.fadeIn();
//     currentSectionext.css("transform", "translateX(0)");
//     currentSectionext
//       .prevAll("section.step-sec-ext")
//       .css("transform", "translateX(-100px)");
//     currentSectionext
//       .nextAll("section.step-sec-ext")
//       .css("transform", "translateX(100px)");
//     $("section.step-sec-ext").not(currentSectionext).hide();
//   });
});

// hamza js
