
<?php
include_once('./headerAdmin.php')
?>
<?php
    if (isset($_COOKIE['usernameAD']) && isset($_COOKIE['MaAD'])) {
        $matable=9;
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
    <!-- css nha cung cap -->
    <link rel="stylesheet" href="./css/nhacungcapadmin.css">
    <!-- link ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--fontansome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

</head>
<!-- noi dung ở đây -->

<div class="ad_dms">
    <div class="ad_dms_header">
        <div class="ad_dms_left">
            Admin/Danh mục
        </div>
        <div class="ad_dms_right">
            <button class="ad_dms_right_add">Thêm Nhà cung cấp</button>
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
                    <th>Mã NCC</th>
                    <th>
                        Tên NCC
                    </th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>SDT</th>
                    <th>Thao tác</th>

                </tr>
                <tbody class="ad_dms_content_show">
                    <!-- <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>1</td>
                        <td>1</td>
                        <td>Ten nhà cung cấp</td>
                        <td>Địa chỉ </td>
                        <td>Email </td>
                        <td>SDT </td>
                        <td class="ad_dms_content_table_thaotac">
                            <i class="fas fa-edit ad_dms_content_table_thaotac_edit" data-malsp_edit=' . $row[' MaLSP'] . ' toggle="tooltip"  title="sửa"></i>
                            <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" data-malsp=' . $row['MaLSP'] . ' toggle="tooltip" title="xóa"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>2</td>
                        <td>2</td>
                        <td>Ten nhà cung cấp</td>
                        <td>Địa chỉ </td>
                        <td>Email </td>
                        <td>SDT </td>
                        <td class="ad_dms_content_table_thaotac">
                            <i class="fas fa-edit ad_dms_content_table_thaotac_edit" data-malsp_edit=' . $row[' MaLSP'] . ' toggle="tooltip"  title="sửa"></i>
                            <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" data-malsp=' . $row['MaLSP'] . ' toggle="tooltip" title="xóa"></i>
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
            <h1> Thêm Nhà Cung Cấp</h1>
            <button class="dm_ad_them_top_save" data="tooltip" title="click để lưu">Save</button>
        </div>

        <div class="dm_ad_them_content">
            <div class="">
                <div class="row">
                    <div class="dm_ad_them_content_title">Tên NCC</div>
                    <input type="text" class="dm_ad_them_tenncc">
                </div>
                <div class="row">
                    <div class="dm_ad_them_content_title">Địa chỉ</div>
                    <input type="text" class="dm_ad_them_diachi">
                </div>
                <div class="row">
                    <div class="dm_ad_them_content_title">Email</div>
                    <input type="email" class="dm_ad_them_email" required>
                </div>
                <div class="row">
                    <div class="dm_ad_them_content_title">SĐT</div>
                    <input id="numbers" pattern="[0-9.]+" type="number" class="dm_ad_them_sdt">

                </div>
            </div>
        </div>
    </div>
</div>

<div class="dm_ad_thems_excel">
    <div class="dm_ad_them_excel">
        <div class="dm_ad_them_hiden_excel"><i class="fas fa-times"></i></div>
        <div class="dm_ad_them_top_excel">
            <h1> Thêm danh mục bằng file excel</h1>
            <button class="dm_ad_them_top_save_excel" data="tooltip" title="click để lưu">Save</button>
        </div>

        <div class="dm_ad_them_content_excel">
            <div class="">
                <form method="POST" enctype=' multipart/form-data' class="form_hadm_excel">
                    <label for="">Upload file &nbsp;</label><input type="file" name="dm_ad_them_content_excel_fileupload" id="dm_ad_them_content_excel_fileupload">
                    <span class="dm_ad_them_content_excel_btn_submit" name="dm_ad_them_content_excel_btn_submit">Xem trước file</span>
                </form>
            </div>
            <div class="dm_ad_them_content_excel_noidungfile">
                <table>
                    <thead>
                        <tr>
                            <th colspan="5">
                                Danh mục (shop D & Q)
                            </th>
                        </tr>
                        <tr>
                            <th>Ten nhà cung cấp</th>
                            <td>Địa chỉ </td>
                            <td>Email </td>
                            <td>SDT </td>
                        </tr>
                    </thead>
                    <tbody class="dm_ad_them_content_excel_noidungfile_body">
                        <tr>
                            <th>Ten nhà cung cấp</th>
                            <td>Địa chỉ </td>
                            <td>Email </td>
                            <td>SDT </td>
                        </tr>
                        <tr>
                            <th>Ten nhà cung cấp</th>
                            <td>Địa chỉ </td>
                            <td>Email </td>
                            <td>SDT </td>
                        </tr>
                        <tr>
                            <th>Ten nhà cung cấp</th>
                            <td>Địa chỉ </td>
                            <td>Email </td>
                            <td>SDT </td>
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
            <h1> Danh mục - Chỉnh sửa</h1>
            <button class="dm_ad_edit_top_save" data="tooltip" title="click để lưu">Save</button>
        </div>

        <div class="dm_ad_edit_content">
            <div class="">
                <div class="row">
                    <div class="dm_ad_them_content_title">Mã NCC</div>
                    <div type="text" class="dm_ad_edit_mancc"></div>
                </div>
                <div class="row">
                    <div class="dm_ad_them_content_title">Tên NCC</div>
                    <input type="text" class="dm_ad_edit_tenncc">
                </div>
                <div class="row">
                    <div class="dm_ad_them_content_title">Địa chỉ</div>
                    <input type="text" class="dm_ad_edit_diachi">
                </div>
                <div class="row">
                    <div class="dm_ad_them_content_title">Email</div>
                    <input type="email" class="dm_ad_edit_email" required>
                </div>
                <div class="row">
                    <div class="dm_ad_them_content_title">SĐT</div>
                    <input id="numbers" pattern="[0-9.]+" type="number" class="dm_ad_edit_sdt">

                </div>
            </div>
        </div>
    </div>
</div>
<div class="danhmuc_thongbao">

</div>
<script src="./js/nhacungcapadmin.js"></script>

<!-- kết thúc nội dung -->
<!-- footer -->
<?php
include_once('./footerAdmin.php')
?>