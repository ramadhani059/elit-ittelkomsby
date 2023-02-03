$(document).ready(function () {
    let rules = new Object();
    let messages = new Object();

    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than {0} byte');

    rules['photoaksesjurnal']={
        required: true
    };
    messages['photoaksesjurnal']={ required: 'This field is required' };
    rules['judulaksesjurnal']={
        required: true
    };
    messages['judulaksesjurnal']={ required: 'This field is required' };
    rules['link']={
        required: true
    };
    messages['link']={ required: 'This field is required' };
    rules['kategoriaksesjurnal']={
        required: true
    };
    messages['kategoriaksesjurnal']={ required: 'This field is required' };


    myValidate();

    function myValidate () {
        var validator = $("#AksesJurnalForm").validate();
        console.log('rules', rules);
        console.log('messages', messages);
        validator.destroy();
        $("#AksesJurnalForm").validate({
            rules: rules,
            messages: messages,
            errorPlacement: function(error, element) {
                Object.keys(rules).forEach((value) => {
                    console.log(value);
                    console.log(element.attr("name"));
                    if (element.attr("name") == value)
                        $("#"+value+"-errorMsg").html(error);
                });

            }
        });
    }
});
