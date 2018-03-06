
$(document).ready(function(){

    $(".dishAJAX").submit(function(event) {
        let price = 0;
        let sum = Number($("#cartTotal").text());

        event.preventDefault();

        var data = $(this).serializeArray();

        for(let i = 0; i < data.length; i++){
            if(data[i].name == 'dishPrice'){
                price = Number(data[i].value);
                break;
            };
        };

        // SENDING DATA WITH AJAX TO OTHER PHP
        $.ajax({
            method: "POST",
            url: "/carts",
            data: data,
            success: function(data){
                let items = $("#cartContent").text();
                items++;
                $("#cartContent").text(items);
                sum += price;
                $("#cartTotal").text(sum);
            },
            error: function(response){
                console.log(response);
            },
        });
    });
});
