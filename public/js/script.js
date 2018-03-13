
$(document).ready(function(){

    $(".dishAJAX").submit(function(event) {
        event.preventDefault();

        let sum = Number($("#cartTotal").text());

        let data = $(this).serializeArray();

        // SENDING DATA WITH AJAX TO OTHER PHP
        $.ajax({
            method: "POST",
            url: "/carts",
            data: data,
            success: function(data){
                let items = $("#cartContent").text();
                items++;
                $("#cartContent").text(items);
                sum += Number(data);
                $("#cartTotal").text(sum.toFixed(2));

                let alert = $('<div class="alert alert-warning" style="position:fixed; width:90%; left:0; right:0; z-index: 5; margin: 0 auto; top: 50px;" role="alert">');
                alert.html('Succesfully added to cart');

                alert.hide();
                $('body .alert').remove();
                $('body').prepend(alert.fadeIn());
            },
            error: function(response){
                console.log(response);
            },
        });
    });


    // checkReservations();
});

function checkReservations(){
    setInterval(function(){
        $.ajax({
            method: "GET",
            url: "/reservations/check",
            success: function(data){
                $('#reservations').html(data);
            },
            error: function(response){
                // console.log(response);
            },
        });

    },2000);
}
