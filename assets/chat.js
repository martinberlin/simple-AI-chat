$(document).ready(function() {

    $("#chat").click( function() {
        var input = $("#input").val();
            console.log("Send request to API: "+input);

        $.ajax({
            type: 'POST',
            data: { request: input },
            url: 'chat.php',
            async: false,

            success: function(result){
                $("#response").text(result);
            },

            error: function(error){
                alert("Request failed "+error);
            }
        });

        }
    );

});
