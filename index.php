<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- css index -->
    <link rel="stylesheet" href="./css/index.css">
    <!-- css header -->
    <link rel="stylesheet" href="./css/header.css">
    <!--fontansome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- @*chèn link css, javascript nivosider*@ -->
    <link href="NivoSlider/nivo-slider.css" rel="stylesheet" />
    <script src="NivoSlider/jquery-1.10.2.min.js"></script>
    <script src="NivoSlider/jquery.nivo.slider.js"></script>
    <script src="NivoSlider/jquery.nivo.slider.pack.js"></script>
    <!-- css shoppemail_silder -->
    <link rel="stylesheet" href="css/shopeemail_slider.css">
</head>

<body>
    <!-- header -->
    <?php include_once("header.php") ?>
    <!-- slide quang cao -->
    <div class="slider-quangcao">
        <div class="slider-quangcao__left">
            <section id="divMenuSlider">
                <div id="slider" class="nivoSlider">
                    <img src="upload/image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt="">
                    <img src="upload/image/img_quangcao/depositphotos_19364069-stock-photo-colorful-sale-tags-hanging.jpg" alt="">
                    <img src="upload/image/img_quangcao/sale-off-la-gi-phan-biet-sale-off-va-sale-nao-moi-dungsale-off-la-gi-phan-biet-sale-off-va-sale-nao-moi-dung-02-1-1024x576-1-1280x720.png" alt="">
                    <img src="upload/image/img_quangcao/Screen-Shot-2020-04-13-at-16.18.28-750x435.png" alt="">
                    <img src="upload/image/img_quangcao/shopee-mua-le-hoi-big-sale-22-12.jpg" alt="">
                    <img src="upload/image/img_quangcao/Shopee-Sale-15.4.jpg" alt="">
                </div>
                <div style="clear:both"></div>
            </section>
        </div>
        <div class="slider-quangcao__right">
            <img src="upload/image/img_quangcao/depositphotos_19364069-stock-photo-colorful-sale-tags-hanging.jpg" alt="">
            <img src="upload/image/img_quangcao/sale-off-la-gi-phan-biet-sale-off-va-sale-nao-moi-dungsale-off-la-gi-phan-biet-sale-off-va-sale-nao-moi-dung-02-1-1024x576-1-1280x720.png" alt="">
        </div>
    </div>
    <!-- danh muc -->
    <div class="danhmuc" id="danhmuc">
        <p>DANH MỤC</p>
        <div class="danhmucbao">
            <div class="danhmucdong">
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                        <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>nhà cửa & đời sống</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>máy ảnh & quay phim</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>giày dép nam</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>phụ kiện & trang sức nữ</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>thể thao</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>bách hóa & siêu thị</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>ô tô & xe máy</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>nhà sách online</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>giặt giũ & chăm sóc nhà cửa</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>balo & túi ví</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>đồ chơi </p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>thiết bị điện tử</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>sắc đẹp</p>
                </div>

            </div>
            <div class="danhmucdong">
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>đồng hồ</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>giày dép nữ</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>túi ví nữ</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>thiết bị gia dụng</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>thời trang trẻ em</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>thức ăn thú cưng</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>voucher</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>máy tinh & laptop</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>thời trang nam</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>thời trang nữ</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>sức khỏe</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                </div>
                    <p>điện thoại</p>
                </div>
                <div class="danhmucdong_item">
                    <div class="danhmucdong_item-img">
                    <img src="upload/image/danhmuc/dm_default.png" alt="">
                    </div>
                    <p>thời trang cho bé</p>
                </div>
            </div>
        </div>
        <div class="danhmuc-action_prev">&lsaquo;
        </div>
        <div class="danhmuc-action_next"> &rsaquo;
        </div>
    </div>
    <!-- flas sale -->
    <div class="flashsalses" id="flashsalses">

        <div class="flashsalse">

            <div class="flashsale_right">
                <h2>flash sale</h2>
                <div class="flashsale-cards" >
                    <div class="flashsale-card">
                        <div class="product_card_sale">-40% giảm</div>
                        <div class="flashsale-card-img">
                            <img src="upload/image/flashsale/2357-t-shop-thoi-trang-vay-dam-5019.jpg" alt="">
                        </div>
                        <div class="flashsale-content">
                            <p> váy cao cấp loại 1</p>
                            <div class="flashsale-content_bottom">
                                <div class="flashsale-cards__gia">
                                    <p>1,234,567 đ</p>
                                    <p>1,000 đ</p>
                                </div>
                                <div class="flashsale-cards__daban">
                                    <div class="processs">
                                        <div class="progress"></div>
                                        <p>đã bán 35</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flashsale-card">
                        <div class="product_card_sale">-40% giảm</div>
                        <div class="flashsale-card-img">
                            <img src="upload/image/flashsale/2357-t-shop-thoi-trang-vay-dam-5019.jpg" alt="">
                        </div>
                        <div class="flashsale-content">
                            <p> váy cao cấp loại 1</p>
                            <div class="flashsale-content_bottom">
                                <div class="flashsale-cards__gia">
                                    <p>1,234,567 đ</p>
                                    <p>1,000 đ</p>
                                </div>
                                <div class="flashsale-cards__daban">
                                    <div class="processs">
                                        <div class="progress"></div>
                                        <p>đã bán 35</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flashsale-card">
                        <div class="product_card_sale">-40% giảm</div>
                        <div class="flashsale-card-img">
                            <img src="upload/image/flashsale/shop-ban-quan-ao-dep-duong-vo-van-ngan.jpg" alt="">
                        </div>
                        <div class="flashsale-content">
                            <p> váy cao cấp loại 1</p>
                            <div class="flashsale-content_bottom">
                                <div class="flashsale-cards__gia">
                                    <p>1,234,567 đ</p>
                                    <p>1,000 đ</p>
                                </div>
                                <div class="flashsale-cards__daban">
                                    <div class="processs">
                                        <div class="progress"></div>
                                        <p>đã bán 35</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flashsale-card">
                        <div class="product_card_sale">-40% giảm</div>
                        <div class="flashsale-card-img">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </div>
                        <div class="flashsale-content">
                            <p> váy caocấploạváycaocaocấploạváycaocaocấploạváycaocaocấploạváycao cấp loại 1váy cao cấp loại 1i 1</p>
                            <div class="flashsale-content_bottom">
                                <div class="flashsale-cards__gia">
                                    <p>1,234,567 đ</p>
                                    <p>1,000 đ</p>
                                </div>
                                <div class="flashsale-cards__daban">
                                    <div class="processs">
                                        <div class="progress"></div>
                                        <p>đã bán 35</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="flashsale-card">
                        <div class="product_card_sale">-40% giảm</div>
                        <div class="flashsale-card-img">
                            <img src="upload/image/flashsale/2357-t-shop-thoi-trang-vay-dam-5019.jpg" alt="">
                        </div>
                        <div class="flashsale-content">
                            <p> váy cao cấp loại 1</p>
                            <div class="flashsale-content_bottom">
                                <div class="flashsale-cards__gia">
                                    <p>1,234,567 đ</p>
                                    <p>1,000 đ</p>
                                </div>
                                <div class="flashsale-cards__daban">
                                    <div class="processs">
                                        <div class="progress"></div>
                                        <p>đã bán 35</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flashsale-card">
                        <div class="product_card_sale">-40% giảm</div>
                        <div class="flashsale-card-img">
                            <img src="upload/image/flashsale/2357-t-shop-thoi-trang-vay-dam-5019.jpg" alt="">
                        </div>
                        <div class="flashsale-content">
                            <p> váy cao cấp loại 1</p>
                            <div class="flashsale-content_bottom">
                                <div class="flashsale-cards__gia">
                                    <p>1,234,567 đ</p>
                                    <p>1,000 đ</p>
                                </div>
                                <div class="flashsale-cards__daban">
                                    <div class="processs">
                                        <div class="progress"></div>
                                        <p>đã bán 35</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flashsale-card">
                        <div class="product_card_sale">-40% giảm</div>
                        <div class="flashsale-card-img">
                            <img src="upload/image/flashsale/shop-ban-quan-ao-dep-duong-vo-van-ngan.jpg" alt="">
                        </div>
                        <div class="flashsale-content">
                            <p> váy cao cấp loại 1</p>
                            <div class="flashsale-content_bottom">
                                <div class="flashsale-cards__gia">
                                    <p>1,234,567 đ</p>
                                    <p>1,000 đ</p>
                                </div>
                                <div class="flashsale-cards__daban">
                                    <div class="processs">
                                        <div class="progress"></div>
                                        <p>đã bán 35</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flashsale-card">
                        <div class="product_card_sale">-40% giảm</div>
                        <div class="flashsale-card-img">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </div>
                        <div class="flashsale-content">
                            <p> váy caocấploạváycaocaocấploạváycaocaocấploạváycaocaocấploạváycao cấp loại 1váy cao cấp loại 1i 1</p>
                            <div class="flashsale-content_bottom">
                                <div class="flashsale-cards__gia">
                                    <p>1,234,567 đ</p>
                                    <p>1,000 đ</p>
                                </div>
                                <div class="flashsale-cards__daban">
                                    <div class="processs">
                                        <div class="progress"></div>
                                        <p>đã bán 35</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="flashsale_left">
                <div class="hotsearch">
                    <p>sản phẩm tìm kiếm nhiều nhất</p>
                    <div class="hotsearch-cards">
                        <div class="hotsearch-card">
                            <div class="hotsearch-card_img">
                                <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                            </div>
                            <div class="hotsearch-card_name">
                                <p>tên sản phẩm tên sản phẩmtên sản phẩm</p>
                                <div class="hotsearch-card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <progress min="0" max="100" value="35"></progress>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                        <div class="hotsearch-card">
                            <div class="hotsearch-card_img">
                                <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                            </div>
                            <div class="hotsearch-card_name">
                                <p>tên sản phẩm tên sản phẩmtên sản phẩm</p>
                                <div class="hotsearch-card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <progress min="0" max="100" value="35"></progress>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                        <div class="hotsearch-card">
                            <div class="hotsearch-card_img">
                                <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                            </div>
                            <div class="hotsearch-card_name">
                                <p>tên sản phẩm tên sản phẩmtên sản phẩm</p>
                                <div class="hotsearch-card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <progress min="0" max="100" value="35"></progress>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                        <div class="hotsearch-card">
                            <div class="hotsearch-card_img">
                                <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                            </div>
                            <div class="hotsearch-card_name">
                                <p>tên sản phẩm tên sản phẩmtên sản phẩm</p>
                                <div class="hotsearch-card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <progress min="0" max="100" value="35"></progress>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                        <div class="hotsearch-card">
                            <div class="hotsearch-card_img">
                                <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                            </div>
                            <div class="hotsearch-card_name">
                                <p>tên sản phẩm tên sản phẩmtên sản phẩm</p>
                                <div class="hotsearch-card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <progress min="0" max="100" value="35"></progress>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text_hotsearch">
                    <p>từ khóa tìm kiếm nhiều nhất</p>
                    <div class="text_hotsearch_table">
                        <table>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Từ Khóa tìm kiếm</th>
                                </tr>
                            </thead>
                            <tbody class="data_search_idkh">
                                <tr>
                                    <td>1</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="">top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm top 1 tìm kiếm</a> </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shopee mail -->
    <div class="shopeemails" id="shopeemails">
        <p>shopee mail</p>
        <div class="shopeemail">
            <div class="shopeemail_slider">
                <!-- chèn slider -->
                <div class="slider">
                    <div class="slide_viewer">
                        <div class="slide_group">
                            <div class="slide">
                                <img src="upload/image/flashsale/2357-t-shop-thoi-trang-vay-dam-5019.jpg" alt="">
                            </div>
                            <div class="slide">
                                <img src="upload/image/flashsale/shop-ban-quan-ao-dep-duong-vo-van-ngan.jpg" alt="">
                            </div>
                            <div class="slide">
                                <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                            </div>
                            <div class="slide">
                                <img src="upload/image/img_quangcao/sale-off-la-gi-phan-biet-sale-off-va-sale-nao-moi-dungsale-off-la-gi-phan-biet-sale-off-va-sale-nao-moi-dung-02-1-1024x576-1-1280x720.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide_buttons">
                </div>

                <div class="directional_nav">
                    <div class="previous_btn" title="Previous">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="-11 -11.5 65 66">
                            <g>
                                <g>
                                    <path fill="#474544" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
                  c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z" />
                                    <path fill="#474544" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="next_btn" title="Next">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="-11 -11.5 65 66">
                            <g>
                                <g>
                                    <path fill="#474544" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z" />
                                    <path fill="#474544" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z" />
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
                <!-- end chèn slider shope mail-->
            </div>
            <div class="shopeemail_noidung">
                <div class="shopeemail_noidung_cards">
                    <div class="shopeemail_noidung_card">
                        <div class="shopeemail_card_img">

                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </div>
                        <div class="shopeemail_card_hang">
                            <img src="upload/image/shopee_mail/download.png" alt="">
                        </div>
                        <div class="shopeemail_card_uudai">
                            <p>ưu đãi đến 50%</p>
                        </div>
                    </div>
                    <div class="shopeemail_noidung_card">
                        <div class="shopeemail_card_img">

                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </div>
                        <div class="shopeemail_card_hang">
                            <img src="upload/image/shopee_mail/download.png" alt="">
                        </div>
                        <div class="shopeemail_card_uudai">
                            <p>ưu đãi đến 50%</p>
                        </div>
                    </div>
                    <div class="shopeemail_noidung_card">
                        <div class="shopeemail_card_img">

                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </div>
                        <div class="shopeemail_card_hang">
                            <img src="upload/image/shopee_mail/download.png" alt="">
                        </div>
                        <div class="shopeemail_card_uudai">
                            <p>ưu đãi đến 50%</p>
                        </div>
                    </div>
                    <div class="shopeemail_noidung_card">
                        <div class="shopeemail_card_img">

                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </div>
                        <div class="shopeemail_card_hang">
                            <img src="upload/image/shopee_mail/download.png" alt="">
                        </div>
                        <div class="shopeemail_card_uudai">
                            <p>ưu đãi đến 50%</p>
                        </div>
                    </div>
                    <div class="shopeemail_noidung_card">
                        <div class="shopeemail_card_img">

                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </div>
                        <div class="shopeemail_card_hang">
                            <img src="upload/image/shopee_mail/download.png" alt="">
                        </div>
                        <div class="shopeemail_card_uudai">
                            <p>ưu đãi đến 50%</p>
                        </div>
                    </div>
                    <div class="shopeemail_noidung_card">
                        <div class="shopeemail_card_img">

                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </div>
                        <div class="shopeemail_card_hang">
                            <img src="upload/image/shopee_mail/download.png" alt="">
                        </div>
                        <div class="shopeemail_card_uudai">
                            <p>ưu đãi đến 50%</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- show san pham product -->
    <div class="products" id="products">
        <p>gợi ý hôm nay</p>
        <div class="product">
            <!-- 1 row card 5 san pham -->
            <div class="product_cards">
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sảnphẩmquầáocaocấpthươnghiệuhànquốcsảnphẩmquầáocaocấpthươnghiệuhànquốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sảnphẩmquầáocaocấpthươnghiệuhànquốcsảnphẩmquầáocaocấpthươnghiệuhànquốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>

                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sảnphẩmquầáocaocấpthươnghiệuhànquốcsảnphẩmquầáocaocấpthươnghiệuhànquốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sảnphẩmquầáocaocấpthươnghiệuhànquốcsảnphẩmquầáocaocấpthươnghiệuhànquốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sảnphẩmquầáocaocấpthươnghiệuhànquốcsảnphẩmquầáocaocấpthươnghiệuhànquốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <p class="product_card_sale">-40% giảm</p>
                </div>
                <div class="product_card">

                    <div class="product_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="product_card_content">
                        <div class="product_card_ten">
                            sản phẩm quần áo cao cấp thương hiệu hàn quốc sản phẩm quần áo cao cấp thương hiệu hàn quốc

                        </div>
                        <div class="product_card_content_bao">
                            <div class="product_card_gia">
                                <div class="product_card_real">
                                    600,000 đ
                                </div>
                                <div class="product_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="product_card_review">
                                <div class="product_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="product_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="product_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                               <i class="fas fa-heart" style="color: #ccc;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="product_card_like">yêu thích</div>
                    <div class="product_card_sale">-40% giảm</div>
                </div>
            </div>
            <div class="product_cards_view_add" toggle="tooltip" title="click để xem thêm sản phẩm">
                <button>Xem thêm sản phẩm</button>
            </div>
        </div>
    </div>
    <!-- phân trang -->
    <div class="phantrangs">
        <div class="phantrang_tranghientai" style="display:none"><?php if(isset($_GET['page'])){echo $_GET['page'];}?></div>
        <div class="phantrang">
            <div class="page">1</div>
            <div class="page">2</div>
            <div class="page">3</div>
            <div class="page">4</div>
        </div>
    </div>
    <div class="notification">
        <!-- <p class="notification_item">
            <span id="timer_notification"></span>
            nội dung thông báo
        </p> -->
    </div>

    <!-- sale footer -->
    <div class="salefooter">
        <img src="upload//image/img_quangcao/images (1).jfif" alt="">
        <img src="upload//image/img_quangcao/images (2).jfif" alt="">
        <img src="upload//image/img_quangcao/images (3).jfif" alt="">
        <img src="upload//image/img_quangcao/images (4).jfif" alt="">
        <img src="upload//image/img_quangcao/images (5).jfif" alt="">
        <img src="upload//image/img_quangcao/images.jfif" alt="">
        <img src="upload//image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt="">
    </div>
    <!--  footer -->
    <?php include_once("footer.php"); ?>
    
    <!-- @*script chay slider*@ -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#slider').nivoSlider({
                controlNav: false,
                nextText: '',
                prevText: ''
            });
        });
    </script>
    <!-- chèn script slider_shopee mail -->
    <script src="./js/shopeemail_slider.js"></script>
     <!-- chèn script chính của trang index-->
    <script src="./js/index.js"></script>
</body>

</html>