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
        data_sanpham('#sp_ad_them_sanpham_chon')
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
    function loadbaiviet() {
        $.ajax({
            url: "./ajax_baivietadmin.php",
            method: "post",
            data: {
                action: "show_bv"
            },
            success: function(datarp) {
                $('.ad_sps_content_table_noidung').html(datarp)

            }
        })
    }
    loadbaiviet();
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

    // thêm bài viết
    $('.sp_ad_them_top_save').on("click", function() {
        if (Validate_addsp() == true) {
            if (confirm("bạn muốn thêm bài viết này không ?")) {
                // luu bang san pham
                var masp = $('#sp_ad_them_sanpham_chon').val()
                var baiviet = CKEDITOR.instances.bv_ad_them_baiviet.getData()
                $.ajax({
                    url: "./ajax_baivietadmin.php",
                    method: "post",
                    data: {
                        'action': 'add_save_bv',
                        'masp': masp,
                        'baiviet': baiviet
                    },
                    dataType: "json",
                    success: function(datarp) {
                        if (datarp['add_messages'] == 'successfull') {
                            data_sanpham('#sp_ad_them_sanpham_chon')
                            var thongbao = "thêm thành công";
                            addthongbao(thongbao)
                            loadbaiviet()
                        }

                    }
                })
            }

        }

    })

    function Validate_addsp() {
        var masp = $('#sp_ad_them_sanpham_chon').val()
        var baiviet = CKEDITOR.instances.bv_ad_them_baiviet.getData()
        if (masp == "" || masp == null || baiviet == "") {
            alert("vui lòng nhập đầy đủ thông tin")
            return false
        }
        return true

    }

    // // end thêm sản phẩm
    // delete dm  1
    function delete_sp(id) {
        $.ajax({
            url: "./ajax_baivietadmin.php",
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
                    loadbaiviet()
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
            url: "./ajax_baivietadmin.php",
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

                    loadbaiviet()
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
        $('.kh_ad_edit_makv').html($(this).data('mabv_edit'))


    })
    $(document).on('click', '.dm_ad_edit_hiden .fa-times', function() {
        $('.dm_ad_edits').css('display', 'none')

    })

    $(document).on('click', '.dm_ad_edit_top_save', function() {
        // update bang sanpham
        var mabv = $('.kh_ad_edit_makv').html()
        var baiviet = CKEDITOR.instances.bv_ad_edit_baiviet.getData()
        if (baiviet != "") {
            $.ajax({
                url: "./ajax_baivietadmin.php",
                method: "post",
                data: {
                    'action': 'update_baiviet_bv',
                    'baiviet': baiviet,
                    'mabv': mabv
                },
                dataType: "json",
                success: function(datarp) {
                    if (datarp['add_messages'] == 'successfull') {
                        var thongbao = "update thành công  baiviet " + mabv;
                        addthongbao(thongbao)
                        loadbaiviet()
                    }


                }
            })
        }
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

    CKEDITOR.config.height = 550;
    CKEDITOR.replace('bv_ad_edit_baiviet', // lệnh này sẽ thay thế thẻ textarea thành trình soạn thảo
        {
            filebrowserBrowseUrl: './ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });
    CKEDITOR.replace('bv_ad_them_baiviet', // lệnh này sẽ thay thế thẻ textarea thành trình soạn thảo
        {
            filebrowserBrowseUrl: './ckfinder/ckfinder.html',
            filebrowserImageBrowseUrl: './ckfinder/ckfinder.html?type=Images',
            filebrowserUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: './ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
        });

})