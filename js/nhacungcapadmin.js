$(document).ready(function() {

    // add thong bao
    var i = 0;

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

    //  add danh muc
    $('.ad_dms_right_add').on('click', function() {
        $('.dm_ad_thems').css('display', 'block')
            // datadanhmuc('#dm_ad_them_content_title_dm_chon');
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
    $(document).on('click', '.ad_dms_content_table_thaotac_edit', function() {
        $('.dm_ad_edits').css('display', 'block')
    })
    $(document).on('click', '.dm_ad_edit_hiden .fa-times', function() {
            $('.dm_ad_edits').css('display', 'none')

        })
        // load và show nha cung cap
    function load_ncc() {
        $.ajax({
            url: "./ajax_nhacungcapadmin.php",
            method: "post",
            data: {
                action: "show"
            },
            success: function(datarp) {
                $('.ad_dms_content_show').html(datarp)

            }
        })
    }
    load_ncc();
    // add_thêm nhà cung cấp
    $('.dm_ad_them_top_save').on('click', function() {
            var tenncc = $('.dm_ad_them_tenncc').val();
            var diachi = $('.dm_ad_them_diachi').val();
            var email = $('.dm_ad_them_email').val();
            var sdt = $('.dm_ad_them_sdt').val();
            if (validate_addncc(tenncc, diachi, email, sdt) == false) {
                alert("vui lòng kiểm tra và nhập đầy đủ dữ liệu")
            } else {
                addncc_1(tenncc, diachi, email, sdt)
            }
        })
        // validate add ncc
    function validate_addncc(tenncc, diachi, email, sdt) {
        if (tenncc == "" || diachi == "" || email == "" || sdt == "") {
            return false;
        }
        if (email.indexOf("@gmail.com") == -1) {
            return false;
        }
        return true;
    }

    function addncc_1(tenncc, diachi, email, sdt) {
        $.ajax({
            url: "./ajax_nhacungcapadmin.php",
            method: "post",
            data: {
                action: "addncc_1",
                tenncc: tenncc,
                diachi: diachi,
                email: email,
                sdt: sdt
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "thêm nhà cung cấp thành công ";
                    addthongbao(thongbao)
                    load_ncc()
                }

            }
        })
    }
    // delete dm  1
    function delete_dm(id) {
        $.ajax({
            url: "./ajax_nhacungcapadmin.php",
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
                    load_ncc()
                }

            }
        })
    }
    $(document).on('click', '.ad_dms_content_table_thaotac_delete', function() {
            if (confirm("Bạn có chắc muốn xóa nhà cung cấp này")) {
                delete_dm($(this).data('mancc_delete'))
            }
        })
        // delete nhieu dm
    function delete_dm_chon(array_id) {
        $.ajax({
            url: "./ajax_nhacungcapadmin.php",
            method: "post",
            data: {
                action: "delete_nhieu",
                array_id: array_id
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    array_id.forEach(function(element) {
                        var thongbao = "Delete thành công nhà cung cấp " + element;
                        addthongbao(thongbao)
                    })

                    load_ncc()
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
                        array_id.push($(this).data('manccxoa'))
                    }
                })
                delete_dm_chon(array_id)
            }
        })
        // edit danh muc
    $(document).on('click', '.ad_dms_content_table_thaotac_edit', function() {
        $('.dm_ad_edits').css('display', 'block')
        var id = $(this).data('mancc_edit')
        $.ajax({
            url: "./ajax_nhacungcapadmin.php",
            method: "post",
            data: {
                action: "edit_show",
                iddm: id
            },
            dataType: "json",
            success: function(datarp) {
                $('.dm_ad_edit_mancc').html(datarp['MaNCC'])
                $('.dm_ad_edit_tenncc').val(datarp['TenNCC'])
                $('.dm_ad_edit_diachi').val(datarp['Address'])
                $('.dm_ad_edit_email').val(datarp['Email'])
                $('.dm_ad_edit_sdt').val(datarp['SDT'])
            }
        })

    })
    $(document).on('click', '.dm_ad_edit_top_save', function() {
            $('.dm_ad_edits').css('display', 'block')
            var MaNCC = $('.dm_ad_edit_mancc').html();
            var TenNCC = $('.dm_ad_edit_tenncc').val();
            var Address = $('.dm_ad_edit_diachi').val();
            var Email = $('.dm_ad_edit_email').val();
            var SDT = $('.dm_ad_edit_sdt').val();
            $.ajax({
                url: "./ajax_nhacungcapadmin.php",
                method: "post",
                data: {
                    action: "edit_save",
                    MaNCC: MaNCC,
                    TenNCC: TenNCC,
                    Address: Address,
                    Email: Email,
                    SDT: SDT
                },
                dataType: "json",
                success: function(datarp) {

                    if (datarp['add_messages'] == 'successfull') {
                        var thongbao = "update thành công danh mục " + MaNCC;
                        addthongbao(thongbao)
                        load_ncc()
                    }
                }
            })

        })
        // read fil excel
    var trangthaireadsave = 0;
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
                url: "./ajax_nhacungcapadmin.php",
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
                                    '    <td>' + element[0] + '</td>' +
                                    '    <td>' + element[1] + '</td>' +
                                    '    <td>' + element[2] + '</td>' +
                                    '    <td>' + element[3] + '</td>' +
                                    '       </tr>';
                            }
                        });
                        $('.dm_ad_them_content_excel_noidungfile_body').html(databody)
                    }
                    if (trangthaireadsave == 0) {
                        if (datarp['add_messages'] == 'successfull') {
                            var thongbao = " Thêm thành công danh mục";
                            addthongbao(thongbao)
                            load_ncc();
                        }
                    }


                }
            })
        })
        // end read file excel
})