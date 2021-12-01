<?php
include_once('./headerAdmin.php')
?>

<head>
    <!-- js+css moris_charts -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <link rel="stylesheet" href="./css/baocaobieudo.css">

</head>
<div class="baocao_bieudo">
    <div class="nhapngayloc">
        <div class="row">
            <label for="">Từ ngày : &nbsp;</label>
            <input type="date" class="ngaybatdau_loc">
        </div>

        <div class="row">
            <label for="">đến ngày :&nbsp; </label>
            <input type="date" class="ngayketthuc_loc">
        </div>
        <div class="row"> <button id="btn_locdata">Lọc kết quả</button></div>
    </div>
    <div id="myfirstchart" style="height: 250px;"></div>
    <div style="text-align:center;margin-bottom: 10px;color:blue;font-size:20px">Biểu đồ doanh số</div>
    <div class="tongquat_baocao">
        <table>
            <tr>
                <th>
                    Tổng số SP bán
                </th>
                <th>
                    Tổng số lượng SP bán
                </th>
                <th>
                    Doanh thu Tổng
                </th>
            </tr>
            <tr>
                <td>
                    Tổng số SP bán
                </td>
                <td>
                    Tổng số lượng SP bán
                    </th>
                <td>
                    Doanh thu Tổng
                    </th>
            </tr>
        </table>
    </div>
    <div class="row bdc">
        <div id="chart_bar" style="height: 250px;"></div>
        <div id="chart_area" style="height: 250px;"></div>
    </div>


    <div class="row bdc">
        <div class="donut_left">
            <div><p>Tổng số sản phẩm đã bán :</p></div>
            <div><p>Tổng số lượng sản phẩm đã bán :</p></div>
            <div><p>Tổng doanh thu :</p></div>
            <div class="row"><p style="background: #f12d2d;width:70px;height:24px"></p>&nbsp;&nbsp;Tổng số sản phẩm đã bán</div>
            <div class="row"><p style="background: #0db35e;width:70px;height:24px"></p>&nbsp;&nbsp;Tổng số lượng sản phẩm đã bán</div>
            <div class="row"><p style="background: #ff9717;width:70px;height:24px"></p>&nbsp;&nbsp;Tổng doanh thu</div>
        </div>
        <div class="donut_right">
            <div id="chart_Donut" style="height: 300px;"></div>
        </div>
    </div>

</div>
<script>
    $('#btn_locdata').on('click', function() {
        morris_line();
    })
    var morris_chart_line;

    function morris_line() {
        morris_chart_line = null;
        $('#myfirstchart').html('')
        var ngaybatdauloc = $('.ngaybatdau_loc').val()
        var ngayketthucloc = $('.ngayketthuc_loc').val()
        $.ajax({
            url: "./ajax_baocao.php",
            method: "post",
            data: {
                "action": "morris_line_show",
                "ngaybatdau": ngaybatdauloc,
                "ngayketthuc": ngayketthucloc
            },
            dataType: "json",
            success: function(datarp) {
                morris_chart_line = new Morris.Line({
                    // ID of the element in which to draw the chart.
                    element: 'myfirstchart',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    data: datarp,
                    // The name of the data record attribute that contains x-values.
                    xkey: 'date',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['value'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['SP đã bán']
                });
            }
        })


    }
    morris_line()

    function morris_bar() {
        $.ajax({
            url: "./ajax_baocao.php",
            method: "post",
            data: {
                "action": "morris_bar_show"
            },
            dataType: "json",
            success: function(datarp) {
                new Morris.Bar({
                    // ID of the element in which to draw the chart.
                    element: 'chart_bar',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    // data: datarp,
                    data: datarp,
                    barColors: ["black", "#5ec70f", "red"], // linecolor,areacolor
                    pointFillColors: ["pink"],
                    pointStrockeColors: ["red"],
                    fillOpactity: 0.5,
                    hideHover: "auto",
                    parseTime: false,
                    // The name of the data record attribute that contains x-values.
                    xkey: 'date',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['value', 'TongTien'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['Số lượng SP', "Tổng tiền"]
                });
            }
        })


    }
    morris_bar()

    function morris_area() {
        $.ajax({
            url: "./ajax_baocao.php",
            method: "post",
            data: {
                "action": "morris_area_show"
            },
            dataType: "json",
            success: function(datarp) {
                new Morris.Area({
                    // ID of the element in which to draw the chart.
                    element: 'chart_area',
                    // Chart data records -- each entry in this array corresponds to a point on
                    // the chart.
                    data: datarp,
                    lineColors: ["#4bdd00", "#c78acf", "#b5a742"], // linecolor,areacolor
                    pointFillColors: ["black"],
                    pointStrockeColors: ["red"],
                    fillOpactity: 0.5,
                    hideHover: "auto",
                    parseTime: false,
                    // The name of the data record attribute that contains x-values.
                    xkey: 'date',
                    // A list of names of data record attributes that contain y-values.
                    ykeys: ['value', 'TongTien'],
                    // Labels for the ykeys -- will be displayed when you hover over the
                    // chart.
                    labels: ['Số lượng SP', "Tổng tiền"]
                });
            }
        })


    }
    morris_area()

    function morris_donut() {

        $.ajax({
            url: "./ajax_baocao.php",
            method: "post",
            data: {
                "action": "morris_donut_show"
            },
            dataType: "json",
            success: function(datarp) {
                new Morris.Donut({
                    element: 'chart_Donut',
                    data: datarp,
                    colors: ["#0db35e", "#f12d2d", "#ff9717"],
                    resize: false,
                    width: 500,
                    heith: 500
                });
            }
        })

    }
    morris_donut()
</script>
<!-- footer -->
<?php
include_once('./footerAdmin.php')
?>