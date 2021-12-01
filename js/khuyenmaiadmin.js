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
    //load  khuyến mại
    function loadkhuyenmai() {
        $.ajax({
            url: "./ajax_khuyenmaiadmin.php",
            method: "post",
            data: {
                action: "show_km"
            },
            success: function(datarp) {
                $('.ad_sps_content_table_noidung').html(datarp)

            }
        })
    }
    loadkhuyenmai();
    // // lấy sản phẩm
    // function data_sanpham(the) {
    //     $.ajax({
    //         url: "./ajax_sanphamadmin.php",
    //         method: "post",
    //         data: {
    //             action: "show_data_sanphm_bv",
    //         },
    //         success: function(datarp) {
    //             $(the).html(datarp)

    //         }
    //     })
    // }

    function data_sanpham_full(the) {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                action: "show_data_hasp_ha",
            },
            success: function(datarp) {
                $(the).append(datarp)

            }
        })
    }

    // function data_khachhang_full(the) {
    //     $.ajax({
    //         url: "./ajax_khachhangadmin.php",
    //         method: "post",
    //         data: {
    //             action: "show_data_hasp_ha",
    //         },
    //         success: function(datarp) {
    //             $(the).html(datarp)

    //         }
    //     })
    // }
    // thêm khuyến mại
    $('.ad_sps_right_add').on('click', function() {
        $('.sp_ad_thems').css('display', 'block')
        data_sanpham_full('#km_ad_them_masp')
    })

    $(document).on('click', '.sp_ad_them_hiden .fa-times', function() {
        $('.sp_ad_thems').css('display', 'none')

    })
    $('.sp_ad_them_top_save').on("click", function() {
        if (Validate_addsave() == true) {
            if (confirm("bạn muốn thêm khuyến mại này không ?")) {
                var tenkm = $('#km_ad_them_tenkm').val()
                var ngaybd = $('#km_ad_them_ngaybd').val()
                var ngaykt = $('#km_ad_them_ngaykt').val()
                var giamgia = $('#km_ad_them_giamgia').val()
                var masp = $('#km_ad_them_masp').val()
                $.ajax({
                    url: "./ajax_khuyenmaiadmin.php",
                    method: "post",
                    data: {
                        'action': 'add_save_km',
                        'tenkm': tenkm,
                        'ngaybd': ngaybd,
                        'ngaykt': ngaykt,
                        'giamgia': giamgia,
                        'masp': masp
                    },
                    dataType: "json",
                    success: function(datarp) {
                        if (datarp['add_messages'] == 'successfull') {
                            var messeges = "thêm thành công "
                            addthongbao(messeges)
                            loadkhuyenmai()
                        }

                    }
                })
            }
        }

    })

    function Validate_addsave() {
        var tenkm = $('#km_ad_them_tenkm').val()
        var ngaybd = $('#km_ad_them_ngaybd').val()
        var ngaykt = $('#km_ad_them_ngaykt').val()
        var giamgia = $('#km_ad_them_giamgia').val()
        var masp = $('#km_ad_them_masp').val()
        if (ngaybd == "" || ngaykt == "" || giamgia == "") {
            alert("nhập tối thiểu ngày bắt đầu , ngày kết thúc và mã giảm giá")
            return false;
        }
        if (ngaybd > ngaykt) {
            alert("ngày bắt đầu không thể lớn hơn ngày kết thúc")
            return false;
        }
        return true;
    }

    // delete dm  1
    function delete_sp(id) {
        $.ajax({
            url: "./ajax_khuyenmaiadmin.php",
            method: "post",
            data: {
                action: "delete",
                iddm: id
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "Delete thành công  khuyến mại  " + id;
                    addthongbao(thongbao)
                    loadkhuyenmai()
                }

            }
        })
    }
    $(document).on('click', '.ad_dms_content_table_thaotac_delete', function() {
        if (confirm("Bạn có chắc muốn xóa  khuyến mại này")) {
            delete_sp($(this).data('masp_xoa'))

        }
    })

    // delete nhieu dm
    function delete_dm_chon(array_id) {
        $.ajax({
            url: "./ajax_khuyenmaiadmin.php",
            method: "post",
            data: {
                action: "delete_nhieu",
                array_id: array_id
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    array_id.forEach(function(element) {
                        var thongbao = "Delete thành công mã km " + element;
                        addthongbao(thongbao)
                    })

                    loadkhuyenmai()
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
        data_sanpham_full('#km_ad_edit_masp')
        var id = $(this).data('makm')
        $.ajax({
            url: "./ajax_khuyenmaiadmin.php",
            method: "post",
            data: {
                action: "edit_show",
                iddm: id
            },
            dataType: "json",
            success: function(datarp) {
                var array_ngaybd = datarp['NgayBatDau'].split(" ")
                var array_ngaykt = datarp['NgayKetThuc'].split(" ")
                $('.km_ad_edit_makm').html(datarp['MaKM'])
                $('#km_ad_edit_tenkm').val(datarp['TenKM'])
                $('#km_ad_edit_ngaybd').val(array_ngaybd[0])
                $('#km_ad_edit_ngaykt').val(array_ngaykt[0])
                $('#km_ad_edit_giamgia').val(datarp['GiamGia'])
                $('#km_ad_edit_masp').val(datarp['MaSP'])

            }
        })


    })
    $(document).on('click', '.dm_ad_edit_hiden .fa-times', function() {
        $('.dm_ad_edits').css('display', 'none')

    })
    $(document).on('click', '.dm_ad_edit_top_save', function() {
        // update bang sanpham
        var MaKM = $('.km_ad_edit_makm').html()
        var TenKM = $('#km_ad_edit_tenkm').val()
        var NgayBatDau = $('#km_ad_edit_ngaybd').val()
        var NgayKetThuc = $('#km_ad_edit_ngaykt').val()
        var GiamGia = $('#km_ad_edit_giamgia').val()
        var MaSP = $('#km_ad_edit_masp').val()
        $.ajax({
            url: "./ajax_khuyenmaiadmin.php",
            method: "post",
            data: {
                'action': 'update_khuyenmai',
                'MaKM': MaKM,
                'TenKM': TenKM,
                'NgayBatDau': NgayBatDau,
                'NgayKetThuc': NgayKetThuc,
                'GiamGia': GiamGia,
                'MaSP': MaSP
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "update thành công "
                    addthongbao(thongbao)
                    loadkhuyenmai()
                }


            }
        })

    })

    // // thêm nhiều sản phâm _ thêm sản phẩm bằng excel
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
                url: "./ajax_khuyenmaiadmin.php",
                method: "post",
                data: dulieu,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(datarp) {
                    if (trangthaireadsave == 1) {
                        var databody = '';
                        datarp.forEach(function(element, index) {
                            if (index != element.length) {
                                databody += '<tr>' +
                                    '    <td>' + element[0] + '</td>' +
                                    '    <td>' + element[1] + '</td>' +
                                    '    <td>' + element[2] + '</td>' +
                                    '    <td>' + element[3] + '</td>' +
                                    '    <td>' + element[4] + '</td>';
                            }
                        });
                        $('.dm_ad_them_content_excel_noidungfile_body').html(databody)
                    }
                    if (trangthaireadsave == 0) {
                        if (datarp['add_messages'] == 'successfull') {
                            var thongbao = " Thêm thành công khuyến mại bằng file excel";
                            addthongbao(thongbao)
                            loadkhuyenmai();
                        }
                    }


                }
            })
        })
        // end read file excel

})