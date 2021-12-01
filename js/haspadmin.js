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

    function loadhinhanh() {
        $.ajax({
            url: "./ajax_haspadmin.php",
            method: "post",
            data: {
                action: "show_hasp"
            },
            success: function(datarp) {
                $('.ad_sps_content_table_noidung').html(datarp)

            }
        })
    }
    loadhinhanh();

    function data_sanpham(the) {
        $.ajax({
            url: "./ajax_sanphamadmin.php",
            method: "post",
            data: {
                action: "show_data_sanphm_ha",
            },
            success: function(datarp) {
                $(the).html(datarp)

            }
        })
    }

    function data_sanpham_sp(the) {
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
    // thêm hinhanh
    $('.ad_sps_right_add').on('click', function() {
        $('.sp_ad_thems').css('display', 'block')
        data_sanpham('#ha_ad_them_sanpham')
    })

    $(document).on('click', '.sp_ad_them_hiden .fa-times', function() {
        $('.sp_ad_thems').css('display', 'none')

    })
    $('.sp_ad_them_top_save').on("click", function() {
        if (Validate_fileupload() == true) {
            if (confirm("bạn muốn update hình ảnh này ?")) {
                // luu bang san pham
                var fuData = document.getElementById('ip_img_add_sanpham');
                var FileUploadPath = fuData.value;
                if (FileUploadPath != '') {
                    $('.formupload_img_addsp').submit();
                }
            }

        }

    })
    $(document).on('submit', '.formupload_img_addsp', function(e) {

        e.preventDefault();
        var masp = $('#ha_ad_them_sanpham').val()
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
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "update thành công hình ảnh của sản phẩm " + masp;
                    addthongbao(thongbao)
                    loadhinhanh()
                }

            }
        })
    })

    function Validate_fileupload() {
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
        return true
    }
    // delete dm  1
    function delete_hasp(id) {
        $.ajax({
            url: "./ajax_haspadmin.php",
            method: "post",
            data: {
                action: "delete",
                iddm: id
            },
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "Delete thành công hình ảnh " + id;
                    addthongbao(thongbao)
                    loadhinhanh()
                }

            }
        })
    }
    $(document).on('click', '.ad_dms_content_table_thaotac_delete', function() {
            if (confirm("Bạn có chắc muốn xóa sản phẩm này")) {
                delete_hasp($(this).data('masp_xoa'))

            }
        })
        // delete nhieu dm
    function delete_dm_chon(array_id) {
        $.ajax({
            url: "./ajax_haspadmin.php",
            method: "post",
            data: {
                action: "delete_nhieu",
                array_id: array_id
            },
            dataType: "json",
            success: function(datarp) {

                if (datarp['add_messages'] == 'successfull') {
                    array_id.forEach(function(element) {
                        var thongbao = "Delete thành công hình ảnh " + element;
                        addthongbao(thongbao)
                    })

                    loadhinhanh()
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
        data_sanpham_sp('#ha_ad_edit_masp')
        $('.hasp_edit_haspshow').attr("src", $($($(this).parent().parent().children()[2]).children()[0]).attr('src'))
        $('.kh_ad_edit_maha').html($(this).data('mabv_edit'))
            // $('#ha_ad_edit_masp').val(37) gán trực tiếp ko nhận
        var masp = $($(this).parent().parent().children()[3]).html()
        $.ajax({
            url: "./ajax_haspadmin.php",
            method: "post",
            data: {
                'action': 'truyen_masp_edithasp'
            },
            success: function(datarp) {
                $('#ha_ad_edit_masp').val(masp)

            }
        })
    })
    $(document).on('click', '.dm_ad_edit_hiden .fa-times', function() {
        $('.dm_ad_edits').css('display', 'none')

    })

    $(document).on('click', '.dm_ad_edit_top_save', function() {
        // update bang sanpham

        var fuData = document.getElementById('ip_img_add_hasp');
        var FileUploadPath = fuData.value;
        //To check if user upload any file
        if (FileUploadPath == '') {
            var maha = $('.kh_ad_edit_maha').html()
            var masp = $('#ha_ad_edit_masp').val()
            $.ajax({
                url: "./ajax_haspadmin.php",
                method: "post",
                data: {
                    'action': 'update_hasp_koupload',
                    'mahasp': maha,
                    'masp': masp
                },
                dataType: "json",
                success: function(datarp) {
                    if (datarp['add_messages'] == 'successfull') {
                        var thongbao = "update thành công hình ảnh " + maha;
                        addthongbao(thongbao)
                        loadhinhanh()
                    }

                }
            })
        } else {
            $('.formupload_img_hasp').submit()
        }
    })
    $('.formupload_img_hasp').on('submit', function(e) {
        e.preventDefault()
        var masp = $('#ha_ad_edit_masp').val()
        var maha = $('.kh_ad_edit_maha').html()
        var dulieu = new FormData(this)
        dulieu.append('action', 'update_hasp_coupload')
        dulieu.append('masp', masp)
        dulieu.append('mahasp', maha)
        $.ajax({
            url: "./ajax_haspadmin.php",
            method: "post",
            data: dulieu,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(datarp) {
                if (datarp['add_messages'] == 'successfull') {
                    var thongbao = "update thành công hình ảnh " + maha;
                    addthongbao(thongbao)
                    loadhinhanh()
                }

            }
        })
    })

    // doc file anh bang javascript
    $("#ip_img_add_hasp").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.hasp_edit_haspshow').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    // 
})