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



    $('.ad_sps_right_add').on('click', function() {
        $('.sp_ad_thems').css('display', 'block')
        data_loaisanphm("#sp_ad_them_loaisp")
        data_nhacungcap("#sp_ad_them_nhacc")
    })

    $(document).on('click', '.sp_ad_them_hiden .fa-times', function() {
        $('.sp_ad_thems').css('display', 'none')

    })

    $('.ad_sps_right_ttc_option_add').on('click', function() {
        $('.dm_ad_thems_excel').css('display', 'block')
    })

    $(document).on('click', '.dm_ad_them_hiden_excel .fa-times', function() {
        $('.dm_ad_thems_excel').css('display', 'none')

    })
    $(document).on('click', '.ad_dms_content_table_thaotac_xembv', function() {
        $('.sp_baiviets').css('display', 'block')
        var mabvaiviet = $(this).data('mabaiviet')
        $.ajax({
            url: "./ajax_baivietadmin.php",
            method: "post",
            data: {
                action: "show_baiviet_sp",
                "mabaiviet": mabvaiviet
            },
            success: function(datarp) {
                $('.sp_baiviet_noidung').html(datarp)

            }
        })
    })

    $(document).on('click', '.sp_baiviets_hiden .fa-times', function() {
            $('.sp_baiviets').css('display', 'none')


        })
        // load sản phẩm
    function loadsanpham() {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                action: "show_sanpham"
            },
            success: function(datarp) {
                $('.ad_sps_content_table_noidung').html(datarp)

            }
        })
    }
    loadsanpham();

    // lấy danh mục
    function data_loaisanphm(the) {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                action: "show_data_loaisanphm",
            },
            success: function(datarp) {
                $(the).html(datarp)

            }
        })
    }
    // lấy danh mục
    function data_nhacungcap(the) {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                action: "show_data_nhacungcap",
            },
            success: function(datarp) {
                $(the).html(datarp)

            }
        })
    }
    // thêm sản phẩm
    var checktb = true;
    $('.sp_ad_them_top_save').on("click", function() {
        if (ValidateFileUpload() == true && Validate_addsp() == true) {
            if (confirm("bạn muốn thêm sản phẩm này")) {
                // luu bang san pham
                var tensp = $('.sp_ad_them_tensp').val()
                var soluong = $('.sp_ad_them_soluong').val()
                var giaban = $('.sp_ad_them_giaban').val()
                var gianhap = $('.sp_ad_them_gianhap').val()
                var hienan = $('.sp_ad_them_content_hienan:checked').val()
                var malsp = $('#sp_ad_them_loaisp').val()
                var mancc = $('#sp_ad_them_nhacc').val()
                $.ajax({
                    url: "./ajax_sanphamadmin.php",
                    method: "post",
                    data: {
                        'action': 'add_save',
                        'tensp': tensp,
                        'soluong': soluong,
                        'giaban': giaban,
                        'gianhap': gianhap,
                        'hienan': hienan,
                        'malsp': malsp,
                        'mancc': mancc
                    },
                    dataType: "json",
                    success: function(datarp) {
                        if (datarp['add_messages'] != 'successfull') {
                            checktb = false;
                        }

                    }
                })

                //luu hinh anh san pham
                $('.formupload_img_addsp').submit();
                //luu du lieu bai viet
                var baiviet = CKEDITOR.instances.sp_ad_them_content_title_txt_noi_dung.getData()
                if (baiviet != "") {
                    $.ajax({
                        url: "./ajax_baivietadmin.php",
                        method: "post",
                        data: {
                            'action': 'add_save_sp',
                            'baiviet': baiviet
                        },
                        dataType: "json",
                        success: function(datarp) {
                            if (datarp['add_messages'] != 'successfull') {
                                checktb = false;
                            }


                        }
                    })

                }
                if (checktb == true) {
                    var thongbao = "thêm thành công sản phẩm";
                    addthongbao(thongbao)
                    loadsanpham()
                } else {
                    alert("xảy ra lỗi,vui lòng kiểm tra và thử lại ")
                }

            }

        }

    })

    $(document).on('submit', '.formupload_img_addsp', function(e) {

        e.preventDefault();
        var dulieu = new FormData(this)
        dulieu.append('action', 'add_save_sp')
        $.ajax({
            url: "./ajax_haspadmin.php",
            method: "post",
            data: dulieu,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] != 'successfull') {
                    checktb = false;
                }

            }
        })
    })

    function Validate_addsp() {
        var tensp = $('.sp_ad_them_tensp').val()
        if (tensp == "") {
            return false
        }
        return true

    }

    function ValidateFileUpload() {
        var fuData = document.getElementById('ip_img_add_sanpham');
        var FileUploadPath = fuData.value;
        // chọn tối đa 5 ảnh
        if ($(fuData)[0].files.length > 5) {
            alert("Chỉ được chọn tối đa 5 ảnh");
            return false
        }

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
        var tensp = $('.sp_ad_them_tensp').val()
        if (tensp == "") {
            alert("vui lòng nhập đầy đủ dữ liệu")
            return false
        }
        return true
    }
    // end thêm sản phẩm
    // delete dm  1
    function delete_sp(id) {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
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
                    loadsanpham()
                }

            }
        })
    }
    $(document).on('click', '.ad_dms_content_table_thaotac_delete', function() {
            if (confirm("Bạn có chắc muốn xóa sản phẩm này")) {
                delete_sp($(this).data('masp_xoa'))
            }
        })
        // delete nhieu dm
    function delete_dm_chon(array_id) {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
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

                    loadsanpham()
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
                        array_id.push($(this).data('maspxoa'))
                    }
                })
                delete_dm_chon(array_id)
            }
        })
        // edit danh muc
    $(document).on('click', '.ad_dms_content_table_thaotac_edit', function() {
        $('.dm_ad_edits').css('display', 'block')
        data_loaisanphm("#dm_ad_edit_loaisanpham_chon")
        data_nhacungcap("#dm_ad_edit_ncc_chon")
        var id = $(this).data('masp_edit')
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                action: "edit_show",
                iddm: id
            },
            dataType: "json",
            success: function(datarp) {
                var $hienthi = $('input:radio[name=sp_ad_edit_content_show]');
                $('.dm_ad_edit_masp').html(datarp['MaSP'])
                $('.dm_ad_edit_tensp').val(datarp['TenSP'])
                $('.dm_ad_edit_soluong').val(datarp['SoLuong'])
                $('.dm_ad_edit_giaban').val(datarp['GiaBan'])
                $('.dm_ad_edit_gianhap').val(datarp['GiaNhap'])
                $hienthi.filter('[value=' + datarp['TrangThaiShow'] + ']').prop('checked', true);
                $('#dm_ad_edit_loaisanpham_chon').val(datarp['MaLSP'])
                $('#dm_ad_edit_ncc_chon').val(datarp['MaNCC'])
            }
        })

    })
    $(document).on('click', '.dm_ad_edit_hiden .fa-times', function() {
        $('.dm_ad_edits').css('display', 'none')

    })
    var check_update_sp = true;
    $(document).on('click', '.dm_ad_edit_top_save', function() {
        // update bang sanpham
        var masp = $('.dm_ad_edit_masp').html()
        var tensp = $('.dm_ad_edit_tensp').val()
        var soluong = $('.dm_ad_edit_soluong').val()
        var giaban = $('.dm_ad_edit_giaban').val()
        var gianhap = $('.dm_ad_edit_gianhap').val()
        var hienan = $('.sp_ad_edit_content_hienan:checked').val()
        var malsp = $('#dm_ad_edit_loaisanpham_chon').val()
        var mancc = $('#dm_ad_edit_ncc_chon').val()
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                'action': 'edit_sp_save',
                'masp': masp,
                'tensp': tensp,
                'soluong': soluong,
                'giaban': giaban,
                'gianhap': gianhap,
                'hienan': hienan,
                'malsp': malsp,
                'mancc': mancc
            },
            dataType: "json",
            success: function(datarp) {

                if (datarp['add_messages'] != 'successfull') {
                    check_update_sp = false;
                }

            }
        })

        //update anh san pham bang hình anh sản phẩm
        var fuData = document.getElementById('dm_ad_edit_img');
        var FileUploadPath = fuData.value;
        if (FileUploadPath != '') {
            $('.formupload_dm_ad_edit_ncc').submit();
        }
        //luu du lieu bai viet
        var baiviet = CKEDITOR.instances.dm_ad_edit_baiviet.getData()
        if (baiviet != "") {
            $.ajax({
                url: "./ajax_baivietadmin.php",
                method: "post",
                data: {
                    'action': 'update_baiviet_sp',
                    'baiviet': baiviet,
                    'masp': masp
                },
                dataType: "json",
                success: function(datarp) {
                    if (datarp['add_messages'] != 'successfull') {
                        check_update_sp = false;
                    }


                }
            })
        }
        if (check_update_sp == true) {
            var thongbao = "Update thành công sản phẩm " + masp;
            addthongbao(thongbao)
            loadsanpham()
        } else {
            alert("xảy ra lỗi,vui lòng kiểm tra và thử lại ")
        }

    })
    $(document).on('submit', '.formupload_dm_ad_edit_ncc', function(e) {

        e.preventDefault();
        var masp = $('.dm_ad_edit_masp').html()
        var dulieu = new FormData(this)
        dulieu.append('action', 'edit_save_sp')
        dulieu.append('masp', masp)
        $.ajax({
            url: "./ajax_haspadmin.php",
            method: "post",
            data: dulieu,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] != 'successfull') {
                    check_update_sp = false;
                }

            }
        })
    })

    // thêm nhiều sản phâm _ thêm sản phẩm bằng excel
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
                url: "./ajax_sanphamadmin.php",
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
                                    '    <td>' + element[4] + '</td>' +
                                    '    <td>' + element[5] + '</td>' +
                                    '    <td>' + element[6] + '</td>';
                                if (element[7] != null) {
                                    databody += '<td><img src="' + element[7] + '" alt=""></td>'
                                } else {
                                    databody += '<td></td>'
                                }
                                if (element[8] != null) {
                                    databody += '<td><img src="' + element[8] + '" alt=""></td>'
                                } else {
                                    databody += '<td></td>'
                                }
                                if (element[9] != null) {
                                    databody += '<td><img src="' + element[9] + '" alt=""></td>'
                                } else {
                                    databody += '<td></td>'
                                }
                                if (element[10] != null) {
                                    databody += '<td><img src="' + element[10] + '" alt=""></td>'
                                } else {
                                    databody += '<td></td>'
                                }
                                if (element[11] != null) {
                                    databody += '<td><img src="' + element[11] + '" alt=""></td>'
                                } else {
                                    databody += '<td></td>'
                                }
                            }
                        });
                        $('.dm_ad_them_content_excel_noidungfile_body').html(databody)
                    }
                    if (trangthaireadsave == 0) {
                        if (datarp['add_messages'] == 'successfull') {
                            var thongbao = " Thêm thành sản phẩm bằng file excel";
                            addthongbao(thongbao)
                            loadsanpham();
                        }
                    }


                }
            })
        })
        // end read file excel
        // chỉnh trạng thái hiển thị
    $(document).on('click', '.i_sp_hienthi', function() {
        var trangthai = $(this).attr('showhidden')
        var masp = $(this).data('masphienthi')
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                "action": "edit_trangthaihienthi",
                "masp": masp,
                "trangthai": trangthai
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "cập nhật trạng thái hiển thị thành công ...";
                    addthongbao(thongbao)
                }

            }
        })
        if (trangthai == 1) {
            $(this).addClass("fa-eye-slash");
            $(this).removeClass("fa-eye");
            $(this).attr("showhidden", 0);
        } else {
            $(this).removeClass("fa-eye-slash");
            $(this).addClass("fa-eye");
            $(this).attr("showhidden", 1);
        }

    })


    // nếu muốn thay đổi cấu hình mặc định bạn có thể thiết lập như sau
    CKEDITOR.config.height = 280;

    CKEDITOR.replace('sp_ad_them_content_title_txt_noi_dung', // lệnh này sẽ thay thế thẻ textarea thành trình soạn thảo
        {
            filebrowserBrowseUrl: './ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });
    CKEDITOR.replace('dm_ad_edit_baiviet', // lệnh này sẽ thay thế thẻ textarea thành trình soạn thảo
        {
            filebrowserBrowseUrl: './ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });
})