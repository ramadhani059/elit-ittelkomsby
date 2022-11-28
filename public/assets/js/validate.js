$(document).ready(function () {
    let rules = new Object();
    let messages = new Object();

    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than {0} byte');

    rules['fullname']={
        required: true
    };
    messages['fullname']={ required: 'This field is required' };
    rules['password_register']={
        required: true,
        minlength: 8,
    };
    messages['password_register']={ required: 'This field is required' };
    rules['telp']={
        required: true,
        digits: true,
    };
    messages['telp']={ required: 'This field is required' };
    rules['address']={
        required: true
    };
    messages['address']={ required: 'This field is required' };
    rules['jenisanggota']={
        required: true
    };
    messages['jenisanggota']={ required: 'This field is required' };
    rules['level']={
        required: true
    };
    messages['level']={ required: 'This field is required' };
    rules['emailadmin']={
        required: true,
        email: true,
    };
    messages['emailadmin']={ required: 'This field is required' };
    rules['email']={
        required: true,
        email: true,
    };
    messages['email']={ required: 'This field is required' };
    rules['filektp_admin']={
        required: true,
        extension: "png|jpe?g|gif",
        filesize: 3145728,
    };
    messages['filektp_admin']={
        required: 'This field is required',
        extension: 'Format yang diterima : png, jpg, jpeg, gif ',
        filesize: 'File size must be less than 3 MB',
    };
    rules['filekarpegktm_admin']={
        required: true,
        extension: "png|jpe?g|gif",
        filesize: 3145728,
    };
    messages['filekarpegktm_admin']={
        required: 'This field is required',
        extension: 'Format yang diterima : png, jpg, jpeg, gif ',
        filesize: 'File size must be less than 3 MB',
    };
    rules['namajeniskeanggotaan']={
        required: true
    };
    messages['namajeniskeanggotaan']={ required: 'This field is required' };

    $('#jenisanggota').on('change',function(){
        const contoh = $(this).find('option:selected').val();

        // var rules = new Object();
        // var messages = new Object();
        // var errorPlacement = new Object();
        // rules['fullname']={ required: true };
        // messages['fullname']={ required: 'This field is required' };

        rules['namainstitusi_'+contoh]={ required: true };
        messages['jenisanggota'+contoh]={ required: 'This field is required' };


        $('input[name="email_register_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
                email: true,
            };
            console.log(contoh);
            messages[this.name] = { required: 'This field is required' };
        });

        $('input[name="filektp_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
                extension: "png|jpe?g|gif",
                filesize: 3145728,
            };
            console.log(contoh);
            messages[this.name] = {
                required: 'This field is required',
                extension: 'Format yang diterima : png, jpg, jpeg, gif ',
                filesize: 'File size must be less than 3 MB',
            };
        });

        $('input[name="filekarpegktm_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
                extension: "png|jpe?g|gif",
                filesize: 3145728,
            };
            console.log(contoh);
            messages[this.name] = {
                required: 'This field is required',
                extension: 'Format yang diterima : png, jpg, jpeg, gif ',
                filesize: 'File size must be less than 3 MB',
            };
        });

        $('input[name="fileijazah_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
                extension: "pdf",
                filesize: 10485760,
            };
            console.log(contoh);
            messages[this.name] = {
                required: 'This field is required',
                extension: 'Format yang diterima : pdf',
                filesize: 'File size must be less than 10 MB',
            };
        });

        $('input[name="tambahinstitusi_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
            };
            console.log(contoh);
            messages[this.name] = { required: 'This field is required' };
        });

        $('input[name="fakultas_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
            };
            console.log(contoh);
            messages[this.name] = { required: 'This field is required' };
        });

        $('input[name="jurusan_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
            };
            console.log(contoh);
            messages[this.name] = { required: 'This field is required' };
        });

        myValidate();

        // $("#registerForm").validate({
        //     rules: rules,
        //     messages: messages,
        //     errorPlacement: errorPlacement,
        // });
    });



    myValidate();

    function myValidate () {
        var validator = $("#registerForm").validate();
        console.log('rules', rules);
        console.log('messages', messages);
        validator.destroy();
        $("#registerForm").validate({
            rules: rules,
            messages: messages,
            errorPlacement: function(error, element) {
                console.log('element', element);
                console.log('element', error);
                Object.keys(rules).forEach((value) => {
                    console.log(value);
                    console.log(element.attr("name"));
                    if (element.attr("name") == value)
                        $("#"+value+"-errorMsg").html(error);
                });

            }
        });
    }



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
    //         // email_register_1: {
    //         //     required: true,
    //         //     email: true,
    //         // },
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
    //         // if (element.attr("name") == "email_register_1")
    //         //     $("#email_register_1-errorMsg").html(error);
    //         if (element.attr("name") == "filektp_1")
    //             $("#filektp_1-errorMsg").html(error);
    //         if (element.attr("name") == "filekarpegktm_1")
    //             $("#filekarpegktm_1-errorMsg").html(error);
    //         if (element.attr("name") == "fileijazah_3")
    //             $("#fileijazah_3-errorMsg").html(error);
    //     },
    // });
});
