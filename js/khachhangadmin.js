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
    })

    $(document).on('click', '.sp_ad_them_hiden .fa-times', function() {
        $('.sp_ad_thems').css('display', 'none')

    })

    //     $('.ad_sps_right_ttc_option_add').on('click', function() {
    //         $('.dm_ad_thems_excel').css('display', 'block')
    //     })

    //     $(document).on('click', '.dm_ad_them_hiden_excel .fa-times', function() {
    //         $('.dm_ad_thems_excel').css('display', 'none')

    //     })


    //     $(document).on('click', '.sp_baiviets_hiden .fa-times', function() {
    //             $('.sp_baiviets').css('display', 'none')


    // })
    // load sản phẩm
    function loadkhachhang() {
        $.ajax({
            url: "./ajax_khachhangadmin.php",
            method: "post",
            data: {
                action: "show_kh"
            },
            success: function(datarp) {
                $('.ad_sps_content_table_noidung').html(datarp)

            }
        })
    }
    loadkhachhang();

    // thêm tài khoản
    $('.sp_ad_them_top_save').on("click", function() {
        if (Validate_addsp() == true) {
            if (confirm("bạn muốn thêm khách hàng này không ?")) {
                // luu bang san pham
                var taikhoan = $('.kh_ad_them_taikhoan').val()
                var matkhau = $('.kh_ad_them_matkhau').val()
                var tenkh = $('.kh_ad_them_tenkh').val()
                var facebook = $('.kh_ad_them_facebook').val()
                var email = $('.kh_ad_them_email').val()
                var address = $('.kh_ad_them_address').val()
                var sdt = $('.kh_ad_them_sdt').val()
                var hienthi = $('#kh_ad_them_hienthi').val()
                $.ajax({
                    url: "./ajax_khachhangadmin.php",
                    method: "post",
                    data: {
                        'action': 'add_save',
                        'taikhoan': taikhoan,
                        'matkhau': matkhau,
                        'tenkh': tenkh,
                        'facebook': facebook,
                        'email': email,
                        'address': address,
                        'sdt': sdt,
                        'hienthi': hienthi
                    },
                    dataType: "json",
                    success: function(datarp) {
                        if (datarp['add_messages'] == 'successfull') {
                            var thongbao = "thêm thành công";
                            addthongbao(thongbao)
                            loadkhachhang()
                        }

                    }
                })
            }

        }

    })

    function Validate_addsp() {
        var taikhoan = $('.kh_ad_them_taikhoan').val()
        var matkhau = $('.kh_ad_them_matkhau').val()
        var tenkh = $('.kh_ad_them_tenkh').val()
        var email = $('.kh_ad_them_email').val()
        if (taikhoan == "" || matkhau == "" || tenkh == "") {
            alert("vui lòng nhập đầy đủ thông tin")
            return false
        }
        if (email.indexOf("@gmail.com") == -1) {
            alert("email sai định dạng")
            return false
        }
        return true

    }

    // end thêm sản phẩm
    // delete dm  1
    function delete_sp(id) {
        $.ajax({
            url: "./ajax_khachhangadmin.php",
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
                    loadkhachhang()
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
            url: "./ajax_khachhangadmin.php",
            method: "post",
            data: {
                action: "delete_nhieu",
                array_id: array_id
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    array_id.forEach(function(element) {
                        var thongbao = "Delete thành công khách hàng " + element;
                        addthongbao(thongbao)
                    })

                    loadkhachhang()
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
                        array_id.push($(this).data('makhxoa'))
                    }
                })
                delete_dm_chon(array_id)
            }
        })
        // edit danh muc
    $(document).on('click', '.ad_dms_content_table_thaotac_edit', function() {
        $('.dm_ad_edits').css('display', 'block')
        var id = $(this).data('masp_edit')
        $.ajax({
            url: "./ajax_khachhangadmin.php",
            method: "post",
            data: {
                action: "edit_show",
                iddm: id
            },
            dataType: "json",
            success: function(datarp) {
                $('.kh_ad_edit_makh').html(datarp['MaKH'])
                $('.kh_ad_edit_taikhoan').val(datarp['TKLogin'])
                $('.kh_ad_edit_matkhau').val(datarp['MKLogin'])
                $('.kh_ad_edit_tenkh').val(datarp['TenKH'])
                $('.kh_ad_edit_facebook').val(datarp['FaceBook'])
                $('.kh_ad_edit_email').val(datarp['Email'])
                $('.kh_ad_edit_address').val(datarp['address'])
                $('.kh_ad_edit_sdt').val(datarp['SDT'])
                $('#kh_ad_edit_hienthi').val(datarp['TrangThaiTK'])
            }
        })

    })
    $(document).on('click', '.dm_ad_edit_hiden .fa-times', function() {
        $('.dm_ad_edits').css('display', 'none')

    })

    $(document).on('click', '.dm_ad_edit_top_save', function() {
        // update bang sanpham
        var MaKH = $('.kh_ad_edit_makh').html()
        var TKLogin = $('.kh_ad_edit_taikhoan').val()
        var MKLogin = $('.kh_ad_edit_matkhau').val()
        var TenKH = $('.kh_ad_edit_tenkh').val()
        var FaceBook = $('.kh_ad_edit_facebook').val()
        var Email = $('.kh_ad_edit_email').val()
        var address = $('.kh_ad_edit_address').val()
        var SDT = $('.kh_ad_edit_sdt').val()
        var TrangThaiTK = $('#kh_ad_edit_hienthi').val()
        $.ajax({
            url: "./ajax_khachhangadmin.php",
            method: "post",
            data: {
                'action': 'edit_kh_save',
                'MaKH': MaKH,
                'TKLogin': TKLogin,
                'MKLogin': MKLogin,
                'TenKH': TenKH,
                'FaceBook': FaceBook,
                'Email': Email,
                'address': address,
                'SDT': SDT,
                'TrangThaiTK': TrangThaiTK
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "update thành công khách hàng " + MaKH;
                    addthongbao(thongbao)
                    loadkhachhang()
                }

            }
        })
    })

    //     // thêm nhiều sản phâm _ thêm sản phẩm bằng excel
    //     var trangthaireadsave = 0;
    //     $('.dm_ad_them_content_excel_btn_submit').on("click", function() {
    //         if (ValidateFileUpload_excel() == true) {
    //             trangthaireadsave = 1;
    //             $('.form_hadm_excel').submit();


    //         }
    //     })

    //     function ValidateFileUpload_excel() {
    //         var fuData = document.getElementById('dm_ad_them_content_excel_fileupload');
    //         var FileUploadPath = fuData.value;

    //         //To check if user upload any file
    //         if (FileUploadPath == '') {
    //             alert("Vui lòng chọn file excel");
    //             return false

    //         } else {
    //             var Extension = FileUploadPath.substring(
    //                 FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

    //             //The file uploaded is an image

    //             if (Extension == "xlsx" || Extension == "xls" || Extension == "xlsm") {

    //                 // To Display
    //                 if (fuData.files && fuData.files[0]) {
    //                     var reader = new FileReader();

    //                     reader.onload = function(e) {
    //                         $('#blah').attr('src', e.target.result);
    //                     }

    //                     reader.readAsDataURL(fuData.files[0]);
    //                 }

    //             }

    //             //The file upload is NOT an image
    //             else {
    //                 alert("Vui lòng chọn tệp hình ảnh : .xlsx , .xls , .xlsm");
    //                 return false
    //             }
    //         }
    //         return true
    //     }
    //     // end raed file excel
    //     // save file danh muc
    //     $('.dm_ad_them_top_save_excel').on("click", function() {
    //         if (ValidateFileUpload_excel() == true) {
    //             trangthaireadsave = 0;
    //             $('.form_hadm_excel').submit();

    //         }
    //     })
    //     $(document).on('submit', '.form_hadm_excel', function(e) {
    //             e.preventDefault();
    //             var dulieu = new FormData(this)
    //             if (trangthaireadsave == 1) {
    //                 dulieu.append('action', 'read_filexecl')
    //             } else {
    //                 dulieu.append('action', 'add_excel_save')
    //             }
    //             $.ajax({
    //                 url: "./ajax_sanphamadmin.php",
    //                 method: "post",
    //                 data: dulieu,
    //                 contentType: false,
    //                 processData: false,
    //                 dataType: "json",
    //                 success: function(datarp) {
    //                     if (trangthaireadsave == 1) {
    //                         var databody = '';
    //                         // bỏ hàng 1 tên database
    //                         // bỏ hàng 2 tên cột
    //                         // bỏ hàng cuối mặc định
    //                         // đọc từ index 2-> lastindex-1
    //                         // tùy theo dữ liệu ban đầu ở đây ta đọc từ đầu luôn
    //                         datarp.forEach(function(element, index) {
    //                             if (index != element.length) {
    //                                 databody += '<tr>' +
    //                                     '    <td>' + element[0] + '</td>' +
    //                                     '    <td>' + element[1] + '</td>' +
    //                                     '    <td>' + element[2] + '</td>' +
    //                                     '    <td>' + element[3] + '</td>' +
    //                                     '    <td>' + element[4] + '</td>' +
    //                                     '    <td>' + element[5] + '</td>' +
    //                                     '    <td>' + element[6] + '</td>';
    //                                 if (element[7] != null) {
    //                                     databody += '<td><img src="' + element[7] + '" alt=""></td>'
    //                                 } else {
    //                                     databody += '<td></td>'
    //                                 }
    //                                 if (element[8] != null) {
    //                                     databody += '<td><img src="' + element[8] + '" alt=""></td>'
    //                                 } else {
    //                                     databody += '<td></td>'
    //                                 }
    //                                 if (element[9] != null) {
    //                                     databody += '<td><img src="' + element[9] + '" alt=""></td>'
    //                                 } else {
    //                                     databody += '<td></td>'
    //                                 }
    //                                 if (element[10] != null) {
    //                                     databody += '<td><img src="' + element[10] + '" alt=""></td>'
    //                                 } else {
    //                                     databody += '<td></td>'
    //                                 }
    //                                 if (element[11] != null) {
    //                                     databody += '<td><img src="' + element[11] + '" alt=""></td>'
    //                                 } else {
    //                                     databody += '<td></td>'
    //                                 }
    //                             }
    //                         });
    //                         $('.dm_ad_them_content_excel_noidungfile_body').html(databody)
    //                     }
    //                     if (trangthaireadsave == 0) {
    //                         if (datarp['add_messages'] == 'successfull') {
    //                             var thongbao = " Thêm thành sản phẩm bằng file excel";
    //                             addthongbao(thongbao)
    //                             loadsanpham();
    //                         }
    //                     }


    //                 }
    //             })
    //         })
    //         // end read file excel
    //         // chỉnh trạng thái hiển thị
    //     $(document).on('click', '.i_sp_hienthi', function() {
    //         var trangthai = $(this).attr('showhidden')
    //         var masp = $(this).data('masphienthi')
    //         $.ajax({
    //             url: "./ajax_sanphamadmin.php",
    //             method: "post",
    //             data: {
    //                 "action": "edit_trangthaihienthi",
    //                 "masp": masp,
    //                 "trangthai": trangthai
    //             },
    //             dataType: "json",
    //             success: function(datarp) {
    //                 if (datarp['add_messages'] == 'successfull') {
    //                     var thongbao = "cập nhật trạng thái hiển thị thành công ...";
    //                     addthongbao(thongbao)
    //                 }

    //             }
    //         })
    //         if (trangthai == 1) {
    //             $(this).addClass("fa-eye-slash");
    //             $(this).removeClass("fa-eye");
    //             $(this).attr("showhidden", 0);
    //         } else {
    //             $(this).removeClass("fa-eye-slash");
    //             $(this).addClass("fa-eye");
    //             $(this).attr("showhidden", 1);
    //         }

    //     })



})