$(document).ready(function () {
    let rules = new Object();
    let messages = new Object();

    $.validator.addMethod('filesize', function (value, element, param) {
        return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than {0} byte');

    rules['kode_buku']={
        required: true
    };
    messages['kode_buku']={ required: 'This field is required' };
    rules['lokasi_buku']={
        required: true
    };
    messages['lokasi_buku']={ required: 'This field is required' };
    rules['judul_buku']={
        required: true
    };
    messages['judul_buku']={ required: 'This field is required' };
    rules['jenis_buku']={
        required: true
    };
    messages['jenis_buku']={ required: 'This field is required' };
    rules['jumlah_eksemplar']={
        required: true,
        digits: true,
    };
    messages['jumlah_eksemplar']={ required: 'This field is required' };
    rules['kota_terbit']={
        required: true,
    };
    messages['kota_terbit']={ required: 'This field is required' };
    rules['tahun_terbit']={
        required: true,
        digits: true,
        maxlength: 4,
    };
    messages['tahun_terbit']={ required: 'This field is required' };
    rules['subjek']={
        required: true
    };
    messages['subjek']={ required: 'This field is required' };
    rules['tambah_subjek']={
        required: true
    };
    messages['tambah_subjek']={ required: 'This field is required' };
    rules['pengarang']={
        required: true
    };
    messages['pengarang']={ required: 'This field is required' };
    rules['tambah_pengarang']={
        required: true
    };
    messages['tambah_pengarang']={ required: 'This field is required' };
    rules['penyunting']={
        required: true
    };
    messages['penyunting']={ required: 'This field is required' };
    rules['tambah_penyunting']={
        required: true
    };
    messages['tambah_penyunting']={ required: 'This field is required' };
    rules['penerbit']={
        required: true
    };
    messages['penerbit']={ required: 'This field is required' };
    rules['tambah_penerbit']={
        required: true
    };
    messages['tambah_penerbit']={ required: 'This field is required' };
    rules['filecover']={
        extension: "png|jpe?g|gif",
        filesize: 3145728,
    };
    messages['filecover']={
        extension: 'Format yang diterima : jpg, jpeg, png, gif ',
        filesize: 'File size must be less than 3 MB',
    };
    rules['filepdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filepdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['sirkulasi']={
        required: true
    };
    messages['sirkulasi']={ required: 'This field is required' };
    rules['abstrak']={
        required: true
    };
    rules['status']={
        required: true
    };
    messages['status']={ required: 'This field is required' };
    rules['abstrak']={
        required: true
    };
    rules['role_download']={
        required: true
    };
    messages['role_download']={ required: 'This field is required' };
    rules['abstrak']={
        required: true
    };
    messages['abstrak']={ required: 'This field is required' };

    rules['filecoverpdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filecoverpdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filedisclimerpdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filedisclimerpdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filepengesahanpdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filepengesahanpdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['fileabstrakpdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['fileabstrakpdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filepersembahanpdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filepersembahanpdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filepengantarpdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filepengantarpdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filedaftarisipdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filedaftarisipdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filedaftargambarpdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filedaftargambarpdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filedaftartabelpdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filedaftartabelpdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filebab1pdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filebab1pdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filebab2pdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filebab2pdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filebab3pdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filebab3pdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filebab4pdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filebab4pdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filebab5pdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filebab5pdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filebab6pdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filebab6pdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filebab7pdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filebab7pdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filedaftarpustakapdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filedaftarpustakapdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filelampiranpdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filelampiranpdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['filemateripresenstasipdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['filemateripresenstasipdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };
    rules['fileproposalpdf']={
        extension: "pdf",
        filesize: 10485760,
    };
    messages['fileproposalpdf']={
        extension: 'Format yang diterima : pdf ',
        filesize: 'File size must be less than 10 MB',
    };

    myValidate();

    function myValidate () {
        var validator = $("#katalogForm").validate();
        console.log('rules', rules);
        console.log('messages', messages);
        validator.destroy();
        $("#katalogForm").validate({
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
});
