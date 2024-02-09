$('.icon').click(function(){
    $('.icon').toggleClass('visible');
    if ($(this).hasClass('visible')) {
        $('#password').attr('type', 'text');
        $(this).css('background-image', 'url("free-icon-hide-2767146.png")');
    }else{
        $('#password').attr('type', 'password');
        $(this).css('background-image', 'url("free-icon-eye-158746.png")');
    }
});

$('.icon_reply').click(function(){
    $(this).toggleClass('visible');
    if ($(this).hasClass('visible')) {
        $('#password_reply').attr('type', 'text');
        $(this).css('background-image', 'url("free-icon-hide-2767146.png")');
    }else{
        $('#password_reply').attr('type', 'password');
        $(this).css('background-image', 'url("free-icon-eye-158746.png")');
    }
});

$('.icon_now').click(function(){
    $(this).toggleClass('visible');
    if ($(this).hasClass('visible')) {
        $('#password_now').attr('type', 'text');
        $(this).css('background-image', 'url("free-icon-hide-2767146.png")');
    }else{
        $('#password_now').attr('type', 'password');
        $(this).css('background-image', 'url("free-icon-eye-158746.png")');
    }
});

$('#set_price').click(function(){
    let adult = Number($('#Adult').val());
    let children = Number($('#Children').val());
    let price = Number($('#Price2').val());
    if ($('.checkbox').is(":checked") === false) {
        let result = price * adult + price * children * 0.8;
        $('#Price').attr('value', result);
        console.log('ne');
    }else{
        if (adult > 0) {
            let result = price * adult + price * children * 0.8 + price * 0.3;
            $('#Price').attr('value', result);   
        }else{
        }
        
       
        console.log('da');
    }
    
    console.log($('.checkbox').is(":checked"));
    // console.log($('#Price').val());
})

