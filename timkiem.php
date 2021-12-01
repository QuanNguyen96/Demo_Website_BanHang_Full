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
    <!-- css searchs_trang tim kiem -->
    <link rel="stylesheet" href="./css/timkiem.css">
</head>

<body>
    <!-- header -->
    <?php include_once("header.php") ?>
    <!-- searchs -->
    <div class="searchs">
        <div class="searchs_left">
            <div class="searchs_left_filter">
                <i class="fas fa-filter"></i>
                <span> Bộ lọc tìm kiếm........</span>
            </div>
            <div class="searchs_left_content">
                <div class="searchs_left_content_danhmuc">
                    <p>Theo danh mục</p>
                    <div class="danhmuc_bao">
                        <div class="row">
                            <input type="checkbox">
                            <p>thời trang nam</p>
                        </div>
                        <div class="row">
                            <input type="checkbox">
                            <p>thời trang nam</p>
                        </div>
                        <div class="row">
                            <input type="checkbox">
                            <p>thời trang trẻ em</p>
                        </div>
                    </div>
                    <div class="searchs_left_content_danhmuc_them" style="cursor:pointer;color:blue;text-decoration: underline;">Thêm v</div>
                </div>
                <div class="searchs_left_content_gia">
                    <p>Theo giá bán</p>
                    <div class="">
                        <select id="search_select_gia">
                            <option value="0">Chọn mức giá</option>
                            <option value="1"> nhỏ hơn 100,000 vnd</option>
                            <option value="2">từ 100,000 -> 500,0000</option>
                            <option value="3">từ 500,000 -> 1,000,0000</option>
                            <option value="4">trên 1 triệu</option>
                        </select>
                    </div>
                    <div style="color:blue"> hoặc</div>
                    <div class="searchs_left_content_gia_locgia">
                        <span>từ</span><input type="number">
                        <br>
                        <span>đến</span><input type="number">
                    </div>

                </div>
                <div class="searchs_left_content_khuyenmai">
                    <p>Theo khuyến mại</p>
                    <div class="khuyenmaibao">
                        <div class="row">
                            <input type="checkbox">
                            <p id="tenmakm">mã freeship</p>
                            <p id="makm_giamgia" style="color:red">(-20%)</p>
                        </div>
                        <div class="row">
                            <input type="checkbox">
                            <p>mã lamquen</p>
                        </div>
                        <div class="row">
                            <input type="checkbox">
                            <p>mã momo(lần đầu 40k)</p>
                        </div>
                    </div>
                    <div class="searchs_left_content_khuyenmai_them" style="cursor:pointer;color:blue;text-decoration: underline;">Thêm v</div>
                </div>
            </div>
        </div>
        <div class="searchs_right">
            <div class="searchs_thongbao">
                <i class="fas fa-lightbulb"></i>
                <p> kết quả tìm kiếm cho từ khóa ' <span style="color:red" id="text_search_color">thời trang nam</span> ' - <span id="tongso_ketqua">20 kết quả</span></p>
            </div>
            <div class="search_cards">
                <div class="search_card">

                    <div class="search_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="search_card_content">
                        <div class="search_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="search_card_content_bao">
                            <div class="search_card_gia">
                                <div class="search_card_real">
                                    600,000 đ
                                </div>
                                <div class="search_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="search_card_review">
                                <div class="search_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="search_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="search_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                                <i class="fas fa-heart" style="color: red;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="search_card_sale">-40% giảm</div>
                </div>
                <div class="search_card">

                    <div class="search_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="search_card_content">
                        <div class="search_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="search_card_content_bao">
                            <div class="search_card_gia">
                                <div class="search_card_real">
                                    600,000 đ
                                </div>
                                <div class="search_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="search_card_review">
                                <div class="search_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="search_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="search_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                                <i class="fas fa-heart" style="color: red;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="search_card_sale">-40% giảm</div>
                </div>
                <div class="search_card">

                    <div class="search_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="search_card_content">
                        <div class="search_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="search_card_content_bao">
                            <div class="search_card_gia">
                                <div class="search_card_real">
                                    600,000 đ
                                </div>
                                <div class="search_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="search_card_review">
                                <div class="search_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="search_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="search_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                                <i class="fas fa-heart" style="color: red;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="search_card_sale">-40% giảm</div>
                </div>
                <div class="search_card">

                    <div class="search_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="search_card_content">
                        <div class="search_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="search_card_content_bao">
                            <div class="search_card_gia">
                                <div class="search_card_real">
                                    600,000 đ
                                </div>
                                <div class="search_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="search_card_review">
                                <div class="search_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="search_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="search_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                                <i class="fas fa-heart" style="color: red;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="search_card_sale">-40% giảm</div>
                </div>
                <div class="search_card">

                    <div class="search_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="search_card_content">
                        <div class="search_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="search_card_content_bao">
                            <div class="search_card_gia">
                                <div class="search_card_real">
                                    600,000 đ
                                </div>
                                <div class="search_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="search_card_review">
                                <div class="search_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="search_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="search_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                                <i class="fas fa-heart" style="color: red;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="search_card_sale">-40% giảm</div>
                </div>
                <div class="search_card">

                    <div class="search_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="search_card_content">
                        <div class="search_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="search_card_content_bao">
                            <div class="search_card_gia">
                                <div class="search_card_real">
                                    600,000 đ
                                </div>
                                <div class="search_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="search_card_review">
                                <div class="search_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="search_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="search_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                                <i class="fas fa-heart" style="color: red;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="search_card_sale">-40% giảm</div>
                </div>
                <div class="search_card">

                    <div class="search_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="search_card_content">
                        <div class="search_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="search_card_content_bao">
                            <div class="search_card_gia">
                                <div class="search_card_real">
                                    600,000 đ
                                </div>
                                <div class="search_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="search_card_review">
                                <div class="search_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="search_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="search_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                                <i class="fas fa-heart" style="color: red;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="search_card_sale">-40% giảm</div>
                </div>
                <div class="search_card">

                    <div class="search_card_img">
                        <a href="./xemchitiet.php">
                            <img src="upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                        </a>
                    </div>
                    <div class="search_card_content">
                        <div class="search_card_ten">
                            sản phẩm quần áo cao cấp

                        </div>
                        <div class="search_card_content_bao">
                            <div class="search_card_gia">
                                <div class="search_card_real">
                                    600,000 đ
                                </div>
                                <div class="search_card_show">
                                    300,000 đ
                                </div>

                            </div>
                            <div class="search_card_review">
                                <div class="search_card_danhgia">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="search_card_daban">
                                    Đã bán 1.5k
                                </div>
                            </div>
                            <div class="search_card_dathang">
                                <i class="fas fa-cart-plus" style="color: rgb(36, 33, 224);"></i>
                                <i class="fas fa-heart" style="color: red;"></i>
                                <a href="./xemchitiet.php">xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                    <div class="search_card_sale">-40% giảm</div>
                </div>
            </div>
            <!-- phân trang -->
            <div class="phantrangs">
                <div class="phantrang">
                    <div class="page">1</div>
                    <div class="page">2</div>
                    <div class="page">3</div>
                    <div class="page">4</div>
                </div>
            </div>
             <!-- phân trang -->
             <div class="phantranglocs">
                <div class="phantrangloc">
                    <div class="page">1</div>
                    <div class="page">2</div>
                    <div class="page">3</div>
                    <div class="page">4</div>
                </div>
            </div>
        </div>
    </div>
    <!-- flas sale -->
    <div class="flashsalses">

        <div class="flashsalse">

            <div class="flashsale_right">
                <h2>flash sale</h2>
                <div class="flashsale-cards">
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
    <div class="notification">
        <!-- <p class="notification_item">
            <span id="timer_notification"></span>
            nội dung thông báo
        </p> -->
    </div>
    <!-- sale footer -->
    <div class="salefooter">
        <img src="upload//image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt="">
        <img src="upload//image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt="">
        <img src="upload//image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt="">
        <img src="upload//image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt="">
        <img src="upload//image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt="">
        <img src="upload//image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt="">
        <img src="upload//image/img_quangcao/cach-san-flash-sale-tren-shopee-9.png" alt="">
    </div>
    <!--  footer -->
    <?php include_once("footer.php"); ?>

    <!-- script danh muc -->
    <script src="./js/timkiem.js"></script>
</body>

</html>