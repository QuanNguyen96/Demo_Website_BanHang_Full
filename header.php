<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<div class="headers">
    <div class="header">
        <div class="header-top">
            <div class="header-top_left">
                <div>Tải ứng dụng</div>
                <div>
                    <div>Kết nối</div>
                    <a href="https://www.facebook.com/"> <i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>

                </div>
            </div>
            <div class="header-top_right">
                <?php
                if (isset($_SESSION['usernameDQ'])) {
                    if ($_SESSION['pthuc'] == "facebook") {
                        echo '<div class="header_login_username">' . $_SESSION['usernameDQ'] . '</div>
                            <div class="Click_out_facebook" style="cursor:pointer">Thoát</div>';
                    }
                    if ($_SESSION['pthuc'] == "gmail") {
                        echo '<div class="header_login_username">' . $_SESSION['usernameDQ'] . '</div>
                            <div class="Click_out_gmail" style="cursor:pointer">Thoát</div>';
                    }
                    if ($_SESSION['pthuc'] == "taikhoan") {
                        echo '<div class="header_login_username">' . $_SESSION['usernameDQ'] . '</div>
                            <div class="Click_out_tk" style="cursor:pointer">Thoát</div>';
                    }
                } else {
                    echo ' <div><a href="./login.php">Đăng nhập</a></div>
                        <div><a href="./register.php"> Đăng ký</a></div>';
                }
                ?>

            </div>
        </div>
        <div class="header_center">
            <div class="header_center_left">
                <a href="./index.php">
                    <img src="./upload/image/defaut_index/logo.png" alt="">
                </a>
            </div>
            <div class="header_center_right">

                <div>
                    <div class="icon_danhmuc_rp">
                        <i class="fas fa-calendar-alt"></i>
                        <i class="fas fa-search" id="icon_danhmuc_rp_search" toggle="tooltip" title="Tìm kiếm"></i>
                    </div>
                    <div class="header_seach">
                        <input class="input_search_khtk" type="text" placeholder="nhập từ khóa tìm kiếm ....">
                        <i class="fas fa-search" toggle="tooltip" title="Tìm kiếm"></i>
                        <div class="header_seach_tag">
                            <table>
                                <tr>
                                    <td><img src="./upload/image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt=""></td>
                                    <td>sản phẩm 1</td>
                                </tr>
                                <tr>
                                    <td><img src="./upload/image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt=""></td>
                                    <td>sản phẩm 1</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div>
                        <div class="icon_carts">
                            <a href="./giohang.php">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <span class="carts_soluong">2</span>
                            <div class="header_carts">
                                <p></p>
                                <div class="header_cart">
                                    <table>
                                        <thead style="background:#ccc">
                                            <tr>
                                                <th colspan="5">giỏ hàng của bạn</th>
                                            </tr>
                                            <tr>
                                                <th>hình ảnh</th>
                                                <th>Tên</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="body_giohang_indexkh">

                                            <tr>
                                                <td><img src="./upload/image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt=""></td>
                                                <td>sản phẩm 1 sản phẩm 1sản phẩm 1sản phẩm 1sản phẩm 1sản phẩm 1sản phẩm 1sản phẩm 1sản phsản phẩm 1sản phẩm 1sản phẩm 1ẩm 1sản phẩm 1sản phẩm 1sản phẩm 1</td>
                                                <td>220,000 đ</td>
                                                <td>xóa</td>
                                            </tr>
                                            <tr>
                                                <td><img src="./upload/image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt=""></td>
                                                <td>sản phẩm 1</td>
                                                <td>220,000 đ</td>
                                                <td>xóa</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="header_cart_action">
                                    <button><a href="./giohang.php"> xem giỏ hàng</a></button>
                                </div>
                            </div>
                        </div>
                        <i class="fas fa-bell"></i>
                    </div>
                </div>
                <div>
                    <ul class="header_center_right_menu">
                        <li>
                            <a href="#danhmuc">Danh mục</a> 
                            <!-- <ul>
                                    <li>danh mục 1
                                        <ul>
                                            <li>danh muc 1.1</li>
                                            <li>danh muc 1.1</li>
                                            <li>danh muc 1.1</li>
                                            <li>danh muc 1.1</li>
                                            <li>danh muc 1.1</li>
                                        </ul>
                                    </li>
                                    <li>danh mục 1</li>
                                    <li>danh mục 1</li>
                                    <li>danh mục 1</li>
                                    <li>danh mục 1</li>
                                    <li>danh mục 1</li>
                                    <li>danh mục 1</li>
                                    <li>danh mục 1</li>
                                    <li>danh mục 1</li>
                                    <li>danh mục 1</li>
                                    <li>danh mục 1</li>
                                </ul> -->
                        </li>
                        <li><a href="./index.php">Trang chủ</a></li>
                        <li><a href="#flashsalses">Flash Sale</a></li>
                        <li><a href="#shopeemails">Shopee Mail</a></li>
                        <li><a href="#products">Sản Phẩm</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom"></div>
    </div>

</div>
<div class="search_rp"><input type="text" placeholder="nhập từ khóa"></div>
<script>
    $(document).ready(function() {

        var trangthaisearchrp = 0;
        $('#icon_danhmuc_rp_search').on('click', function() {
            trangthaisearchrp = trangthaisearchrp == 0 ? 1 : 0;
            if (trangthaisearchrp == 1) {

                $('.search_rp').css('transform', 'translateY(2%)')

            } else {
                $('.search_rp').css('transform', 'translateY(-100%)')
            }

        })
    })
</script>
<script src="./js/header.js"></script>
<!-- chèn script gior hafng-->
<script src="./js/giohang.js"></script>