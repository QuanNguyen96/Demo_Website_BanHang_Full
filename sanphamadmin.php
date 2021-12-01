
<?php
include_once('./headerAdmin.php')
?>
<?php
    if (isset($_COOKIE['usernameAD']) && isset($_COOKIE['MaAD'])) {
        $matable=1;
        $acc = new PhanQuyenTableModel(0, 0, 0, 0, 0);
        $result=$acc->search_phan_quyen($conn,$_COOKIE['MaAD'],$matable);
        $quyen=0;
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            $quyen=$row['TrangThai'];
        }
        if($quyen==0){
            echo "Tài khoản của bạn ko có quyền truy cập trang web này";
            die();
        }

    }
    else{
        echo "Bạn có phải là admin, nếu đúng thì vui lòng đăng nhập và truy cập trang web";
        die();
    }
    ?>
<head>
    <!-- css sanphamadmin.css -->
    <link rel="stylesheet" href="./css/sanphamadmin.css">
    <!-- js ck editor-trinh soan thao van ban -->
    <script src="./ckeditor/ckeditor.js"></script>
    <script src="./ckeditor/ckeditor.js"></script>

</head>
<!-- noi dung ở đây -->
<div class="ad_sps">
    <div class="ad_sps_header">
        <div class="ad_sps_left">
            Admin/Sản phẩm
        </div>
        <div class="ad_sps_right">
            <button class="ad_sps_right_add">Thêm sản phẩm</button>
            <div class="ad_sps_right_ttc">Thao tác chọn
                <ul class="ad_sps_right_ttc_option">
                    <li class="ad_sps_right_ttc_option_add">
                        Thêm bằng file excel
                    </li>
                    <li class="ad_dms_right_ttc_option_xoavungchon">
                        Xóa theo vùng chọn
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <div class="ad_sps_content">
        <div>

        </div>
        <div class="ad_sps_content_table">
            <table>
                <tr>
                    <th class="checkbox_dm_full">
                        <input type="checkbox">
                    </th>
                    <th>Mã SP</th>
                    <th>Hình ảnh</th>
                    <th>Tên SP</th>
                    <th>
                        Số lượng
                    </th>
                    <th>
                        giá bán
                    </th>
                    <th>
                        giá nhập
                    </th>
                    <th>
                        Hiển thị
                    </th>
                    <th>
                        Loại sản phẩm
                    </th>
                    <th>
                        Nhà cung cấp
                    </th>
                    <th>
                        Mã Bài Viết
                    </th>
                    <th>thao tác</th>

                </tr>
                <tbody class="ad_sps_content_table_noidung">


                    <!-- <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>1</td>
                        <td><img src="./upload/image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt=""></td>
                        <td>
                            Tên sản phẩm
                        </td>
                        <td>
                            Tên sản phẩm
                        </td>
                        <td>
                            giá
                        </td>
                        <td>
                            loại sản phẩm
                        </td>
                        <td>
                            Danh mục
                        </td>
                        <td>
                            Danh mục
                        </td>
                        <td>
                            Danh mục
                        </td>
                        <td>
                            1 <button>xem</button>
                        </td>
                        <td><i class="fas fa-eye" toggle="tooltip" title="Hiển thị"></i></td>
                        <td class="ad_sps_content_table_thaotac">
                            <i class="fas fa-edit" toggle="tooltip" title="sửa"></i>
                            <i class="fas fa-trash-alt" toggle="tooltip" title="xóa"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>2</td>
                        <td><img src="./upload/image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt=""></td>
                        <td>
                            Tên sản phẩm
                        </td>
                        <td>
                            Tên sản phẩm
                        </td>
                        <td>
                            giá
                        </td>
                        <td>
                            loại sản phẩm
                        </td>
                        <td>
                            Danh mục
                        </td>
                        <td>
                            Danh mục
                        </td>
                        <td>
                            Danh mục
                        </td>
                        <td>
                            1 <button>xem</button>
                        </td>
                        <td><i class="fas fa-eye-slash" toggle="tooltip" title="ko hiển thị"></i></td>
                        <td class="ad_sps_content_table_thaotac">
                            <i class="fas fa-edit" toggle="tooltip" title="sửa"></i>
                            <i class="fas fa-trash-alt" toggle="tooltip" title="xóa"></i>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="sp_ad_thems">
    <div class="sp_ad_them">
        <div class="sp_ad_them_hiden"><i class="fas fa-times"></i></div>
        <div class="sp_ad_them_top">
            <h1> Thêm sản phẩm</h1>
            <button class="sp_ad_them_top_save" data="tooltip" title="click để thêm sản phẩm">Save</button>
        </div>

        <div class="sp_ad_them_content">
            <div>
                <div class="row">
                    <div class="sp_ad_them_content_title">tên sản phẩm</div>
                    <input type="text" class="sp_ad_them_tensp">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">số lượng</div>
                    <input type="number" min="0" value="0" class="sp_ad_them_soluong">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">giá bán</div>
                    <input type="number" min="0" value="0" class="sp_ad_them_giaban">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">giá nhập</div>
                    <input type="number" min="0" value="0" class="sp_ad_them_gianhap">
                </div>
                <div class="row trangthaihienthi">
                    <div><input class="sp_ad_them_content_hienan" name="sp_ad_them_content_show" checked type="radio" value="1" /><label for="sp_ad_them_content_show1"> hiện</label> </div>
                    <div><input class="sp_ad_them_content_hienan" name="sp_ad_them_content_show" type="radio" value="0" /><label for="sp_ad_them_content_show2"> ẩn</label></div>

                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Nhà cung cấp</div>
                    <select name="" id="sp_ad_them_nhacc">
                        <!-- <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option> -->
                    </select>
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Loại sản phẩm</div>
                    <select name="" id="sp_ad_them_loaisp">
                        <!-- <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option> -->
                    </select>
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">hình ảnh</div>
                    <form enctype="multipart/form-data" method="post" class="formupload_img_addsp">
                        <input type="file" name="file_haaddsp[]" multiple id="ip_img_add_sanpham">
                    </form>
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">bài viết</div>
                    <textarea id="sp_ad_them_content_title_txt_noi_dung"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="dm_ad_thems_excel">
    <div class="dm_ad_them_excel">
        <div class="dm_ad_them_hiden_excel"><i class="fas fa-times"></i></div>
        <div class="dm_ad_them_top_excel">
            <h1> Thêm loại sản phẩm bằng file excel</h1>
            <button class="dm_ad_them_top_save_excel" data="tooltip" title="click để lưu">Save</button>
        </div>

        <div class="dm_ad_them_content_excel">
            <div>
                <form method="POST" enctype='multipart/form-data' class="form_hadm_excel">
                    <label for="">Upload file &nbsp;</label>
                    <input type="file" name="dm_ad_them_content_excel_fileupload" id="dm_ad_them_content_excel_fileupload">
                    <span class="dm_ad_them_content_excel_btn_submit" name="dm_ad_them_content_excel_btn_submit">Xem trước file</span>
                </form>
            </div>
            <div class="dm_ad_them_content_excel_noidungfile">
      
                <table>
                    <thead>
                        <tr>
                            <th colspan="12">
                                loại sản phẩm (shop D & Q)
                            </th>
                        </tr>
                        <tr>
                            <th>Tên SP</th>
                            <th>Số lượng</th>
                            <th>Giá Bán</th>
                            <th>Giá Nhập</th>
                            <th>Hiển thị</th>
                            <th>Mã Loại SP</th>
                            <th>Mã NCC</th>
                            <th colspan="5">Hình ảnh</th>
                        </tr>
                    </thead>
                    <tbody class="dm_ad_them_content_excel_noidungfile_body">
                        <tr>
                            <th>sản phẩm 01</th>
                            <th>100</th>
                            <th>100000</th>
                            <th>90000</th>
                            <th>0</th>
                            <th>41</th>
                            <th>56</th>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                        </tr>
                        <tr>
                            <th>sản phẩm 01</th>
                            <th>100</th>
                            <th>100000</th>
                            <th>90000</th>
                            <th>0</th>
                            <th>41</th>
                            <th>56</th>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                        </tr>
                        <tr>
                            <th>sản phẩm 01</th>
                            <th>100</th>
                            <th>100000</th>
                            <th>90000</th>
                            <th>0</th>
                            <th>41</th>
                            <th>56</th>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                        </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<div class="dm_ad_edits">
    <div class="dm_ad_edit">
        <div class="dm_ad_edit_hiden"><i class="fas fa-times"></i></div>
        <div class="dm_ad_edit_top">
            <h1>chỉnh sửa sản phẩm <span class="dm_ad_edit_masp"></span></h1>
            <button class="dm_ad_edit_top_save" data="tooltip" title="click để lưu">Save</button>
        </div>

        <div class="dm_ad_edit_content">
            <div class="">
                <div class="row">
                    <div class="dm_ad_edit_content_title">tên loại sản phẩm</div>
                    <input type="text" class="dm_ad_edit_tensp">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Số lượng</div>
                    <input type="number" value="0" class="dm_ad_edit_soluong">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Giá bán</div>
                    <input type="number" value="0" class="dm_ad_edit_giaban">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Giá nhập</div>
                    <input type="number" value="0" class="dm_ad_edit_gianhap">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Hiển thị</div>
                    <div class="dm_ad_edit_gianhap_hienthi">
                        <div><input class="sp_ad_edit_content_hienan" name="sp_ad_edit_content_show" checked type="radio" value="1" /><label for="sp_ad_edit_content_show1"> hiện</label> </div>
                        <div><input class="sp_ad_edit_content_hienan" name="sp_ad_edit_content_show" type="radio" value="0" /><label for="sp_ad_edit_content_show2"> ẩn</label></div>

                    </div>
                </div>

                <div class="row">
                    <div class="dm_ad_edit_content_title">Loại sản phẩm</div>

                    <select name="" id="dm_ad_edit_loaisanpham_chon">
                        <option value="3">1</option>
                        <option value="4">2</option>
                    </select>

                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Nhà cung cấp</div>
                    <select name="" id="dm_ad_edit_ncc_chon">
                        <option value="3">1</option>
                        <option value="4">2</option>
                    </select>
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">hình ảnh</div>
                    <form enctype="multipart/form-data" method="post" class="formupload_dm_ad_edit_ncc">
                        <input type="file" name="file_eidt_hasp[]" multiple id="dm_ad_edit_img">
                    </form>

                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Bài viết</div>
                    <textarea id="dm_ad_edit_baiviet"></textarea>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="sp_baiviets">

    <div class="sp_baiviet">
        <div class="sp_baiviets_hiden"><i class="fas fa-times"></i></div>
        <div class="sp_baiviet_noidung">

        </div>
    </div>

</div>
<!-- phan thong bao -->
<div class="danhmuc_thongbao">
</div>
<!-- end thong bao -->

<script src="./js/sanphamadmin.js"></script>

<!-- kết thúc nội dung -->
<!-- footer -->
<?php
include_once('./footerAdmin.php')
?>