
<?php
include_once('./headerAdmin.php')
?>
<?php
    if (isset($_COOKIE['usernameAD']) && isset($_COOKIE['MaAD'])) {
        $matable=16;
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
    <link rel="stylesheet" href="./css/accountadmin.css">
    <!-- js ck editor-trinh soan thao van ban -->
    <script src="./ckeditor/ckeditor.js"></script>
    <script src="./ckeditor/ckeditor.js"></script>

</head>
<!-- noi dung ở đây -->
<div class="ad_sps">
    <div class="ad_sps_header">
        <div class="ad_sps_left">
            Admin/Tài Khoản Admin
        </div>
        <div class="ad_sps_right">
            <button class="ad_sps_right_add">Thêm Tài khoản</button>
            <div class="ad_sps_right_ttc">Thao tác chọn
                <ul class="ad_sps_right_ttc_option">
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
                    <th>Tài Khoản</th>
                    <th>Mật Khẩu</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>SDT</th>
                    <th>Hình ảnh</th>
                    <th>Thao Tác</th>

                </tr>
                <tbody class="ad_sps_content_table_noidung">
                    <!-- <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>Tài Khoản</td>
                        <td>Mật Khẩu</td>
                        <td>Tên</td>
                        <td>Ngày sinh</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td>SDT</td>
                        <td><img src="./upload/image/hasp/47384002_707281476323163_3006323287241261056_n.jpg"></td>
                        <td class="ad_sps_content_table_thaotac">
                            <i class="fas fa-users" toggle="tooltip" title="Phân Quyền"></i>
                            <i class="fas fa-edit" toggle="tooltip" title="sửa"></i>
                            <i class="fas fa-trash-alt" toggle="tooltip" title="xóa"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>Tài Khoản</td>
                        <td>Mật Khẩu</td>
                        <td>Tên</td>
                        <td>Ngày sinh</td>
                        <td>Email</td>
                        <td>Address</th>
                        <td>SDT</>
                        <td><img src="./upload/image/hasp/47384002_707281476323163_3006323287241261056_n.jpg"></td>
                        <td class="ad_sps_content_table_thaotac">
                            <i class="fas fa-users" toggle="tooltip" title="Phân Quyền"></i>
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
            <h1>Thêm tài khoản</h1>
            <button class="sp_ad_them_top_save" data="tooltip" title="click để thêm sản phẩm">Save</button>
        </div>

        <div class="sp_ad_them_content">
            <div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Tài khoản</div>
                    <input type="text" id="acc_ad_them_taikhoan">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">mật khẩu</div>
                    <input type="password" id="acc_ad_them_matkhau">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Tên</div>
                    <input type="text" id="acc_ad_them_ten">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Ngày sinh</div>
                    <input type="date" id="acc_ad_them_ngaysinh">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Email</div>
                    <input type="email" id="acc_ad_them_email">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">địa chỉ</div>
                    <input type="text" id="acc_ad_them_diachi">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">SDT</div>
                    <input type="number" min="0" id="acc_ad_them_sdt">
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Hình ảnh</div>
                    <form enctype="multipart/form-data" method="post" class="formupload_img_account">
                        <input type="file" name="fileha_account_add" id="ip_img_add_account">
                    </form>
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title">Phân quyền</div>
                    <select name="" id="acc_ad_them_phanquyen">
                        <option value="0">Mặc Định</option>
                        <option value="1">Chỉnh sửa</option>
                    </select>
                </div>
                <div class="row">
                    <div class="sp_ad_them_content_title"></div>
                    <div class="account_phanquyen_add">
                        <table>
                            <tr>
                                <th> Tên bằng</th>
                                <th>Quyền</th>
                            </tr>
                            <tr>
                                <td>sản phẩm</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_sanpham" disabled="disabled"></td>
                            </tr>
                            <tr>
                                <td>loại sản phẩm</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_loaisanpham" disabled></td>
                            </tr>
                            <tr>
                                <td>danh mục</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_danhmuc" disabled></td>
                            </tr>
                            <tr>
                                <td>đánh giá</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_danhgia" disabled></td>
                            </tr>
                            <tr>
                                <td>bài viết</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_baiviet" disabled></td>
                            </tr>
                            <tr>
                                <td>khuyến mại</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_khuyenmai" disabled></td>
                            </tr>
                            <tr>
                                <td>Thuế</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_thue" disabled></td>
                            </tr>
                            <tr>
                                <td>Giao hàng</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_giaohang" disabled></td>
                            </tr>
                            <tr>
                                <td>nhà cung cấp</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_nhacungcap" disabled></td>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th> Tên bằng</th>
                                <th>Quyền</th>
                            </tr>
                            <tr>
                                <td>image sản phẩm</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_img_sanpham" disabled></td>
                            </tr>
                            <tr>
                                <td>khách hàng</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_khachhang" disabled></td>
                            </tr>
                            <tr>
                                <td>hóa đơn nhập</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_hoadonnhap" disabled></td>
                            </tr>
                            <tr>
                                <td>chi tiết hóa đơn nhập</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_ct_hoadonnhap" disabled></td>
                            </tr>
                            <tr>
                                <td>hóa đơn bán</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_hoadonban" disabled></td>
                            </tr>
                            <tr>
                                <td>chi tiết hóa đơn bán</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_ct_hoadonban" disabled></td>
                            </tr>
                            <tr>
                                <td>tài khoản admin</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_taikhoanadmin" disabled></td>
                            </tr>
                            <tr>
                                <td>nhân viên</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_nhanvien" disabled></td>
                            </tr>
                            <tr>
                                <td>tìm kiếm</td>
                                <td> <input type="checkbox" checked id="acc_ad_them_phanquyen_timkiem" disabled></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="dm_ad_thems_excel">
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
                            <th>Sao</th>
                            <th>Thích</th>
                            <th>Mã SP</th>
                            <th>Mã KH</th>
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
</div> -->

<div class="dm_ad_edits">
    <div class="dm_ad_edit">
        <div class="dm_ad_edit_hiden"><i class="fas fa-times"></i></div>
        <div class="dm_ad_edit_top">
            <h1>Cập nhật tài khoản - <span class="dg_ad_edit_maad"></span></h1>
            <button class="dm_ad_edit_top_save" data="tooltip" title="click để lưu">Save</button>
        </div>

        <div class="dm_ad_edit_content">
            <div class="">
                <div class="row">
                    <div class="dm_ad_edit_content_title">Tài khoản</div>
                    <input type="text" id="acc_ad_edits_taikhoan">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">mật khẩu</div>
                    <input type="password" id="acc_ad_edits_matkhau">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Tên</div>
                    <input type="text" id="acc_ad_edits_ten">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Ngày sinh</div>
                    <input type="date" id="acc_ad_edits_ngaysinh">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Email</div>
                    <input type="email" id="acc_ad_edits_email">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">địa chỉ</div>
                    <input type="text" id="acc_ad_edits_diachi">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">SDT</div>
                    <input type="number" min="0" id="acc_ad_edits_sdt">
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title">Hình ảnh</div>
                    <form enctype="multipart/form-data" method="post" class="formupload_img_account_edits">
                        <input type="file" name="fileha_account_add_edits" id="ip_img_add_account_edits">
                    </form>
                </div>
                <div class="row">
                    <div class="dm_ad_edit_content_title"></div>
                    <div style="width: 300px;height:300px">
                        <img src="./upload/image/accountadmin/h1.PNG" class="img_acc_show_edit" style="width: 100%;height:100%;object-fit:cover">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="acc_add_phanquyens">
    <div class="acc_add_phanquyen">
        <div class="acc_add_phanquyen_hiden"><i class="fas fa-times"></i></div>
        <div class="acc_add_phanquyen_top">
            <h1>phân quyền cho mã - <span class="dg_ad_edit_mapg"></span></h1>
            <button class="acc_add_phanquyen_top_save" data="tooltip" title="click để lưu">Save</button>
        </div>

        <div class="acc_add_phanquyen_content">
            <table>
                <tr>
                    <th> Tên bằng</th>
                    <th>Quyền</th>
                </tr>
                <tr>
                    <td>sản phẩm</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_sanpham"></td>
                </tr>
                <tr>
                    <td>loại sản phẩm</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_loaisanpham"></td>
                </tr>
                <tr>
                    <td>danh mục</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_danhmuc"></td>
                </tr>
                <tr>
                    <td>đánh giá</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_danhgia"></td>
                </tr>
                <tr>
                    <td>bài viết</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_baiviet"></td>
                </tr>
                <tr>
                    <td>khuyến mại</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_khuyenmai"></td>
                </tr>
                <tr>
                    <td>Thuế</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_thue"></td>
                </tr>
                <tr>
                    <td>Giao hàng</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_giaohang"></td>
                </tr>
                <tr>
                    <td>nhà cung cấp</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_nhacungcap"></td>
                </tr>
            </table>
            <table>
                <tr>
                    <th> Tên bằng</th>
                    <th>Quyền</th>
                </tr>
                <tr>
                    <td>image sản phẩm</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_img_sanpham"></td>
                </tr>
                <tr>
                    <td>khách hàng</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_khachhang"></td>
                </tr>
                <tr>
                    <td>hóa đơn nhập</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_hoadonnhap"></td>
                </tr>
                <tr>
                    <td>chi tiết hóa đơn nhập</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_ct_hoadonnhap"></td>
                </tr>
                <tr>
                    <td>hóa đơn bán</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_hoadonban"></td>
                </tr>
                <tr>
                    <td>chi tiết hóa đơn bán</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_ct_hoadonban"></td>
                </tr>
                <tr>
                    <td>tài khoản admin</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_taikhoanadmin"></td>
                </tr>
                <tr>
                    <td>nhân viên</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_nhanvien"></td>
                </tr>
                <tr>
                    <td>tìm kiếm</td>
                    <td> <input type="checkbox" id="acc_ad_edit_phanquyen_timkiem"></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<!-- phan thong bao -->
<div class="danhmuc_thongbao">
</div>
<!-- end thong bao -->

<script src="./js/accountadmin.js"></script>

<!-- kết thúc nội dung -->
<!-- footer -->
<?php
include_once('./footerAdmin.php')
?>