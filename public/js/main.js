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
        url:'/profile/filter',
        type:'POST',
        data:{status: status},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success:function(res){
           $('div#orders').html(res);
        // console.log(res);
        }, 
        error:function(res){
            console.log(res);
                        
        }
    });
})


$('form#addCats').on('submit',function(e){
    e.preventDefault();

    var formData = new FormData($('form#addCats').get(0));

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
                   $('form#addCats input[name="' + index + '"]').addClass('is-invalid');
                   $('div#' + index + 'Error').text(value); 

                   if (index=='form'){
                    $('div#' + index + 'Error').slideDown(300);
                } else {
                 $('form#addCats input[name="' + index + '"]').addClass('is-invalid');
                 $('div#' + index + 'Error').text(value);
                }
               })
               
                            
            }
        });

});


$('select#change').change(function(){
    let info=$(this).val();

    id = $(this).attr("data-id")
    console.log(info)
    
    if(info=='Принято в работу'){
         $('div#formPhoto'+id).slideUp(300);
		$('div#formDesc'+id).slideDown(300);
        console.log($(id))
    } else{
        if(info=='Выполнено'){
            $('div#formPhoto'+id).slideDown(300);
            $('div#formDesc'+id).slideUp(300);
        } else{
            $('div#formPhoto'+id).slideUp(300);
            $('div#formDesc'+id).slideUp(300); 
        }
    }
}
	
	   
);


$('form#change').on('submit',function(e){
    e.preventDefault();

    var formData = new FormData($('form#addOrder').get(0));

    
   
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

