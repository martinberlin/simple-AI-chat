
$(document).ready(function() {

    const selectFile = document.getElementById("selectFile");
    selectFile.onchange = function() {
        document.getElementById("upload").submit();
    };

})