$('form#reg').on('submit',function(e){
    e.preventDefault();

    let info=$(this).serializeArray();
   
        $.ajax({
            url:$(this).attr('action'),
            type:$(this).attr('method'),
            data:info,
            success:function(res){
                window.location.href='../';
            }, error:function(res){
                $('form#reg input').removeClass('is-invalid');
               $.each(res.responseJSON['errors'],function(index,value){
                   $('form#reg input[name="' + index + '"]').addClass('is-invalid');
                   $('div#' + index + 'Error').text(value);
               })                            
            }
        });

});


$('form#auth').on('submit',function(e){
    e.preventDefault();

    let info=$(this).serializeArray();
   
        $.ajax({
            url:$(this).attr('action'),
            type:$(this).attr('method'),
            data:info,
            success:function(res){
                window.location.href='/';
            }, 
            error:function(res){
               $.each(res.responseJSON['errors'],function(index,value){
                   $('form#auth input[name="' + index + '"]').addClass('is-invalid');
                   $('div#' + index + 'Error').text(value); 

                   if (index=='form'){
                    $('div#' + index + 'Error').slideDown(300);
                } else {
                 $('form#auth input[name="' + index + '"]').addClass('is-invalid');
                 $('div#' + index + 'Error').text(value);
                }
               })
               
                            
            }
        });

});

