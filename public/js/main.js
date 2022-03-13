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

$('form#addOrder').on('submit',function(e){
    e.preventDefault();

    var formData = new FormData($('form#addOrder').get(0));

    // let info=$(this).serializeArray();
   
        $.ajax({
            url:$(this).attr('action'),
            type:$(this).attr('method'),
            cache:false,
            contentType:false,
            processData:false,
            data:formData,
            success:function(res){
                window.location.href='/';
            }, 
            error:function(res){
               $.each(res.responseJSON['errors'],function(index,value){
                   $('form#addOrder input[name="' + index + '"]').addClass('is-invalid');
                   $('div#' + index + 'Error').text(value); 

                   if (index=='form'){
                    $('div#' + index + 'Error').slideDown(300);
                } else {
                 $('form#addOrder input[name="' + index + '"]').addClass('is-invalid');
                 $('div#' + index + 'Error').text(value);
                }
               })
               
                            
            }
        });

});

$('select#filter').change(function(){
    let status = $(this).val();

    
    $.ajax({
        url:$(this).attr('action'),
        type:$(this).attr('method'),
        data:{status: status},
        success:function(res){
           $('div#orders').html(res);
        }, 
        error:function(res){
           $.each(res.responseJSON['errors'],function(index,value){
               $('form#addOrder input[name="' + index + '"]').addClass('is-invalid');
               $('div#' + index + 'Error').text(value); 

               if (index=='form'){
                $('div#' + index + 'Error').slideDown(300);
            } else {
             $('form#addOrder input[name="' + index + '"]').addClass('is-invalid');
             $('div#' + index + 'Error').text(value);
            }
           })
           
                        
        }
    });
})
