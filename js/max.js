$('#file').on('keyup', function() {
    limitText(this, 10)
});

function limitText(field, maxChar) {
    var ref = $(field),
        val = ref.val();
    if (val.length >= maxChar) {
        ref.val(function() {
            console.log(val.substr(0, maxChar))
            return val.substr(0, maxChar);
        });
    }
}
$("file").validate({
            rules: {
                field: {
                    minlength: 3
                }