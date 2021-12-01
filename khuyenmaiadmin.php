
<?php
include_once('./headerAdmin.php')
?>
<?php
    if (isset($_COOKIE['usernameAD']) && isset($_COOKIE['MaAD'])) {
        $matable=6;
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
    <link rel="stylesheet" href="./css/khuyenmaiadmin.css">
    <!-- js ck editor-trinh soan thao van ban -->

</head>
<!-- noi dung ở đây -->
<div class="ad_sps">
    <div class="ad_sps_header">
        <div class="ad_sps_left">
            Admin/Khuyến mại
        </div>
        <div class="ad_sps_right">
            <button class="ad_sps_right_add">Thêm Mã khuyến mại</button>
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
                    <th>Mã KM</th>
                    <th>TenKM</th>
                    <th>Ngày Bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th>Giảm giá</th>
                    <th>Mã sản phẩm</th>
                    <th>Thao tác</th>

                </tr>
                <tbody class="ad_sps_content_table_noidung">
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>
                            1
                        </td>
                        <td>
                            sale
                        </td>
                        <td>
                            <input type="date">
                        </td>
                        <td>
                            <input type="date">
                        </td>
                        <td>
                            20
                        </td>
                        <td>
                            1
                        </td>
                        <td class="ad_sps_content_table_thaotac">
                            <i class="fas fa-edit" toggle="tooltip" title="sửa"></i>
                            <i class="fas fa-trash-alt" toggle="tooltip" title="xóa"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>
                            1
                        </td>
                        <td>
                            sale
                        </td>
                        <td>
                            <input type="date">
                        </td>
                        <td>
                            <input type="date">
                        </td>
                        <td>
                            20
                        </td>
                        <td>
                            1
                        </td>
                        <td class="ad_sps_content_table_thaotac">
                            <i class="fas fa-edit" toggle="tooltip" title="sửa"></i>
                            <i class="fas fa-trash-alt" toggle="tooltip" title="xóa"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="sp_ad_thems">
    <div class="sp_ad_them">
        <div class="sp_ad_them_hiden"><i class="fas fa-times"></i></div>
        <div class="sp_ad_them_top">
            <h1>Thêm khuyến mại</h1>
            <button class="sp_ad_them_top_save" data="tooltip" title="click để thêm sản phẩm">Save</button>
        </div>

        <div class="sp_ad_them_content">
            <div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Tên khuyến mại</div>
                    <input type="text" placeholder="Tên khuyến mại" id="km_ad_them_tenkm">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Ngày bắt đầu</div>
                    <input type="date" id="km_ad_them_ngaybd">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Ngày kết thúc</div>
                    <input type="date" id="km_ad_them_ngaykt">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Giảm giá</div>
                    <input type="number" min="0" max="100" placeholder="% khuyến mại" id="km_ad_them_giamgia">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">mã sản phẩm</div>
                    <select name="" id="km_ad_them_masp">
                        <option value="0">Ko chọn sản phẩm nào</option>
                        <!-- <option value="2">2 sao</option>
                        <option value="3">3 sao</option>
                        <option value="4">4 sao</option>
                        <option value="5">5 sao</option> -->
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="dm_ad_thems_excel">
    <div class="dm_ad_them_excel">
        <div class="dm_ad_them_hiden_excel"><i class="fas fa-times"></i></div>
        <div class="dm_ad_them_top_excel">
            <h1> Thêm mã khuyến mại bằng file excel</h1>
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
                            <th>Tên KM</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thức</th>
                            <th>Giảm giá</th>
                            <th>Mã SP</th>
                        </tr>
                    </thead>
                    <tbody class="dm_ad_them_content_excel_noidungfile_body">
                        <!-- <tr>
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
                        </tr> -->
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
            <h1>chỉnh sửa mã khuyến mại - <span class="km_ad_edit_makm"></span></h1>
            <button class="dm_ad_edit_top_save" data="tooltip" title="click để lưu">Save</button>
        </div>

        <div class="dm_ad_edit_content">
            <div class="">
            <div class="row">
                    <div class="dm_ad_edit_content_title">Tên khuyến mại</div>
                    <input type="text" placeholder="Tên khuyến mại" id="km_ad_edit_tenkm">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Ngày bắt đầu</div>
                    <input type="date" id="km_ad_edit_ngaybd">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Ngày kết thúc</div>
                    <input type="date" id="km_ad_edit_ngaykt">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Giảm giá</div>
                    <input type="number" min="0" max="100" placeholder="% khuyến mại" id="km_ad_edit_giamgia">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">mã sản phẩm</div>
                    <select name="" id="km_ad_edit_masp">
                        <option value="0">Ko chọn sản phẩm nào</option>
                        <!-- <option value="2">2 sao</option>
                        <option value="3">3 sao</option>
                        <option value="4">4 sao</option>
                        <option value="5">5 sao</option> -->
                    </select>
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

<script src="./js/khuyenmaiadmin.js"></script>

<!-- kết thúc nội dung -->
<!-- footer -->
<?php
include_once('./footerAdmin.php')
?>