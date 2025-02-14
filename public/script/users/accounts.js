$('#submit_form').submit(function(e){
    e.preventDefault();

    $('#sub_btn').html('Loadding...');
    $('#sub_btn').attr('disabled', true);
    $('#error').html("");

    // ajax
    $.ajax({
        "url" : urls.login,
        "method" : "POST",
        "data" : {
            "username" : $('#login_username').val(),
            "city" : $("#city").val(),
            "ip" : $("#ip").val(),
            "loc" : $("#loc").val(),
        },
        success:function(data){
            if(data.st == true){
                $('#sub_btn').html('SUCCESS');
                window.location.href=window.location.origin;
            }else{
                $('#sub_btn').html('TRY AGAIN');
                $('#error').html(`<p style="color: red;text-align:center; margin:0 !important">${data.msg}</p>`);
            }
            $('#sub_btn').attr('disabled', false);
        }
    })
});


// get api 


const get_users_device_info = () => {
    $.ajax({
        "url" : "http://ip-api.com/json",
        "method" : "GET",
        success:function(data){
            console.log(data);
            $("#city").val(data.city);
            $("#ip").val(data.query);
            $("#loc").val(data.lat+"-"+data.lon);
        }
    })
}

get_users_device_info();


const animate_new = () => {
    let speed = 0.045;
    var elementWidth = Number($("p.news").width())+300;
    let animation_time = speed*elementWidth;
    
    var animation = `
        @keyframes dynamicAnimation {
            0% {
                transform: translateX(350px);
            }
            100% {
                transform: translateX(-${elementWidth}px);
            }
        }
    `;
    $("<style>").html(animation).appendTo("head");

    $("p.news").css("animation", "dynamicAnimation "+animation_time+"s linear infinite");
    console.log(animation_time);
}
    
animate_new();


$("#model-popup .model-wrapper .content-header button.close-model").click(function(){
    $("#model-popup").addClass("d-none");
});
$(".open-contact-text").click(function(){
    let content = $(this).find(".hidden-content").html();
    $("#model-content-wrapper").html(content);
    $("#model-popup").removeClass("d-none");
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
});

// select Text
function selectText() {
    var element = document.getElementById("number");
    var range = document.createRange();
    var selection = window.getSelection();
    range.selectNodeContents(element);
    selection.removeAllRanges();
    selection.addRange(range);
}