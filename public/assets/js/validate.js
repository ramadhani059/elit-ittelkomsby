$(document).ready(function () {

    $('#jenisanggota').on('change',function(){
        var contoh = $(this).find('option:selected').val();

        var rules = new Object();
        var messages = new Object();
        var errorPlacement = new Object();

        $('input[name="email_register_'+ contoh +'"]').each(function() {
            rules[this.name] = { required: true };
            console.log(contoh);
            messages[this.name] = { required: 'This field is required' };
            errorPlacement = function(error, element) {
                if (element.attr("name") == "email_register_"+contoh)
                    $("#email_register_"+contoh+"-errorMsg").html(error);
            }
        });

        $("#registerForm").validate({
            rules: rules,
            messages: messages,
            errorPlacement: errorPlacement,
        });
    });

    // var contoh = 1;

    // $("#registerForm").validate({
    //     errorElement: "span",
    //     rules: {
    //         fullname: {
    //             required: true
    //         },
    //         password_register: {
    //             required: true,
    //             minlength: 8,
    //         },
    //         telp: {
    //             required: true,
    //             digits: true,
    //         },
    //         address: {
    //             required: true,
    //         },
    //         jenisanggota: {
    //             required: true,
    //         },
    //         "namainstitusi_":{
    //             required: true,
    //         },
    //         namainstitusi_2:{
    //             required: true,
    //         },
    //         email_register_1: {
    //             required: true,
    //             email: true,
    //         },
    //         filektp_1:{
    //             required: true,
    //             extension: "png|jpe?g|gif"
    //         },
    //         filekarpegktm_1:{
    //             required: true,
    //             extension: "png|jpe?g|gif"
    //         },
    //         fileijazah_3:{
    //             required: true,
    //             extension: "docx|rtf|doc|pdf"
    //         },
    //     },
    //     errorPlacement: function (error, element) {
    //         if (element.attr("name") == "fullname")
    //             $("#fullname-errorMsg").html(error);
    //         if (element.attr("name") == "password_register")
    //             $("#password_register-errorMsg").html(error);
    //         if (element.attr("name") == "telp")
    //             $("#telp-errorMsg").html(error);
    //         if (element.attr("name") == "address")
    //             $("#address-errorMsg").html(error);
    //         if (element.attr("name") == "jenisanggota")
    //             $("#jenisanggota-errorMsg").html(error);
    //         if (element.attr("name") == "namainstitusi_1")
    //             $("#namainstitusi_1-errorMsg").html(error);
    //         if (element.attr("name") == "namainstitusi_2")
    //             $("#namainstitusi_2-errorMsg").html(error);
    //         if (element.attr("name") == "email_register_1")
    //             $("#email_register_1-errorMsg").html(error);
    //         if (element.attr("name") == "filektp_1")
    //             $("#filektp_1-errorMsg").html(error);
    //         if (element.attr("name") == "filekarpegktm_1")
    //             $("#filekarpegktm_1-errorMsg").html(error);
    //         if (element.attr("name") == "fileijazah_3")
    //             $("#fileijazah_3-errorMsg").html(error);
    //     },
    // });
});
