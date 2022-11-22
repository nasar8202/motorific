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
    if(count > 0){
        count--;
    }
    input.value = count;
    span.textContent = `${count}`
}



$(document).ready(function() {
    
    $('.step1-btn-save').click(function() {
        $('.advert-details-form').removeClass('show');
        $('.advert-details-form.step2').addClass('show');
    });
    $('.step2-btn-save').click(function() {
        $('.advert-details-form').removeClass('show');
        $('.advert-details-form.step3').addClass('show');
    });
    $('.step2-back-btn').click(function() {
        $('.advert-details-form').removeClass('show');
        $('.advert-details-form.step1').addClass('show');
    });
    $('.step3-btn-save').click(function() {
        $('.advert-details-form').removeClass('show');
        $('.advert-details-form.step4').addClass('show');
    });
    $('.step3-back-btn').click(function() {
        $('.advert-details-form').removeClass('show');
        $('.advert-details-form.step2').addClass('show');
    });
    $('.step4-back-btn').click(function() {
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



$(document).ready(function() {

    $('.multiselect-label').on('click', function() {
        this.parentNode.children[2].children[0].children[0].click();
        return false;
    });
    
    $('.interiorSelect-step4').select2();
    $('.multi-select-step4').on('select2:close', function() {
        const $select = $(this);
        const numSelected = $select.select2('data').length;
        this.parentNode.children[0].children[0].children[0].textContent =  `( ${numSelected} Selected)`;
        console.log('numSelected ',numSelected);
        console.log('this ',this.parentNode.children[0].children[0].children[0]);
    });
    
    $('.exteriorSelect-step4').select2();
    $('.audioSelect-step4').select2();
    $('.driverAssistanceSelect-step4').select2();
    $('.illuminationSelect-step4').select2();

    $('.performanceSelect-step4').select2();
    $('.safetySelect-step4').select2();
    

});


$(document).ready(function(){
    $('.btn-icon').click(function(){
        $('.row.header-nav-row').toggleClass('show');
    })
})



