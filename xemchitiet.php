<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop D&Q</title>
    <!-- link ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!--fontansome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- css slider -->
    <link rel="stylesheet" href="./usecssjs/silder_xemchitiet/css/impulseslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="./usecssjs/silder_xemchitiet/css/font-awesome.min.css" type="text/css" media="screen" />
    <!-- css index -->
    <link rel="stylesheet" href="./css/index.css">
    <!-- css header -->
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/css_xemchitiet.css">
    <!-- script coment facebook nhúng -->
    <!-- nhung test coment facebok -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=579600703081104&autoLogAppEvents=1" nonce="RtFUhxre"></script>

</head>

<body>

    <?php include_once("./header.php"); ?>
    <!-- rederbody -->
    <div class="xemchitiet">
        <div class="xemchitiet_masp" style="display:none">
            <?php
            if (isset($_GET['MaSP'])) {
                echo $_GET['MaSP'];
            } else {
                die();
            }
            ?>
        </div>
        <div class="xemchitiet_title">
            <p><strong>shopee</strong>>econsumer>wearabel>smartwatch/sản phẩm 1</p>
        </div>
        <div class="xemchitiet_card">
            <div class="xemchitiet_card_slide">
                <div class="xctcl_top">
                    <img src="./upload/image/flashsale/2357-t-shop-thoi-trang-vay-dam-5019.jpg" alt="">
                </div>
                <div class="xctcl_bottom">
                    <div id="slider-container">
                        <div id="slider">
                            <div class="face one">
                                <img src="./upload/image/flashsale/2357-t-shop-thoi-trang-vay-dam-5019.jpg" alt="">
                            </div>
                            <div class="face two">
                                <img src="./upload/image/flashsale/shop-ban-quan-ao-dep-duong-vo-van-ngan.jpg" alt="">
                            </div>
                            <div class="face three">
                                <img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                            </div>
                            <div class="face four">
                                <img src="./upload/image/img_quangcao/depositphotos_19364069-stock-photo-colorful-sale-tags-hanging.jpg" alt="">
                            </div>

                            <div class="face five">
                                <img src="./upload/image/img_quangcao/sale-off-la-gi-phan-biet-sale-off-va-sale-nao-moi-dungsale-off-la-gi-phan-biet-sale-off-va-sale-nao-moi-dung-02-1-1024x576-1-1280x720.png" alt="">
                            </div>

                            <div class="face six">
                                <img src="./upload/image/img_quangcao/Screen-Shot-2020-04-13-at-16.18.28-750x435.png" alt="">
                            </div>
                        </div>
                        <div class="nav">
                            <i class="left arrow icon-arrow-left icon-4x"></i>
                            <i class="pause arrow icon-pause icon-4x"></i>
                            <i class="right arrow icon-arrow-right icon-4x"></i>
                        </div>
                    </div>
                </div>

            </div>
            <div class="xemchitiet_card_content">
                <div class="xctcc-name">
                    [bảo hành 12 tháng] Đồng hồ thông minh Amazfit GTS 2 - hàng chính hãng
                </div>
                <div class="xctcc-danhgia">
                    <div class="xctcc-danhgia1">
                        <span>5.0</span>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="xctcc-danhgia2">
                        3 đánh giá
                    </div>
                    <div class="xctcc-danhgia3">
                        5 đã bán
                    </div>
                </div>
                <div class="xctcc-giaban">
                    3.790.000 ₫
                </div>
                <div class="xctcc-vanchuyen">

                    <table>
                        <tr>
                            <td>vận chuyển</td>
                            <td>
                                <i class="fas fa-ticket-alt"></i>
                                <span>Miễn phí vận chuyển</span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <p>Miễn phí vận chuyển cho đơn hàng trên ₫300.000</p>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <i class="fas fa-truck-moving"></i>
                                <span>Vận Chuyển Tới</span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <p>Phí Vận Chuyển</p>
                            </td>
                        </tr>
                        <tr>
                            <td>màu</td>
                            <td>
                                <button>xám</button>
                                <button>đen</button>
                                <button>vàng</button>
                            </td>
                        </tr>
                        <tr>
                            <td>số lượng</td>
                            <td>
                                <button id="reduce_quantity_product_cart">-</button>
                                <input id="quantity_product_cart" type="number" value="1">
                                <button id="add_quantity_product_cart">+</button>
                                <p id="xct_sp_cosan">14 sản phẩm có sẵn</p>
                            </td>
                        </tr>
                    </table>

                </div>
                <div class="xctcc-dathang">
                    <button class="add_cart_xct_add"><i class="fas fa-cart-plus"></i>thêm vào giỏ hàng</button>
                    <button>mua ngay</button>
                </div>
                <div class="xctcc-comment">
                    <i class="fas fa-sync"></i>
                    <p>shpee đảm bảo</p>
                    <p>3 ngày trả hàng </p>
                    <p>hoàn tiền</p>
                </div>
                <div class="xctcc-share">
                    <div class="xctcc-share1">
                        <span> chia sẻ</span>
                        <a href="https://www.messenger.com/"><i class="fab fa-facebook-messenger"></i></a>
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        <a href="https://twitter.com/?lang=vi"><i class="fab fa-twitter-square"></i></a>
                    </div>
                    <div class="xctcc-share2"><i class="fas fa-heart"></i>đã thích (4)</div>
                </div>
            </div>
        </div>
    </div>
    <div class="xct_ctsp">
        <div class="xct-ctsp-left">
            <!-- xem chi tiet san pham -->
            <div class="xct_sp">
                <div class="xct_sp_ctsp">
                    <div>CHI TIẾT SẢN PHẨM</div>
                </div>
                <table>
                    <tr>
                        <td>Danh Mục</td>
                        <td id="xct_ctsp_tendmsp">Shopee|HealthFood| Supplement|Fitness</td>
                    </tr>
                    <tr>
                        <td>Kho hàng</td>
                        <td>342</td>
                    </tr>
                    <tr>
                        <td>Gửi từ</td>
                        <td>Quận Tân Phú, TP. Hồ Chí Minh</td>
                    </tr>
                </table>
                <div class="xct_sp_mtsp">
                    <div>MÔ tả sản phẩm</div>
                </div>
                <!-- nội dung bài viết chi tiết ở đây -->
                <div class="xct_sp_content">
                    <?php include('baiviet.php') ?>
                </div>
            </div>
            <!-- đánh giá sản phẩm -->
            <div class="xcv_dgsp">
                <div>ĐÁNH GIÁ SẢN PHẨM</div>
                <div class="xcv_dgsp_sao">
                    <div class="css_sosao">
                        <span>4.5</span>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>

                    </div>
                    <div>
                        5*
                        <progress min="0" max="100" value="35"></progress>
                        <span>10 đánh giá</span>
                    </div>
                    <div>
                        4*
                        <progress min="0" max="100" value="20"></progress>
                        <span>10 đánh giá</span>
                    </div>
                    <div>
                        3*
                        <progress min="0" max="100" value="60"></progress>
                        <span>10 đánh giá</span>
                    </div>
                    <div>
                        2*
                        <progress min="0" max="100" value="35"></progress>
                        <span>10 đánh giá</span>
                    </div>
                    <div>
                        1*
                        <progress min="0" max="100" value="4"></progress>
                        <span>10 đánh giá</span>
                    </div>
                </div>

            </div>
            <div class="xcv_cmt">
                <div>Bình luận</div>
                <div>
                    <div id="fb-root"></div>
                    <div class="fb-comments" data-href="https://quannguyen.com/d%e1%bb%b1%20%c3%a1n%20t%e1%bb%b1%20l%c3%a0m/d%e1%bb%b1%20%c3%a1n%201%20web%20b%c3%a1n%20qu%e1%ba%a7n%20%c3%a1o/view/sanpham/xemchitiet.php" data-width="100%" data-numposts="5"></div>
                </div>

            </div>
        </div>
        <div class="xct-ctsp-right">
            <div>top sản phẩm bán chạy</div>
            <div class="xct-ctsp-right_cards">
                <div class="xct-ctsp-right_card">
                    <img src="./upload/image/flashsale/shop-ban-quan-ao-dep-duong-vo-van-ngan.jpg" alt="">
                    <div class="xct-ctsp-right_card_tengia">
                        <div>thực phẩm bổ sung colagen</div>
                        <div>778,000 đ</div>
                    </div>
                </div>
                <div class="xct-ctsp-right_card">
                    <img src="./upload/image/flashsale/shop-ban-quan-ao-dep-duong-vo-van-ngan.jpg" alt="">
                    <div class="xct-ctsp-right_card_tengia">
                        <div>thực phẩm bổ sung colagen</div>
                        <div>778,000 đ</div>
                    </div>
                </div>
                <div class="xct-ctsp-right_card">
                    <img src="./upload/image/flashsale/shop-ban-quan-ao-dep-duong-vo-van-ngan.jpg" alt="">
                    <div class="xct-ctsp-right_card_tengia">
                        <div>thực phẩm bổ sung colagen</div>
                        <div>778,000 đ</div>
                    </div>
                </div>
                <div class="xct-ctsp-right_card">
                    <img src="./upload/image/flashsale/shop-ban-quan-ao-dep-duong-vo-van-ngan.jpg" alt="">
                    <div class="xct-ctsp-right_card_tengia">
                        <div>thực phẩm bổ sung colagen</div>
                        <div>778,000 đ</div>
                    </div>
                </div>
                <div class="xct-ctsp-right_card">
                    <img src="./upload/image/flashsale/shop-ban-quan-ao-dep-duong-vo-van-ngan.jpg" alt="">
                    <div class="xct-ctsp-right_card_tengia">
                        <div>thực phẩm bổ sung colagen</div>
                        <div>778,000 đ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="notification">
        <!-- <p class="notification_item">
            <span id="timer_notification"></span>
            nội dung thông báo
        </p> -->
    </div>

    <!-- footer -->
    <?php include_once("./footer.php"); ?>





    <!-- script slider -->
    <script src="./usecssjs/silder_xemchitiet/jquery-1.8.2.min.js"></script>
    <script src="./usecssjs/silder_xemchitiet/jquery.impulse.slider-0.4.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#slider').impulseslider({
                height: 150,
                width: 200,
                depth: 170,
                perspective: 500,
                pauseTime: 4000,
                transitionDuration: 2000,
                transitionEffect: "ease-in-out",
                autostart: true,
                rightSelector: ".right",
                leftSelector: ".left",
                pauseSelector: ".pause",
                directionRight: true,
                containerSelector: "#slider-container",
                spinnerSelector: "#slider"
            });
        });
    </script>
    <!-- script chọn ảnh slider -->
    <script src="./js/xemchitiet.js"> </script>
</body>

</html>