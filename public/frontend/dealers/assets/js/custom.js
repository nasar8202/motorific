

// Producst Card Equal Height
$(document).ready(function () {
  $('.product-card').matchHeight();
});


// Brands Carousel
$('.brands-slider').slick({
  dots: false,
  infinite: true,
  autoplay: true,
  speed: 300,
  slidesToShow: 7,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]
});


// End


// Products Carousel
$('.procuts-wraper .products-slide').slick({
  dots: true,
  infinite: true,
  autoplay: true,
  speed: 1000,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


// End

// Testimonial  Carousel
$('.testi-wraper').slick({
  dots: true,
  infinite: true,
  autoplay: true,
  speed: 500,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


// End



// Step Form Toggle by As
$(document).ready(function () {
  $('.form-wraper').hide();
  $(".form-toggle-btn").click(function () {
    $(this).parent().parent().next('.form-wraper').slideToggle(500);
  });
});
// End

function getFileName(e) {
  let file = e.files[0]
  let image = e.parentNode.children[1]
  let reader = new FileReader();
  reader.onload = function () {
    image.setAttribute('src', `${reader.result}`)
  }
  reader.readAsDataURL(file);
}



function increment(e) {
  let input = e.parentNode.parentNode.children[0].children[0];
  let span = e.parentNode.parentNode.children[0].children[1];
  let count = input.value
  count++;
  input.value = count;
  span.textContent = `${count}`
}

function decrement(e) {
  let input = e.parentNode.parentNode.children[0].children[0];
  let span = e.parentNode.parentNode.children[0].children[1];
  let count = input.value
  if (count > 0) {
    count--;
  }
  input.value = count;
  span.textContent = `${count}`
}



$(document).ready(function () {

  $('.step1-btn-save').click(function () {
    $('.advert-details-form').removeClass('show');
    $('.advert-details-form.step2').addClass('show');
  });
  $('.step2-btn-save').click(function () {
    $('.advert-details-form').removeClass('show');
    $('.advert-details-form.step3').addClass('show');
  });
  $('.step2-back-btn').click(function () {
    $('.advert-details-form').removeClass('show');
    $('.advert-details-form.step1').addClass('show');
  });
  $('.step3-btn-save').click(function () {
    $('.advert-details-form').removeClass('show');
    $('.advert-details-form.step4').addClass('show');
  });
  $('.step3-back-btn').click(function () {
    $('.advert-details-form').removeClass('show');
    $('.advert-details-form.step2').addClass('show');
  });
  $('.step4-back-btn').click(function () {
    $('.advert-details-form').removeClass('show');
    $('.advert-details-form.step3').addClass('show');
  });


});


$(function () {
  $("#add_more_history_btn").click(function () {
    $("#history_fields_list").append(`
            <div class="history-fields-main d-flex align-items-center">
                <div class="history-fields">
                    <input type="date" id="date_step4">
                    <input type="text" id="millage_step4" placeholder="Dealership name" >
                    <input type="text" id="dealership_step4">
                    <input type="text" id="comment_step4">
                </div>
                <button type="button" class="btn-icon" onclick="deleteHistory(this)" > <i class="fa-solid fa-trash-can" ></i> </button>
            </div>
        `)
  });
})


function deleteHistory(e) {
  e.parentNode.remove()
}



$(document).ready(function () {

  $('.multiselect-label').on('click', function () {
    this.parentNode.children[2].children[0].children[0].click();
    return false;
  });

  $('.interiorSelect-step4').select2();
  $('.multi-select-step4').on('select2:close', function () {
    const $select = $(this);
    const numSelected = $select.select2('data').length;
    this.parentNode.children[0].children[0].children[0].textContent = `( ${numSelected} Selected)`;
    console.log('numSelected ', numSelected);
    console.log('this ', this.parentNode.children[0].children[0].children[0]);
  });

  $('.exteriorSelect-step4').select2();
  $('.audioSelect-step4').select2();
  $('.driverAssistanceSelect-step4').select2();
  $('.illuminationSelect-step4').select2();

  $('.performanceSelect-step4').select2();
  $('.safetySelect-step4').select2();


});


$(document).ready(function () {
  $('.btn-icon').click(function () {
    $('.row.header-nav-row').toggleClass('show');
    $('body').toggleClass('overflow-hidden');
  })
})



// hamza js 

$(document).ready(function () {


  var child = 1;
  var length = $("section.step-sec").length - 1;
  $("#prev").addClass("disabled");
  $("#submit").addClass("disabled");

  $("section.step-sec").not("section.step-sec:nth-of-type(1)").hide();
  $("section.step-sec").not("section.step-sec:nth-of-type(1)").css('transform', 'translateX(100px)');


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
    currentSection.css('transform', 'translateX(0)');
    currentSection.prevAll('section.step-sec').css('transform', 'translateX(-100px)');
    currentSection.nextAll('section.step-sec').css('transform', 'translateX(100px)');
    $('section.step-sec').not(currentSection).hide();
    $('section.step-sec:last-child()').next('#next').hide();
  });


  // exterior ==================



  var childext = 1;
  var lengthext = $("section.step-sec-ext").length - 1;
  $("#prev-ext").addClass("disabled");
  $("#submit-ext").addClass("disabled");

  $("section.step-sec-ext").not("section.step-sec-ext:nth-of-type(1)").hide();
  $("section.step-sec-ext").not("section.step-sec-ext:nth-of-type(1)").css('transform', 'translateX(100px)');


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
    currentSectionext.css('transform', 'translateX(0)');
    currentSectionext.prevAll('section.step-sec-ext').css('transform', 'translateX(-100px)');
    currentSectionext.nextAll('section.step-sec-ext').css('transform', 'translateX(100px)');
    $('section.step-sec-ext').not(currentSectionext).hide();
    //   $('section.step-sec-ext:last-child()').next('#next-ext').hide();
  });

});

// hide and show 

// jQuery('.step-main-wrap').fadeOut();
// jQuery('.parts-no').click(function(){
//     jQuery(this).parents('.parts-hide-show').next('.step-main-wrap').fadeOut();
// });
// jQuery('.parts-yes').click(function(){
//    jQuery(this).parents('.parts-hide-show').next('.step-main-wrap').fadeIn();
// });

// hamza js 




// Multiple Files Upload Show



///////////// FINAL FUNCTION FOR UPLOADING FILE  /////////////



let fileListArr;
function uploadFile(elem) {
  let files = elem.files;
  console.log('files ', elem.files)
  let imgsDiv = elem.nextElementSibling.nextElementSibling.nextElementSibling;
  imgsDiv.innerHTML = ''
  let errorDiv = elem.nextElementSibling.nextElementSibling;
  fileListArr = Array.from(files)
  if (fileListArr.length > 5) {
    fileListArr = '';
    elem.value = '';
    errorDiv.textContent = 'Select Upto 5 images Only';
  }
  else {
    errorDiv.textContent = '';
    fileListArr.forEach(function (f) {
      if (!f.type.match("image.*")) {
        return;
      }
      var reader = new FileReader();
      reader.onload = function (e) {
        imgsDiv.innerHTML += "<div class='image-box'  ><img src=\"" + e.target.result + "\"> <button type='button' onclick='Remove(this)' class='remove-img-btn'>X</div>";
      }
      reader.readAsDataURL(f);
    });
  }
}


function Remove(elem) {
  // let inp = document.getElementById('selectFiles')
  let inp = elem.parentNode.parentNode.parentNode.childNodes[1]
  const dt = new DataTransfer()
  let index = $(elem).parent('.image-box').prevAll().length;
  for (let i = 0; i < inp.files.length; i++) {
    const file = inp.files[i]
    if (index !== i)
      dt.items.add(file) // here you exclude the file. thus removing it.
  }
  inp.files = dt.files;
  console.log('inp.files ', inp.files);
  fileListArr.splice(index,1)
  console.log('index ', index);
  $(elem).parent('.image-box').remove()
}



// Filter Toggle Mobile





$(document).ready(function () {
  var width = $(window).width();

  $('.filterToggle').hide();
  if (width < 767) {
    $('.filterWraper').hide();
    $('.filterToggle').show();
    $('.filterToggle').click(function () {
      $(this).parent().toggleClass('toggle_wraper');
      $('.filterWraper').slideToggle(300);
    });
  }
  else {
    $('.filterWraper').show();
  }
});




