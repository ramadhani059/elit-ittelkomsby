var x = 0;

        $(document).ready(function () {

            $("#jenis_buku").select2({
                theme: 'bootstrap4',
                placeholder: "Please Select",
            });

            if ($('#jenis_buku').val() != null) {
                $(".some").hide();
                var some = $('#jenis_buku').val();
                $("#some_" + some).show();
                x = 0;

                $(".field_subjek_"+some).remove();
                $(".field_pengarang_"+some).remove();
                $(".field_pembimbing_"+some).remove();

                $('.subjek_exist_wrapper_'+some).on('click', '.remove_subjek_exist_button', function(e){
                    e.preventDefault();
                    $(this).closest("#subjek_exist_wrapper_"+some).remove(); //Remove field html
                });

                $('.pengarang_exist_wrapper_'+some).on('click', '.remove_pengarang_exist_button', function(e){
                    e.preventDefault();
                    $(this).closest("#pengarang_exist_wrapper_"+some).remove(); //Remove field html
                });

                $('.pembimbing_exist_wrapper_'+some).on('click', '.remove_pembimbing_exist_button', function(e){
                    e.preventDefault();
                    $(this).closest("#pembimbing_exist_wrapper_"+some).remove(); //Remove field html
                });

                $('.subjek_wrapper_'+some).append(`
                <div class="field_subjek_${some}">\
                    <div class="row">\
                        <div class="col-10 col-lg-11 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="subjek_${some}" type="text" class="form-control" name="subjek_${some}[]" placeholder="Enter A Subject " aria-describedby="basic-addon13" />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="subjek_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-2 col-lg-1 mb-3 text-end" id="btn_plus">\
                            <a class="btn btn-icon btn-dark add_button_subjek_${some}" id="tombol_plus" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);" >\
                                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>\
                            </a>\
                        </div>\
                    </div>\
                </div>`);

                $('.pengarang_wrapper_'+some).append(`
                <div class="field_pengarang_${some}">\
                    <div class="row">\
                        <div class="col-12 col-lg-5 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bx:hash"></iconify-icon>\
                                </span>\
                                <input id="no_pengarang_${some}" type="text" class="form-control" name="no_pengarang_${some}[]" placeholder="Enter An ID Author " aria-describedby="basic-addon13" autofocus />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="no_pengarang_${some}[]-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-12 col-lg-3 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="nama_pengarang_depan_${some}" type="text" class="form-control" name="nama_pengarang_depan_${some}[]" placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="nama_pengarang_depan_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-10 col-lg-3 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="nama_pengarang_belakang_${some}" type="text" class="form-control" name="nama_pengarang_belakang_${some}[]" placeholder="Enter The Author's Last Name " aria-describedby="basic-addon13" />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="nama_pengarang_belakang_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-2 col-lg-1 mb-4 text-end" id="btn_plus" style="display: flex; align-items: flex-end; justify-content: flex-end;">\
                            <a class="btn btn-icon btn-dark add_button_pengarang_${some}" id="tombol_plus" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);" >\
                                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>\
                            </a>\
                        </div>\
                    </div>\
                </div>`);

                $('.pembimbing_wrapper_'+some).append(`
                <div class="field_pembimbing_${some}">\
                    <div class="row">\
                        <div class="col-12 col-lg-6 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bx:hash"></iconify-icon>\
                                </span>\
                                <input id="no_pembimbing_${some}" type="text" class="form-control" name="no_pembimbing_${some}[]" placeholder="Enter An ID Mentor " aria-describedby="basic-addon13" autofocus />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="no_pembimbing_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-10 col-lg-5 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="pembimbing_${some}" type="text" class="form-control " name="pembimbing_${some}[]" placeholder="Enter A Mentor " aria-describedby="basic-addon13" />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="pembimbing_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-2 col-lg-1 mb-4 text-end" id="btn_plus" style="display: flex; align-items: flex-end; justify-content: flex-end;">\
                            <a class="btn btn-icon btn-dark add_button_pembimbing_${some}" id="tombol_plus" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);" >\
                                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>\
                            </a>\
                        </div>\
                    </div>\
                </div>`);

                $(".wrapper_pengarang_"+some).remove();

                $('#jenis_pengadaan_'+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $('#status_pengadaan_'+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#fakultas_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#prodi_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#sirkulasi_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#status_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#role_download_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $('#checkkodebuku_'+ some).click(function(e){
                    const kodebuku = $('#kode_buku_'+ some).val();
                    // alert(kodebuku);

                    $.ajax({
                        url: '/getKodeBuku/'+kodebuku,
                        type: "GET",
                        dataType: "json",
                        success: function(infobuku){
                            if(infobuku.length === 1){
                                e.preventDefault();

                                var form = $(this).closest("form");
                                var name = $(this).data("name");

                                Swal.fire({
                                    title: "Buku Sudah Terdaftar !!",
                                    text: "Apakah Kamu Ingin Menambah Eksemplar ??",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "bg-danger",
                                    confirmButtonText: "Yes, I'am Sure !",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "{{URL::to('/home')}}"
                                    }
                                });
                            } else {
                                $('.toast').addClass("show");
                            }
                        }
                    });
                });

                var maxFieldSubjek = 100;
                var maxFieldPengarang = 100;
                var maxFieldPembimbing = 100;

                $('.add_button_subjek_'+some).on('click', function(e){
                    if(x < maxFieldSubjek){
                        x++;
                        $('.subjek_wrapper_'+some).append(`
                        <div class="wrapper_subjek_${some}" id="wrapper_subjek_${some}">\
                            <div class="row">\
                                <div class="col-10 col-lg-11 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="subjek_${some}" type="text" class="form-control " name="subjek_${some}[]" placeholder="Enter A Subject " aria-describedby="basic-addon13" />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="subjek_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-2 col-lg-1 mb-3 text-end" id="btn_remove_${x}">\
                                    <a class="btn btn-icon btn-danger remove_subjek_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">\
                                        <span><iconify-icon icon="bx:x" class="tf-icons bx"></iconify-icon></span>\
                                    </a>\
                                </div>\
                            </div>\
                        </div>`);
                    }
                });

                $('.subjek_wrapper_'+some).on('click', '.remove_subjek_button', function(e){
                    e.preventDefault();
                    $(this).closest("#wrapper_subjek_"+some).remove(); //Remove field html
                });

                $('.add_button_pengarang_'+some).on('click', function(e){
                    if(x < maxFieldPengarang){
                        x++;
                        $('.pengarang_wrapper_'+some).append(`
                        <div class="wrapper_pengarang_${some}" id="wrapper_pengarang_${some}">\
                            <div class="row">\
                                <div class="col-12 col-lg-5 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bx:hash"></iconify-icon>\
                                        </span>\
                                        <input id="no_pengarang_${some}" type="text" class="form-control " name="no_pengarang_${some}[]" placeholder="Enter An ID Author " aria-describedby="basic-addon13" autofocus />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="no_pengarang_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-12 col-lg-3 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="nama_pengarang_depan_${some}" type="text" class="form-control " name="nama_pengarang_depan_${some}[]" placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="nama_pengarang_depan_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-10 col-lg-3 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="nama_pengarang_belakang_${some}" type="text" class="form-control " name="nama_pengarang_belakang_${some}[]" placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="nama_pengarang_belakang_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-2 col-lg-1 mb-4 text-end" id="btn_remove_${x}" style="display: flex; align-items: flex-end; justify-content: flex-end;">\
                                    <a class="btn btn-icon btn-danger remove_pengarang_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">\
                                        <span><iconify-icon icon="bx:x" class="tf-icons bx"></iconify-icon></span>\
                                    </a>\
                                </div>\
                            </div>\
                        </div>`);
                    }
                });

                $('.pengarang_wrapper_'+some).on('click', '.remove_pengarang_button', function(e){
                    e.preventDefault();
                    $(this).closest("#wrapper_pengarang_"+some).remove(); //Remove field html
                });

                $('.add_button_pembimbing_'+some).on('click', function(e){
                    if(x < maxFieldPembimbing){
                        x++;
                        $('.pembimbing_wrapper_'+some).append(`
                        <div class="wrapper_pembimbing_${some}" id="wrapper_pembimbing_${some}">\
                            <div class="row">\
                                <div class="col-12 col-lg-6 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bx:hash"></iconify-icon>\
                                        </span>\
                                        <input id="no_pembimbing_${some}" type="text" class="form-control " name="no_pembimbing_${some}[]" placeholder="Enter An ID Mentor " aria-describedby="basic-addon13" autofocus />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="no_pembimbing_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-10 col-lg-5 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="pembimbing_${some}" type="text" class="form-control " name="pembimbing_${some}[]" placeholder="Enter A Mentor " aria-describedby="basic-addon13" />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="pembimbing_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-2 col-lg-1 mb-4 text-end" id="btn_remove_${x}" style="display: flex; align-items: flex-end; justify-content: flex-end;">\
                                    <a class="btn btn-icon btn-danger remove_pembimbing_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">\
                                        <span><iconify-icon icon="bx:x" class="tf-icons bx"></iconify-icon></span>\
                                    </a>\
                                </div>\
                            </div>\
                        </div>`);
                    }
                });

                $('.pembimbing_wrapper_'+some).on('click', '.remove_pembimbing_button', function(e){
                    e.preventDefault();
                    $(this).closest("#wrapper_pembimbing_"+some).remove(); //Remove field html
                });

                $('.pengarang_'+some).on('change',function(){
                    $(".addpengarang_"+some).hide();
                    $("#style_pengarang").removeClass( "col-12" ).addClass("col-8");
                    $("#btn_plus").removeClass("text-end");
                    var author = $(this).find('option:selected').val();
                    /* console.log(target); */
                    if (author == 'add'){
                        $("#style_pengarang").removeClass( "col-8" ).addClass("col-12");
                        $("#btn_plus").addClass("text-end");
                        $("#addpengarang_"+some).show();
                    };
                });
            }

            $('#jenis_buku').on('change',function(){
                $(".some").hide();
                var some = $(this).find('option:selected').val();
                $("#some_" + some).show();
                x = 0;

                $(".field_subjek_"+some).remove();
                $(".field_pengarang_"+some).remove();
                $(".field_pembimbing_"+some).remove();

                $('.subjek_wrapper_'+some).append(`
                <div class="field_subjek_${some}">\
                    <div class="row">\
                        <div class="col-10 col-lg-11 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="subjek_${some}" type="text" class="form-control " name="subjek_${some}[]" placeholder="Enter A Subject " aria-describedby="basic-addon13" />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="subjek_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-2 col-lg-1 mb-3 text-end" id="btn_plus">\
                            <a class="btn btn-icon btn-dark add_button_subjek_${some}" id="tombol_plus" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);" >\
                                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>\
                            </a>\
                        </div>\
                    </div>\
                </div>`);

                $('.pengarang_wrapper_'+some).append(`
                <div class="field_pengarang_${some}">\
                    <div class="row">\
                        <div class="col-12 col-lg-5 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bx:hash"></iconify-icon>\
                                </span>\
                                <input id="no_pengarang_${some}" type="text" class="form-control" name="no_pengarang_${some}[]" placeholder="Enter An ID Author " aria-describedby="basic-addon13" autofocus />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="no_pengarang_${some}[]-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-12 col-lg-3 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="nama_pengarang_depan_${some}" type="text" class="form-control " name="nama_pengarang_depan_${some}[]" placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="nama_pengarang_depan_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-10 col-lg-3 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="nama_pengarang_belakang_${some}" type="text" class="form-control " name="nama_pengarang_belakang_${some}[]" placeholder="Enter The Author's Last Name " aria-describedby="basic-addon13" />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="nama_pengarang_belakang_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-2 col-lg-1 mb-4 text-end" id="btn_plus" style="display: flex; align-items: flex-end; justify-content: flex-end;">\
                            <a class="btn btn-icon btn-dark add_button_pengarang_${some}" id="tombol_plus" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);" >\
                                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>\
                            </a>\
                        </div>\
                    </div>\
                </div>`);

                $('.pembimbing_wrapper_'+some).append(`
                <div class="field_pembimbing_${some}">\
                    <div class="row">\
                        <div class="col-12 col-lg-6 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bx:hash"></iconify-icon>\
                                </span>\
                                <input id="no_pembimbing_${some}" type="text" class="form-control " name="no_pembimbing_${some}[]" placeholder="Enter An ID Mentor " aria-describedby="basic-addon13" autofocus />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="no_pembimbing_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-10 col-lg-5 mb-3">\
                            <div class="input-group">\
                                <span class="input-group-text" id="basic-addon11">\
                                    <iconify-icon icon="bxs:user"></iconify-icon>\
                                </span>\
                                <input id="pembimbing_${some}" type="text" class="form-control " name="pembimbing_${some}[]" placeholder="Enter A Mentor " aria-describedby="basic-addon13" />\
                            </div>\
                            <div id="defaultFormControlHelp" class="form-text text-danger">\
                                <span class="errorTxt" id="pembimbing_${some}-errorMsg"></span>\
                            </div>\
                        </div>\
                        <div class="col-2 col-lg-1 mb-4 text-end" id="btn_plus" style="display: flex; align-items: flex-end; justify-content: flex-end;">\
                            <a class="btn btn-icon btn-dark add_button_pembimbing_${some}" id="tombol_plus" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);" >\
                                <span><iconify-icon icon="bx:plus" class="tf-icons bx"></iconify-icon></span>\
                            </a>\
                        </div>\
                    </div>\
                </div>`);

                $(".wrapper_pengarang_"+some).remove();

                $('#jenis_pengadaan_'+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $('#status_pengadaan_'+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#fakultas_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#prodi_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#sirkulasi_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#status_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $("#role_download_"+ some).select2({
                    theme: 'bootstrap4',
                    placeholder: "Please Select",
                });

                $('#checkkodebuku_'+ some).click(function(e){
                    const kodebuku = $('#kode_buku_'+ some).val();
                    // alert(kodebuku);

                    $.ajax({
                        url: '/getKodeBuku/'+kodebuku,
                        type: "GET",
                        dataType: "json",
                        success: function(infobuku){
                            if(infobuku.length === 1){
                                e.preventDefault();

                                var form = $(this).closest("form");
                                var name = $(this).data("name");

                                Swal.fire({
                                    title: "Buku Sudah Terdaftar !!",
                                    text: "Apakah Kamu Ingin Menambah Eksemplar ??",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonClass: "bg-danger",
                                    confirmButtonText: "Yes, I'am Sure !",
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "{{URL::to('/home')}}"
                                    }
                                });
                            } else {
                                $('.toast').addClass("show");
                            }
                        }
                    });
                });

                var maxFieldSubjek = 100;
                var maxFieldPengarang = 100;
                var maxFieldPembimbing = 100;

                $('.add_button_subjek_'+some).on('click', function(e){
                    if(x < maxFieldSubjek){
                        x++;
                        $('.subjek_wrapper_'+some).append(`
                        <div class="wrapper_subjek_${some}" id="wrapper_subjek_${some}">\
                            <div class="row">\
                                <div class="col-10 col-lg-11 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="subjek_${some}" type="text" class="form-control " name="subjek_${some}[]" placeholder="Enter A Subject " aria-describedby="basic-addon13" />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="subjek_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-2 col-lg-1 mb-3 text-end" id="btn_remove_${x}">\
                                    <a class="btn btn-icon btn-danger remove_subjek_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">\
                                        <span><iconify-icon icon="bx:x" class="tf-icons bx"></iconify-icon></span>\
                                    </a>\
                                </div>\
                            </div>\
                        </div>`);
                    }
                });

                $('.subjek_wrapper_'+some).on('click', '.remove_subjek_button', function(e){
                    e.preventDefault();
                    $(this).closest("#wrapper_subjek_"+some).remove(); //Remove field html
                });

                $('.add_button_pengarang_'+some).on('click', function(e){
                    if(x < maxFieldPengarang){
                        x++;
                        $('.pengarang_wrapper_'+some).append(`
                        <div class="wrapper_pengarang_${some}" id="wrapper_pengarang_${some}">\
                            <div class="row">\
                                <div class="col-12 col-lg-5 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bx:hash"></iconify-icon>\
                                        </span>\
                                        <input id="no_pengarang_${some}" type="text" class="form-control " name="no_pengarang_${some}[]" placeholder="Enter An ID Author " aria-describedby="basic-addon13" autofocus />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="no_pengarang_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-12 col-lg-3 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="nama_pengarang_depan_${some}" type="text" class="form-control " name="nama_pengarang_depan_${some}[]" placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="nama_pengarang_depan_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-10 col-lg-3 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="nama_pengarang_belakang_${some}" type="text" class="form-control" name="nama_pengarang_belakang_${some}[]" placeholder="Enter The Author's First Name " aria-describedby="basic-addon13" />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="nama_pengarang_belakang_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-2 col-lg-1 mb-4 text-end" id="btn_remove_${x}" style="display: flex; align-items: flex-end; justify-content: flex-end;">\
                                    <a class="btn btn-icon btn-danger remove_pengarang_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">\
                                        <span><iconify-icon icon="bx:x" class="tf-icons bx"></iconify-icon></span>\
                                    </a>\
                                </div>\
                            </div>\
                        </div>`);
                    }
                });

                $('.pengarang_wrapper_'+some).on('click', '.remove_pengarang_button', function(e){
                    e.preventDefault();
                    $(this).closest("#wrapper_pengarang_"+some).remove(); //Remove field html
                });

                $('.add_button_pembimbing_'+some).on('click', function(e){
                    if(x < maxFieldPembimbing){
                        x++;
                        $('.pembimbing_wrapper_'+some).append(`
                        <div class="wrapper_pembimbing_${some}" id="wrapper_pembimbing_${some}">\
                            <div class="row">\
                                <div class="col-12 col-lg-6 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bx:hash"></iconify-icon>\
                                        </span>\
                                        <input id="no_pembimbing_${some}" type="text" class="form-control" name="no_pembimbing_${some}[]" placeholder="Enter An ID Mentor " aria-describedby="basic-addon13" autofocus />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="no_pembimbing_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-10 col-lg-5 mb-3">\
                                    <div class="input-group">\
                                        <span class="input-group-text" id="basic-addon11">\
                                            <iconify-icon icon="bxs:user"></iconify-icon>\
                                        </span>\
                                        <input id="pembimbing_${some}" type="text" class="form-control" name="pembimbing_${some}[]" placeholder="Enter A Mentor " aria-describedby="basic-addon13" />\
                                    </div>\
                                    <div id="defaultFormControlHelp" class="form-text text-danger">\
                                        <span class="errorTxt" id="pembimbing_${some}-errorMsg"></span>\
                                    </div>\
                                </div>\
                                <div class="col-2 col-lg-1 mb-4 text-end" id="btn_remove_${x}" style="display: flex; align-items: flex-end; justify-content: flex-end;">\
                                    <a class="btn btn-icon btn-danger remove_pembimbing_button" data-toggle="tooltip" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false" style=" width: calc(2.2rem + 2px); height: calc(2.2rem + 2px);">\
                                        <span><iconify-icon icon="bx:x" class="tf-icons bx"></iconify-icon></span>\
                                    </a>\
                                </div>\
                            </div>\
                        </div>`);
                    }
                });

                $('.pembimbing_wrapper_'+some).on('click', '.remove_pembimbing_button', function(e){
                    e.preventDefault();
                    $(this).closest("#wrapper_pembimbing_"+some).remove(); //Remove field html
                });

                $('.pengarang_'+some).on('change',function(){
                    $(".addpengarang_"+some).hide();
                    $("#style_pengarang").removeClass( "col-12" ).addClass("col-8");
                    $("#btn_plus").removeClass("text-end");
                    var author = $(this).find('option:selected').val();
                    /* console.log(target); */
                    if (author == 'add'){
                        $("#style_pengarang").removeClass( "col-8" ).addClass("col-12");
                        $("#btn_plus").addClass("text-end");
                        $("#addpengarang_"+some).show();
                    };
                });
            });
        });
