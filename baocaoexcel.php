<?php
include_once('./headerAdmin.php')
?>

<head>
    <!-- css sanphamadmin.css -->
    <link rel="stylesheet" href="./css/khachhangadmin.css">
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Document</title>
    <style>
        .theheaderpdf {
            display: flex;
            align-items: center;
            flex-direction: row wrap;
            margin-top: 15px;
            margin-bottom: 10px;
        }

        .data_excel {
            border-collapse: collapse;
            text-align: center;
            width: 100%;
            
        }

        .data_excel th,
        td {
            border: 1px solid #ccc;
            padding: 3px 8px;
        }

        .data_excel img {
            width: 80px;
            height: 80px;
        }
    </style>
</head>

<div class="page_pdf">
    <div class="theheaderpdf">
        <img src="./FilePDF/hinh1.jpg" width="50" height="50" alt="">
        <span>SHOP quần áo cao cấp thương hiệu D & Q</span>
        
    </div>
    <div><button class="savefilepdf"> save file pdf</button>
<button class="motabnew"><a href="./FilePDF/test.php" target="blank"> Xem Trước file</a></button></div>
    <h2>phiếu nhập hàng</h2>
    <table class="data_excel">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Ngày Bán</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
        <?php
        include("./model/hoadonbanmodel.php");
        include("./model/haspmodel.php");
        $html = '';
        $hoadonban = new   HoaDonBanModel(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $result_data = $hoadonban->baocaoexcel($conn);
        $demtang = 0;
        if (mysqli_num_rows($result_data) > 0) {
            //lay du lieu data

            $tongtien = 0;
            while ($row_data = mysqli_fetch_assoc($result_data)) {
                $tongtien += (int)($row_data['ThanhTien']);
                $demtang++;
                //lay hinh anh
                $hasp = new HASPModel(0, 0, 0);
                $result_hasp = $hasp->search_1_theo_masp($conn, $row_data['MaSP']);

                $hinhanh = "";
                if (mysqli_num_rows($result_hasp) > 0) {
                    $row_hasp = mysqli_fetch_assoc($result_hasp);
                    $hinhanh = $row_hasp['HinhAnh'];
                }
                $html .= '
                    <tr>
                        <td>' . $demtang . '</td>
                        <td>' . $row_data['TenSP'] . '</td>
                        <td><img src="./upload/image/hasp/' . $hinhanh . '"></td>
                        <td>' . $row_data['date'] . '</td>
                        <td>' . $row_data['SoLuong'] . '</td>
                        <td>' . $row_data['DonGia'] . '</td>
                        <td>' . $row_data['ThanhTien'] . '</td>
                        
                    </tr>';
            }
            $html .= '<tr>
                <td colspan="3"></td>
                <td colspan="2">Tổng tiền</td>
                <td colspan="2"> ' . $tongtien . '</td>
                </tr>';
        }
        echo $html;

        ?>

    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $(".savefilepdf").on("click", function() {
            var divContents = $(".page_pdf").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
             printWindow.print();

        });

    })
</script>
<!-- footer -->
<?php
include_once('./footerAdmin.php')
?>