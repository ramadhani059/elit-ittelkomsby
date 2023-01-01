$(document).ready(function () {
    let rules = new Object();
    let messages = new Object();

    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than {0} byte');

    rules['nama_lengkap']={
        required: true
    };
    messages['nama_lengkap']={ required: 'This field is required' };
    rules['email']={
        required: true,
        email: true,
    };
    messages['email']={ required: 'This field is required' };
    rules['address']={
        required: true,
    };
    messages['address']={ required: 'This field is required' };
    rules['tgl_pinjam']={
        required: true,
        date: true,
    };
    messages['tgl_pinjam']={ required: 'This field is required' };
    rules['no_hp']={
        required: true
    };
    messages['no_hp']={ required: 'This field is required' };
    rules['jenis_buku']={
        required: true
    };
    messages['jenis_buku']={ required: 'This field is required' };
    rules['statususer']={
        required: true
    };
    messages['statususer']={ required: 'This field is required' };
    rules['namasirkulasi']={
        required: true
    };
    messages['namasirkulasi']={ required: 'This field is required' };
    rules['bataspeminjaman']={
        required: true,
        digits: true,
    };
    messages['bataspeminjaman']={ required: 'This field is required' };
    rules['jumlahpinjam']={
        required: true,
        digits: true,
    };
    messages['jumlahpinjam']={ required: 'This field is required' };
    rules['biayasewa']={
        required: true,
        digits: true,
    };
    messages['biayasewa']={ required: 'This field is required' };
    rules['dendaharian']={
        required: true,
        digits: true,
    };
    messages['dendaharian']={ required: 'This field is required' };

    $('#jenis_buku').on('change',function(){
        const contoh = $(this).find('option:selected').val();

        $.ajax({
            url: '/getFilePlace/'+contoh,
            type: "GET",
            dataType: "json",
            success: function(fileplace){
                $.each(fileplace, function(key, value){
                    if(value.type == 'pdf'){
                        $('input[name="filepdf_'+ value.id +'_'+ contoh +'"]').each(function() {
                            rules[this.name] = {
                                extension: "pdf",
                                filesize: 10485760,
                            };
                            messages[this.name] = {
                                extension: 'Format yang diterima : pdf',
                                filesize: 'File size must be less than 10 MB',
                            };
                        });

                        myValidate();
                    }
                    if(value.type == 'fullfile'){
                        $('input[name="fullfile_'+ value.id +'_'+ contoh +'"]').each(function() {
                            rules[this.name] = {
                                required: true,
                                extension: "pdf",
                                filesize: 10485760,
                            };
                            messages[this.name] = {
                                required: 'This field is required',
                                extension: 'Format yang diterima : pdf',
                                filesize: 'File size must be less than 10 MB',
                            };
                        });

                        myValidate();
                    }
                });
            }
        });

        rules['jenis_pengadaan_'+contoh]={ required: true };
        rules['status_pengadaan_'+contoh]={ required: true };
        rules['fakultas_'+contoh]={ required: true };
        rules['prodi_'+contoh]={ required: true };
        rules['sirkulasi_'+contoh]={ required: true };
        rules['status_'+contoh]={ required: true };
        rules['role_download_'+contoh]={ required: true };

        $('input[name="kode_buku_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
            };
            messages[this.name] = { required: 'This field is required' };
        });

        $('input[name="isbn_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
            };

            messages[this.name] = { required: 'This field is required' };
        });

        $('input[name="lokasi_buku_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
            };

            messages[this.name] = { required: 'This field is required' };
        });

        $('input[name="judul_buku_inggris_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
            };

            messages[this.name] = { required: 'This field is required' };
        });

        $('input[name="judul_buku_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
            };

            messages[this.name] = { required: 'This field is required' };
        });

        $('input[name="jumlah_eksemplar_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
                digits: true,
            };

            messages[this.name] = { required: 'This field is required' };
        });

        $('input[name="kota_terbit_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
            };

            messages[this.name] = { required: 'This field is required' };
        });

        $('input[name="tahun_terbit_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
                digits: true,
                maxlength: 4,
            };

            messages[this.name] = { required: 'This field is required' };
        });

        $('input[name="filecover_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                extension: "png|jpe?g|gif",
                filesize: 3145728,
            };
            messages[this.name] = {
                extension: 'Format yang diterima : png, jpg, jpeg, gif ',
                filesize: 'File size must be less than 3 MB',
            };
        });

        $('input[name="penerbit_'+ contoh +'"]').each(function() {
            rules[this.name] = {
                required: true,
            };

            messages[this.name] = { required: 'This field is required' };
        });

        myValidate();

    });

    myValidate();

    function myValidate () {
        var validator = $("#katalogForm").validate();
        validator.destroy();
        $("#katalogForm").validate({
            rules: rules,
            messages: messages,
            errorPlacement: function(error, element) {
                Object.keys(rules).forEach((value) => {
                    if (element.attr("name") == value)
                        $("#"+value+"-errorMsg").html(error);
                });

            }
        });
    }
});
