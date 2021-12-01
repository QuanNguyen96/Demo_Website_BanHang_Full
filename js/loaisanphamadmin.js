$(document).ready(function() {
    function loaddanhmuc() {
        $.ajax({
            url: "./ajax_loaisanphamadmin.php",
            method: "post",
            data: {
                action: "show"
            },
            success: function(datarp) {
                $('.ad_dms_content_show').html(datarp)

            }
        })
    }
    loaddanhmuc();
    // delete dm  1
    function delete_dm(id) {
        $.ajax({
            url: "./ajax_loaisanphamadmin.php",
            method: "post",
            data: {
                action: "delete",
                iddm: id
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "Delete thành công sản phẩm " + id;
                    addthongbao(thongbao)
                    loaddanhmuc();
                }

            }
        })
    }
    $(document).on('click', '.ad_dms_content_table_thaotac_delete', function() {
        if (confirm("Bạn có chắc muốn xóa loại sản phẩm này")) {
            delete_dm($(this).data('malsp'))
        }
    })

    // delete nhieu dm
    function delete_dm_chon(array_id) {
        $.ajax({
            url: "./ajax_loaisanphamadmin.php",
            method: "post",
            data: {
                action: "delete_nhieu",
                array_id: array_id
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    array_id.forEach(function(element) {
                        var thongbao = "Delete thành công loại sản phẩm" + element;
                        addthongbao(thongbao)
                    })

                    loaddanhmuc();
                }


            }
        })
    }
    $('.checkbox_dm_full input').on('change', function() {

        var array_checkbox_xoa = $('.checkbox_dm_xoa')
        if ($(this).is(":checked")) {
            array_checkbox_xoa.each(function(element) {
                $(this)[0].checked = true;
            });
        } else {
            array_checkbox_xoa.each(function(element) {
                $(this)[0].checked = false;
            });
        }

    })
    $('.ad_dms_right_ttc_option_xoavungchon').on('click', function() {
        if (confirm("Bạn có chắc muốn xóa những mục đã chọn")) {
            var array_checkbox_xoa = $('.checkbox_dm_xoa')
            var array_id = [];
            array_checkbox_xoa.each(function(element) {
                if ($(this).is(":checked")) {
                    array_id.push($(this).data('malspxoa'))
                }
            })
            delete_dm_chon(array_id)
        }
    })

    // edit danh muc
    $(document).on('click', '.ad_dms_content_table_thaotac_edit', function() {
        $('.dm_ad_edits').css('display', 'block')
        var id = $(this).data('malsp_edit')
        datadanhmuc('#dm_ad_edit_content_title_chon');
        $.ajax({
            url: "./ajax_loaisanphamadmin.php",
            method: "post",
            data: {
                action: "edit_show",
                iddm: id
            },
            dataType: "json",
            success: function(datarp) {
                $('.dm_ad_edit_content_madm').html(datarp['MaLSP'])
                $('.dm_ad_edit_tendm').val(datarp['TenLSP'])
                $('.dm_ad_edit_content_hadm').attr('src', './upload/image/loaisanpham/' + datarp['HALSP'] + '')
                $('#dm_ad_edit_content_title_chon').val(datarp['MaDM'])
            }
        })

    })
    $('.dm_ad_edit_top_save').on("click", function() {
        var fuData = document.getElementById('id_file_hadm_edit');
        var FileUploadPath = fuData.value;
        if (FileUploadPath == '') {
            var tenlsp = $('.dm_ad_edit_tendm').val()
            var malsp = $('.dm_ad_edit_content_madm').html()
            var madm = $('#dm_ad_edit_content_title_chon').val()
            $.ajax({
                url: "./ajax_loaisanphamadmin.php",
                method: "post",
                data: {
                    "action": "edit_save_koupload",
                    "tenlsp": tenlsp,
                    "malsp": malsp,
                    "madm": madm
                },
                dataType: "json",
                success: function(datarp) {
                    if (datarp['add_messages'] == 'successfull') {
                        var thongbao = "update thành công danh mục " + madm;
                        addthongbao(thongbao)
                        loaddanhmuc();
                    }

                }
            })
        } else {
            $('.form_hadm_edit').submit()
        }
    })

    $('.form_hadm_edit').on('submit', function(e) {
        e.preventDefault()
        var tenlsp = $('.dm_ad_edit_tendm').val()
        var malsp = $('.dm_ad_edit_content_madm').html()
        var madm = $('#dm_ad_edit_content_title_chon').val()
        var dulieu = new FormData(this)
        dulieu.append('action', 'edit_save_coupload')
        dulieu.append('tenlsp', tenlsp)
        dulieu.append('malsp', malsp)
        dulieu.append('madm', madm)
        $.ajax({
            url: "./ajax_loaisanphamadmin.php",
            method: "post",
            data: dulieu,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(datarp) {

                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "update thành công danh mục " + madm;
                    addthongbao(thongbao)
                    loaddanhmuc();
                }

            }
        })
    })
    $(document).on('click', '.dm_ad_edit_hiden .fa-times', function() {
            $('.dm_ad_edits').css('display', 'none')

        })
        // doc file anh bang javascript
    $("#id_file_hadm_edit").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.dm_ad_edit_content_hadm').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    // 
    // doc file anh bang javascript
    $("#id_file_hadm").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.dm_ad_them_content_loadimg').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    // 
    // lay du lieu danh muc
    function datadanhmuc(the) {
        $.ajax({
            url: "./ajax_loaisanphamadmin.php",
            method: "post",
            data: {
                action: "datadm",
            },
            success: function(datarp) {
                $(the).html(datarp)

            }
        })
    }
    //  add danh muc
    $('.ad_dms_right_add').on('click', function() {
        $('.dm_ad_thems').css('display', 'block')
        datadanhmuc('#dm_ad_them_content_title_dm_chon');
    })

    $(document).on('click', '.dm_ad_them_hiden .fa-times', function() {
        $('.dm_ad_thems').css('display', 'none')

    })

    $('.ad_dms_right_ttc_option_add').on('click', function() {
        $('.dm_ad_thems_excel').css('display', 'block')
    })

    $(document).on('click', '.dm_ad_them_hiden_excel .fa-times', function() {
        $('.dm_ad_thems_excel').css('display', 'none')

    })
    var i = 0;
    $('.dm_ad_them_top_save').on("click", function() {
        if (ValidateFileUpload() == true) {
            if (confirm("bạn muốn thêm sản phẩm này")) {
                $('.form_hadm').submit();
            }

        }
    })

    $(document).on('submit', '.form_hadm', function(e) {
        e.preventDefault();
        var tenlsp = $('.dm_ad_them_tendm').val()
        var madm = $('#dm_ad_them_content_title_dm_chon').val()
        var dulieu = new FormData(this)
        dulieu.append('action', 'add_save')
        dulieu.append('tenlsp', tenlsp)
        dulieu.append('madm', madm)
        $.ajax({
            url: "./ajax_loaisanphamadmin.php",
            method: "post",
            data: dulieu,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = " Thêm thành công danh mục";
                    addthongbao(thongbao)
                    loaddanhmuc();
                }

            }
        })
    })

    function ValidateFileUpload() {
        var fuData = document.getElementById('id_file_hadm');
        var FileUploadPath = fuData.value;

        //To check if user upload any file
        if (FileUploadPath == '') {
            alert("Vui lòng chọn ảnh");
            return false

        } else {
            var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

            //The file uploaded is an image

            if (Extension == "gif" || Extension == "png" || Extension == "bmp" ||
                Extension == "jpeg" || Extension == "jpg") {

                // To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

            }

            //The file upload is NOT an image
            else {
                alert("Vui lòng chọn tệp hình ảnh : GIF, PNG, JPG, JPEG and BMP. ");
                return false
            }
        }
        return true
    }

    function addthongbao($messages) {
        i++;
        setTimeout(() => {
            $('.danhmuc_thongbao').append('<button class="thongbao' + i + '">' + $messages + '</button>')
            $('.danhmuc_thongbao .thongbao' + i + '').css({
                'transform': 'translateX(100%)',
                'visibility': 'hidden',
                'opacity': '0.5',
            })
        }, 0);
        setTimeout(() => {
            $('.danhmuc_thongbao .thongbao' + i + '').css({
                'transform': 'translateX(0)',
                'visibility': 'visible',
                'opacity': '1'
            })

        }, 100);
        setTimeout(() => {
            $('.danhmuc_thongbao .thongbao' + i + '').css({
                'transform': 'translateX(0)',
                'visibility': 'hidden',
                'opacity': '0.5'
            })

        }, 1500);
        setTimeout(() => {
            $('.danhmuc_thongbao button:nth-child(1)').remove()

        }, 4000);
    }
    // read fil excel
    $('.dm_ad_them_content_excel_btn_submit').on("click", function() {
        if (ValidateFileUpload_excel() == true) {
            trangthaireadsave = 1;
            $('.form_hadm_excel').submit();

        }
    })

    function ValidateFileUpload_excel() {
        var fuData = document.getElementById('dm_ad_them_content_excel_fileupload');
        var FileUploadPath = fuData.value;

        //To check if user upload any file
        if (FileUploadPath == '') {
            alert("Vui lòng chọn file excel");
            return false

        } else {
            var Extension = FileUploadPath.substring(
                FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

            //The file uploaded is an image

            if (Extension == "xlsx" || Extension == "xls" || Extension == "xlsm") {

                // To Display
                if (fuData.files && fuData.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(fuData.files[0]);
                }

            }

            //The file upload is NOT an image
            else {
                alert("Vui lòng chọn tệp hình ảnh : .xlsx , .xls , .xlsm");
                return false
            }
        }
        return true
    }
    // end raed file excel
    // save file danh muc
    $('.dm_ad_them_top_save_excel').on("click", function() {
        if (ValidateFileUpload_excel() == true) {
            trangthaireadsave = 0;
            $('.form_hadm_excel').submit();

        }
    })
    $(document).on('submit', '.form_hadm_excel', function(e) {
            e.preventDefault();
            var dulieu = new FormData(this)
            if (trangthaireadsave == 1) {
                dulieu.append('action', 'read_filexecl')
            } else {
                dulieu.append('action', 'add_excel_save')
            }

            $.ajax({
                url: "./ajax_loaisanphamadmin.php",
                method: "post",
                data: dulieu,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(datarp) {
                    if (trangthaireadsave == 1) {
                        var databody = '';
                        // bỏ hàng 1 tên database
                        // bỏ hàng 2 tên cột
                        // bỏ hàng cuối mặc định
                        // đọc từ index 2-> lastindex-1
                        // tùy theo dữ liệu ban đầu ở đây ta đọc từ đầu luôn
                        datarp.forEach(function(element, index) {
                            if (index != element.length) {
                                databody += '<tr>' +
                                    '    <td>' + (index + 1) + '</td>' +
                                    '    <td>' + element[0] + '</td>' +
                                    '    <td>' + element[1] + '</td>' +
                                    '    <td><img src="' + element[2] + '" alt=""></td>' +
                                    '</tr>';
                            }
                        });
                        $('.dm_ad_them_content_excel_noidungfile_body').html(databody)
                    }
                    if (trangthaireadsave == 0) {
                        if (datarp['add_messages'] == 'successfull') {
                            var thongbao = " Thêm thành công danh mục";
                            addthongbao(thongbao)
                            loaddanhmuc();
                        }
                    }


                }
            })
        })
        // end read file excel
        // nếu muốn thay đổi cấu hình mặc định bạn có thể thiết lập như sau
    // CKEDITOR.config.height = 280;

    // CKEDITOR.replace('dm_ad_them_content_title_txt_noi_dung', // lệnh này sẽ thay thế thẻ textarea thành trình soạn thảo
    //     {
    //         filebrowserBrowseUrl: './ckfinder/ckfinder.html',
    //         filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
    //         filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    //         filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    //     });
})