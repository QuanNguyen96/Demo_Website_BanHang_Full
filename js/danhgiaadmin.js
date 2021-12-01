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








    //     $(document).on('click', '.sp_baiviets_hiden .fa-times', function() {
    //             $('.sp_baiviets').css('display', 'none')


    // })
    //load đánh giá
    function loaddanhgia() {
        $.ajax({
            url: "./ajax_danhgiaadmin.php",
            method: "post",
            data: {
                action: "show_dg"
            },
            success: function(datarp) {
                $('.ad_sps_content_table_noidung').html(datarp)

            }
        })
    }
    loaddanhgia();
    // lấy sản phẩm
    function data_sanpham(the) {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                action: "show_data_sanphm_bv",
            },
            success: function(datarp) {
                $(the).html(datarp)

            }
        })
    }

    function data_sanpham_full(the) {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                action: "show_data_hasp_ha",
            },
            success: function(datarp) {
                $(the).html(datarp)

            }
        })
    }

    function data_khachhang_full(the) {
        $.ajax({
            url: "./ajax_khachhangadmin.php",
            method: "post",
            data: {
                action: "show_data_hasp_ha",
            },
            success: function(datarp) {
                $(the).html(datarp)

            }
        })
    }
    // thêm đánh giá
    $('.ad_sps_right_add').on('click', function() {
        $('.sp_ad_thems').css('display', 'block')
        data_sanpham_full('#dg_ad_them_sanpham')
        data_khachhang_full('#dg_ad_them_khachhang')
    })

    $(document).on('click', '.sp_ad_them_hiden .fa-times', function() {
        $('.sp_ad_thems').css('display', 'none')

    })
    $('.sp_ad_them_top_save').on("click", function() {
            if (confirm("bạn muốn thêm đánh giánày không ?")) {
                // luu bang san pham
                var masp = $('#dg_ad_them_sanpham').val()
                var makh = $('#dg_ad_them_khachhang').val()
                var sao = $('#dg_ad_them_sao').val()
                var thich = $('#dg_ad_them_thich').val()
                $.ajax({
                    url: "./ajax_danhgiaadmin.php",
                    method: "post",
                    data: {
                        'action': 'add_save_dg',
                        'masp': masp,
                        'makh': makh,
                        'sao': sao,
                        'thich': thich
                    },
                    dataType: "json",
                    success: function(datarp) {
                        if (datarp['add_messages'] == 'successfull') {
                            addthongbao(datarp['messages'])
                            loaddanhgia()
                        }

                    }
                })
            }

        })
        // delete dm  1
    function delete_sp(id) {
        $.ajax({
            url: "./ajax_danhgiaadmin.php",
            method: "post",
            data: {
                action: "delete",
                iddm: id
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "Delete thành công đánh giá  " + id;
                    addthongbao(thongbao)
                    loaddanhgia()
                }

            }
        })
    }
    $(document).on('click', '.ad_dms_content_table_thaotac_delete', function() {
        if (confirm("Bạn có chắc muốn xóa đánh giá này")) {
            delete_sp($(this).data('masp_xoa'))

        }
    })

    // delete nhieu dm
    function delete_dm_chon(array_id) {
        $.ajax({
            url: "./ajax_danhgiaadmin.php",
            method: "post",
            data: {
                action: "delete_nhieu",
                array_id: array_id
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    array_id.forEach(function(element) {
                        var thongbao = "Delete thành công  baiviet " + element;
                        addthongbao(thongbao)
                    })

                    loaddanhgia()
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
                    array_id.push($(this).data('mabvxoa'))
                }
            })
            delete_dm_chon(array_id)
        }
    })

    // edit danh muc
    $(document).on('click', '.ad_dms_content_table_thaotac_edit', function() {
        $('.dm_ad_edits').css('display', 'block')
        $('#dg_ad_edit_sanpham').html($(this).data('masp'))
        $('#dg_ad_edit_khachhang').html($(this).data('makh'))
        $('#dg_ad_edit_sao').val($(this).data('sao'))
        $('#dg_ad_edit_thich').val($(this).data('thich'))
        $('.dg_ad_edit_madg').html($(this).data('madg'))

    })
    $(document).on('click', '.dm_ad_edit_hiden .fa-times', function() {
        $('.dm_ad_edits').css('display', 'none')

    })
    $(document).on('click', '.dm_ad_edit_top_save', function() {
        // update bang sanpham
        var masp = $('#dg_ad_edit_sanpham').html()
        var makh = $('#dg_ad_edit_khachhang').html()
        var sao = $('#dg_ad_edit_sao').val()
        var thich = $('#dg_ad_edit_thich').val()
        var madg = $('.dg_ad_edit_madg').html()
        $.ajax({
            url: "./ajax_danhgiaadmin.php",
            method: "post",
            data: {
                'action': 'update_danhgia_dg',
                'masp': masp,
                'makh': makh,
                'madg': madg,
                'sao': sao,
                'thich': thich
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "update thành công "
                    addthongbao(thongbao)
                    loaddanhgia()
                }


            }
        })

    })

    // thêm nhiều sản phâm _ thêm sản phẩm bằng excel
    $('.ad_sps_right_ttc_option_add').on('click', function() {
        $('.dm_ad_thems_excel').css('display', 'block')
    })

    $(document).on('click', '.dm_ad_them_hiden_excel .fa-times', function() {
        $('.dm_ad_thems_excel').css('display', 'none')

    })
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
                url: "./ajax_danhgiaadmin.php",
                method: "post",
                data: dulieu,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(datarp) {
                    if (trangthaireadsave == 1) {
                        var databody = '';
                        datarp.forEach(function(element, index) {
                            databody += '<tr>' +
                                '    <td>' + element[0] + '</td>' +
                                '    <td>' + element[1] + '</td>' +
                                '    <td>' + element[2] + '</td>' +
                                '    <td>' + element[3] + '</td>';
                        });
                        $('.dm_ad_them_content_excel_noidungfile_body').html(databody)
                    }
                    if (trangthaireadsave == 0) {
                        if (datarp['add_messages'] == 'successfull') {
                            var thongbao = " Thêm thành sản phẩm bằng file excel";
                            addthongbao(thongbao)
                            loaddanhgia();
                        }
                    }


                }
            })
        })
        // end read file excel

})