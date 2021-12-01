<head>
    <link rel="stylesheet" href="./css/footer.css">
</head>
<!-- Messenger Plugin chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "712635262468542");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v12.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!--  footer -->
<div class="footers">
    <div class="footer">
        <div class="footer-top">
            <ul>
                <li><a href="" class="title"><i class="fas fa-id-card"></i>Liên Hệ</a>
                    <ul>
                        <li><a href=""><i class="fas fa-home"></i>website : Shop D&Q</a></li>
                        <li><a href=""><i class="fas fa-envelope"></i> Quan96kun@gmail.com</a></li>
                        <li><a href=""><i class="fas fa-phone"></i> 0384594008</a></li>
                        <li><a href=""><i class="fas fa-map-marker"></i> 440 đường láng, TP.Hà Nội</a></li>
                        <li>
                            <a href=""><i class="fab fa-facebook"></i></a>
                            <a href=""><i class="fab fa-instagram"></i></a>
                            <a href=""><i class="fab fa-twitter"></i></a>
                            <a href=""><i class="fab fa-google"></i></a>
                        </li>
                    </ul>
                </li>
                <li><a href="" class="title">Sự kiện - Mua sắm - FlashSale</a>
                    <ul class="footer-sukien">
                        <li>
                            <a href="">
                                <img src="./upload/image/flashsale/2357-t-shop-thoi-trang-vay-dam-5019.jpg" alt="">
                                <p>Công ty tổ chức sự kiện Tín Nhân cũng chịu nhiều tác động từ đại dịch COVID 19 </p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="./upload/image/flashsale/shop-ban-quan-ao-dep-duong-vo-van-ngan.jpg" alt="">
                                <p>sự kiện thời trang giảm giá cho chị em, ngày mua sắm </p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="./upload/image/flashsale/SLrLFu_simg_de2fe0_500x500_maxb.jpg" alt="">
                                <p>Trade shows (Triển lãm thương mại)</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="footer-thongtinthem"><a href="" class="title">SUBSCRIBE</a>
                    <ul>
                        <li><a href="">Là một website túi thời trang online bán hàng trực tuyến chúng tôi phục vụ nhu cầu mua sắm trực tuyến...  bất cứ khi nào khách hàng có nhu cầu mua sắm túi thời trang online chất lượng giá rẻ đẹp thì Shop túi online là 1 sựa lựa chọn tuyệt vời với khách hàng mỗi ngày.</a></li>
                        <li><a href="">Bạn muốn nhận thêm thông báo từ chúng tôi?</a></li>
                        <li><a href="">Hãy để lại email nhé...</a></li>
                        <li class="footer-thongtinthem_inf"><input type="text"><i class="fas fa-check"></i></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="footer-bottom">
            copyright @ nguyễn văn quân ----
            <br> email : quan96kun@gmail.com ----
        </div>
    </div>
</div>