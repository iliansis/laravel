$('form#regForm').on('submit',function(e){
    e.preventDefault();

    let info=$(this).serializeArray();
    console.log(info);
     if(info[4].value==info[5].value){
         $.ajax({
             url:$(this).attr('action'),
             type:$(this).attr('method'),
             data:info,
             success:function(res){
                 console.log(res);
             }, error:function(res){
                console.log(res);
             }
         });
     } else {
         $('input#pass1').addClass('is-invalid');
         $('input#pass2').addClass('is-invalid');
         $('div#errorPass').text('Пароли не совпадают');
     }

})

