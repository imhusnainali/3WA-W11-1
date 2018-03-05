function addToCart(){
    $(this).on('submit',function(){
        $.ajaxSetup({
                header:$('meta[name="_token"]').attr('content')
            })
            e.preventDefault(e);

                $.ajax({

                type:"POST",
                url:'/carts',
                data:$(this).serialize(),
                dataType: 'json',
                success: function(data){
                    console.log(data);
                },
                error: function(data){

                }
            })
            });
    };
