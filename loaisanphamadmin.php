
<?php
include_once('./headerAdmin.php')
?>
<?php
    if (isset($_COOKIE['usernameAD']) && isset($_COOKIE['MaAD'])) {
        $matable=2;
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
    <!-- css danhmucadmin -->
    <link rel="stylesheet" href="./css/loaisanphamadmin.css">

</head>
<!-- noi dung ở đây -->

<div class="ad_dms">
    <div class="ad_dms_header">
        <div class="ad_dms_left">
            Admin/Loại Sản phẩm
        </div>
        <div class="ad_dms_right">
            <button class="ad_dms_right_add">Thêm sản phẩm</button>
            <div class="ad_dms_right_ttc">Thao tác chọn
                <ul class="ad_dms_right_ttc_option">
                    <li class="ad_dms_right_ttc_option_xoavungchon">
                        Xóa theo vùng chọn
                    </li>
                    <li class="ad_dms_right_ttc_option_add">
                        Thêm bằng file excel
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="ad_dms_content">
        <div>

        </div>
        <div class="ad_dms_content_table">
            <table>
                <tr>
                    <th class="checkbox_dm_full">
                        <input type="checkbox">
                    </th>
                    <th>STT</th>
                    <th>ảnh</th>
                    <th>
                        Tên Loại sản phẩm
                    </th>
                    <th>
                        Tên danh mục
                    </th>
                    <th>thao tác</th>

                </tr>
                <tbody class="ad_dms_content_show">
                    <!-- <tr>
                            <td>
                                <input type="checkbox">
                            </td>
                            <td>1</td>
                            <td><img src="./upload/image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt=""></td>
                            <td>
                                Tên sản phẩm
                            </td>
                            <td class="ad_dms_content_table_thaotac">
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
                                Tên loại sản phẩm
                            </td>
                            <td class="ad_dms_content_table_thaotac">
                                <i class="fas fa-edit" toggle="tooltip" title="sửa"></i>
                                <i class="fas fa-trash-alt" toggle="tooltip" title="xóa"></i>
                            </td>
                        </tr> -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="dm_ad_thems">
    <div class="dm_ad_them">
        <div class="dm_ad_them_hiden"><i class="fas fa-times"></i></div>
        <div class="dm_ad_them_top">
            <h1> Thêm Loại sản phẩm</h1>
            <button class="dm_ad_them_top_save" data="tooltip" title="click để lưu">Save</button>
        </div>

        <div class="dm_ad_them_content">
            <div class="">
                <div class="row">
                    <div class="dm_ad_them_content_title">tên loại sản phẩm</div>
                    <input type="text" class="dm_ad_them_tendm">
                </div>
                <div class="row">
                    <div class="dm_ad_them_content_title">Danh mục</div>
                    <div class="dm_ad_them_content_title_dm">
                        <select name="" id="dm_ad_them_content_title_dm_chon">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="dm_ad_them_content_title">hình ảnh</div>
                    <form enctype="multipart/form-data" method="post" class="form_hadm">
                        <input type="file" name="file_hadm" id="id_file_hadm">
                    </form>

                </div>
                <div class="row">
                    <div class="dm_ad_them_content_title"></div>
                    <div class="dm_ad_them_content_loadimg_bao">
                        <img src="" alt="" class="dm_ad_them_content_loadimg">
                    </div>

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
            <div class="">
                <form method="POST" enctype='multipart/form-data' class="form_hadm_excel">
                    <label for="">Upload file &nbsp;</label><input type="file" name="dm_ad_them_content_excel_fileupload" id="dm_ad_them_content_excel_fileupload">
                    <span class="dm_ad_them_content_excel_btn_submit" name="dm_ad_them_content_excel_btn_submit">Xem trước file</span>
                </form>
            </div>
            <div class="dm_ad_them_content_excel_noidungfile">
                <table>
                    <thead>
                        <tr>
                            <th colspan="3">
                                loại sản phẩm (shop D & Q)
                            </th>
                        </tr>
                        <tr>
                            <th>STT</th>
                            <th>Tên loại sản phẩm</th>
                            <th>Tên danh mục</th>
                            <th>Hình ảnh</th>
                        </tr>
                    </thead>
                    <tbody class="dm_ad_them_content_excel_noidungfile_body">
                        <tr>
                            <td>1</td>
                            <td>loại sản phẩm 1</td>
                            <td>tên danh mục</td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>loại sản phẩm 1</td>
                            <td>tên danh mục</td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>loại sản phẩm 1</td>
                            <td>tên danh mục</td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>loại sản phẩm 1</td>
                            <td>tên danh mục</td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>loại sản phẩm 1</td>
                            <td>tên danh mục</td>
                            <td><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt=""></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>loại sản phẩm 1</td>
                            <td>tên danh mục</td>
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
            <h1> loại sản phẩm - Chỉnh sửa</h1>
            <button class="dm_ad_edit_top_save" data="tooltip" title="click để lưu">Save</button>
        </div>

        <div class="dm_ad_edit_content">
            <div class="">
                <div class="row">
                    <div class="dm_ad_edit_content_title">mã loại sản phẩm</div>
                    <div class="dm_ad_edit_content_madm">1</div>
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">tên loại sản phẩm</div>
                    <input type="text" class="dm_ad_edit_tendm">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Danh mục</div>
                    <div class="dm_ad_edit_content_title_select">
                        <select name="" id="dm_ad_edit_content_title_chon">
                           <option value="3">1</option>
                           <option value="4">2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">hình ảnh</div>
                    <form enctype="multipart/form-data" method="post" class="form_hadm_edit">
                        <input type="file" name="file_hadm_edit" id="id_file_hadm_edit">
                    </form>

                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title"></div>
                    <div><img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="" class="dm_ad_edit_content_hadm"></div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="danhmuc_thongbao">

</div>
<script src="./js/loaisanphamadmin.js"></script>

<!-- kết thúc nội dung -->
<!-- footer -->
<?php
include_once('./footerAdmin.php')
?>