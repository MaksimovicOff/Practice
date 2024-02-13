$('.icon').click(function(){
    $('.icon').toggleClass('visible');
    if ($(this).hasClass('visible')) {
        $('#password').attr('type', 'text');
        $(this).css('background-image', 'url("../img/free-icon-hide-2767146.png")');
    }else{
        $('#password').attr('type', 'password');
        $(this).css('background-image', 'url("../img/free-icon-hide-2767146.png")');
    }
});

$('.icon_reply').click(function(){
    $(this).toggleClass('visible');
    if ($(this).hasClass('visible')) {
        $('#password_reply').attr('type', 'text');
        $(this).css('background-image', 'url("../img/free-icon-hide-2767146.png")');
    }else{
        $('#password_reply').attr('type', 'password');
        $(this).css('background-image', 'url("../img/free-icon-hide-2767146.png")');
    }
});

$('.icon_now').click(function(){
    $(this).toggleClass('visible');
    if ($(this).hasClass('visible')) {
        $('#password_now').attr('type', 'text');
        $(this).css('background-image', 'url("../img/free-icon-hide-2767146.png")');
    }else{
        $('#password_now').attr('type', 'password');
        $(this).css('background-image', 'url("../img/free-icon-hide-2767146.png")');
    }
});

$('#set_price').click(function(){
    let adult = Number($('#Adult').val());
    let children = Number($('#Children').val());
    let price = Number($('#Price2').val());
    let select = Number($('#class').val());
    let role = Number($('#role').val());
    console.log(select);
    if ($('.checkbox').is(":checked") === false) {
        if (select === 1) {
            if (role === 1) {
                let result = price * adult + price * children * 0.8;
                $('#Price').attr('value', result);
                console.log('ne');
            }
            if (role > 1) {
                let result = (price * adult + price * children * 0.8) * 0.8;
                $('#Price').attr('value', result);
                console.log('ne');  
            }
            
        }if (select === 2) {
            if (role === 1) {
                let result = price * adult + price * children * 0.8 + price * 0.5;
                $('#Price').attr('value', result);
                console.log('ne');     
            }
            if (role > 1) {
                let result = (price * adult + price * children * 0.8 + price * 0.5) * 0.8;
                $('#Price').attr('value', result);
                console.log('ne');     
            }
               
        }
        
    }else{
        if (adult > 0) {
            if (select === 1) {
                if (role === 1) {
                    let result = price * adult + price * children * 0.8 + price * 0.3;
                    $('#Price').attr('value', result);     
                }
                if (role > 1) {
                    let result = (price * adult + price * children * 0.8 + price * 0.3) * 0.8;
                    $('#Price').attr('value', result);     
                }  
            }if (select === 2) {
                if (role === 1) {
                    let result = price * adult + price * children * 0.8 + price * 0.3 + price * 0.5;
                    $('#Price').attr('value', result);   
                }
                if (role > 1) {
                    let result = (price * adult + price * children * 0.8 + price * 0.3 + price * 0.5) * 0.8;
                    $('#Price').attr('value', result);
                }
                   
            }
              
        }else{
        }
        
       
        console.log('da');
    }
    
    console.log($('.checkbox').is(":checked"));
    // console.log($('#Price').val());
})

