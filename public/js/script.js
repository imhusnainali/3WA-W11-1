
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
                $("#cartTotal").text(sum);
            },
            error: function(response){
                // console.log(response);
            },
        });
    });
});
