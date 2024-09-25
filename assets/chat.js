var loadpath = "assets/load/";

function delay(time){
    return new Promise(resolve => setTimeout(resolve, time));
}
function preload(arrayOfImages) {
    $(arrayOfImages).each(function(){
        $('<img/>')[0].src = this;
    });
}
preload([
    loadpath + "0.gif",loadpath + "1.gif",loadpath + "2.gif",loadpath + "3.gif",loadpath + "4.gif",loadpath + "5.gif",loadpath + "6.gif",
    loadpath + "7.gif",loadpath + "8.gif",loadpath + "9.gif",loadpath + "10.gif",loadpath + "11.gif",loadpath + "12.gif",loadpath + "13.gif",
    loadpath + "14.gif",loadpath + "15.gif",loadpath + "16.gif",loadpath + "17.gif",loadpath + "18.gif",loadpath + "19.gif",loadpath + "20.gif",
    loadpath + "21.gif",loadpath + "22.gif",loadpath + "23.gif",loadpath + "24.gif",loadpath + "25.gif"
]);

$(document).ready(function() {

    $("#chat").click( function() {
        var imgid = Math.floor(Math.random() * 25);
        $("#preload").attr("src",loadpath + imgid +".gif");
        $("#preload").show();


        var input = $("#input").val();
            console.log("Send request to API: "+input);
        backend_url = 'chat.php'
            if (upload_status) {
                backend_url = 'image.php'
            }

        $.ajax({
            type: 'POST',
            data: { request: input, image: upload_url },
            url: backend_url,
            async: true,

            success: function(result){
                $("#preload").hide();
                $("#response").html(result);
            },

            error: function(error){
                alert("Request failed "+error);
            }
        });

        }
    );

});
