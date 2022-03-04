$('form#reg').on('submit',function(e){
    e.preventDefault();

    let info=$(this).serializeArray();
    // console.log(info);
     
    //  } else {
    //      $('input[name=login]').addClass('is-invalid');
    //      $('input[name=pass1]').addClass('is-invalid');
    //      $('input[name=pass2]').addClass('is-invalid');
    //      $('div#errorPass').text('Пароли не совпадают');
    //  }

    if(info[4].value==info[5].value){
        $.ajax({
            url:$(this).attr('action'),
            type:$(this).attr('method'),
            data:info,
            success:function(res){
                console.log(res);
            }, error:function(res){
               console.log(res.responseJSON['errors']);
               $.each(res.responseJSON['errors']);               
            }
        });

});

