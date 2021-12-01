<?php

use Google\Service\AdExchangeBuyerII\Date;

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "morris_donut_show": {
                morris_donut_show();
                break;
            }
        case "morris_line_show": {
                morris_line_show();
                break;
            }
        case "morris_bar_show": {
                morris_bar_show();
                break;
            }
            case "morris_area_show": {
                morris_area_show();
                break;
            }
    }
}
function morris_area_show(){
// dữ liệu line - gồm ngày bán và số lượng bán

include("./model/dbconfig.php");
include("./model/hoadonbanmodel.php");
$hoadonban = new HoaDonBanModel(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$result = $hoadonban->show_hdb_marris_area($conn);
$data_line = [
    0 => [
        "date" => '7-11-2021',
        "value" => 100
    ]
];
if (mysqli_num_rows($result) > 0) {
    $data_line = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $date= date("d-m-Y", strtotime($row['dateonly']));
        $data_item = [
            "date" => $date,
            "value" => $row['SoLuong'],
            "TongTien"=>$row['TongTien'],
        ];
        $data_line[] = $data_item;
    }
}

echo json_encode($data_line);
}
function morris_bar_show()
{
    // dữ liệu line - gồm ngày bán và số lượng bán

    include("./model/dbconfig.php");
    include("./model/hoadonbanmodel.php");
    $hoadonban = new HoaDonBanModel(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $result = $hoadonban->show_hdb_marris_bar($conn);
    $data_line = [
        0 => [
            "date" => '7-11-2021',
            "value" => 100
        ]
    ];
    if (mysqli_num_rows($result) > 0) {
        $data_line = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $date= date("m-Y", strtotime($row['dateonly']));
            $data_item = [
                "date" => $date,
                "value" => $row['SoLuong'],
                "TongTien"=>$row['TongTien'],
            ];
            $data_line[] = $data_item;
        }
    }

    echo json_encode($data_line);
}
function morris_line_show()
{
    // dữ liệu line - gồm ngày bán và số lượng bán

    $ngaybatdau=$_POST['ngaybatdau'];
    // $ngaybatdau= date("d-m-Y", strtotime($ngaybatdau));
    $ngayketthuc=$_POST['ngayketthuc'];
    include("./model/dbconfig.php");
    include("./model/hoadonbanmodel.php");
    $hoadonban = new HoaDonBanModel(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $result = $hoadonban->show_hdb_marris_line($conn,$ngaybatdau,$ngayketthuc);
    $data_line = [
        0 => [
            "date" => '7-11-2021',
            "value" => 100
        ]
    ];
    if (mysqli_num_rows($result) > 0) {
        $data_line = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data_item = [
                "date" => $row['DateOnly'],
                "value" => $row['SoLuong']
            ];
            $data_line[] = $data_item;
        }
    }

    echo json_encode($data_line);
}

function morris_donut_show()
{
    // dữ liệu donut - gồm tổng sản phẩm đã bán và tổng số lượng sản phẩm và tổng đơn hàng

    include("./model/dbconfig.php");
    include("./model/sanphammodel.php");
    include("./model/hoadonbanmodel.php");
    include("./model/chitiethoadonbanmodel.php");
    $tongsoluongban = 0;
    $cthoadonban = new ChiTietHoaDonBanModel(0, 0, 0, 0, 0);
    $result_tslb = $cthoadonban->tongsoluongsanphamban($conn);
    if (mysqli_num_rows($result_tslb) > 0) {
        $row_cthdb = mysqli_fetch_assoc($result_tslb);
        $tongsoluongban = $row_cthdb['TongSoLuong'];
    }
    $result_tsp = $cthoadonban->tongsanphamban($conn);
    $tongsanpham = mysqli_num_rows($result_tsp);
    if ($tongsanpham > 0) {
    } else {
        $tongsanpham = 0;
    }
    $hoadonban = new HoaDonBanModel(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $result_thd = $hoadonban->tongdonhang($conn);
    $tongdonhang = 0;
    if (mysqli_num_rows($result_thd) > 0) {
        $row_thd = mysqli_fetch_assoc($result_thd);
        $tongdonhang = $row_thd['COUNT(*)'];
    }
    $data_donut = [
        0 => [
            "label" => "Tổng số lượng sản phẩm đã bán",
            "value" => $tongsoluongban
        ],
        1 => [
            "label" => "Tổng số sản phẩm đã bán",
            "value" => $tongsanpham,
        ],
        2 => [
            "label" => "Tổng số đơn hàng",
            "value" => $tongdonhang,
        ]
    ];
    echo json_encode($data_donut);
}
