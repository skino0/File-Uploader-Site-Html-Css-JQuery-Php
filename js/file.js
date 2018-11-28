$(document).ready(function() {

    $("#file").on("change", function(e) {
        var files = $(this)[0].files;
        if (files.length >= 2) {
            $("#labtext").text(files.length + " Files ready to upload");

        } else {

            var filename = e.target.value.split('\\').pop();
            $("#labtext").text(filename);
        }




    });

});