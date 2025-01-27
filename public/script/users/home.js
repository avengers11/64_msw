// checkbox
$('#checkbox').click(function () {
    window.location.href = urls.content18;
});


// swiper
var swiper = new Swiper(".mySwiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 3000
    }
});

$("#search_products").keyup(function () {
    // ajax
    $.ajax({
        "url": urls.search,
        "method": "POST",
        "data": {
            "where": $("#where").val(),
            "type": $("#checkbox").val(),
            "search": $("#search_products").val()
        },
        success: function (data) {
            var map_data = data.data;
            if (map_data.length == 0) {
                $("#all_products_wrapper").html("<h4 class='text-danger title col-12'>No products found!</h4>");
            } else {
                let viewData = map_data.map((curE) => {
                    return `
                    <a href="${curE.links}" class="col-4 mt-3">
                        <img class="images" src="${urls.url}/images/products/${curE.pic}" alt="">
                        <h2 class="title">${curE.name}</h2>
                    </a>
                    `
                });
                $("#all_products_wrapper").html(viewData);
            }
        }
    });
});


// search
$("#search_input").keyup(function () {
    let urls = $("#hidden_value").val();
    let data = $("#search_input").val();
    $("#search_data").attr("href", urls + data);
});

$("#Change_Color").click(function () {
    $("#colo_box").click();
});

$("#colo_box").change(function () {
    $(".home_header").css("background", $(this).val());

    // ajax
    $.ajax({
        "url": urls.home_bg,
        "method": "POST",
        "data": {
            "bg_color": $(this).val()
        },
        success: function (data) { }
    });

});


$(".products_access").click(function () {
    $("#hidden_wrapper").removeClass('d-none');
});


$(".hidden_wrapper").click(function () {
    $("#hidden_wrapper").addClass('d-none');
});



$("#hidden_wrapper").click(function () {
    setTimeout(() => {
        $("#hidden_wrapper").addClass('d-none');
    }, 500);
});


$(document).on("click", ".copy-wrapper", function(){
    const textInput = $(this).find(".copy-number").text();
    console.log(textInput);
    
    $(this).find(".copy-number").text("Coping...");
    const tempInput = document.createElement("textarea");
    tempInput.value = textInput;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999);
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    setTimeout(() => {
        $(this).find(".copy-number").text(textInput);
    }, 200);
})