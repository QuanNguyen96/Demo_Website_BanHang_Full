<?php

use Symfony\Component\VarDumper\VarDumper;

use function GuzzleHttp\Promise\exception_for;

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add_save_sp": {
                add_save_sp();
                break;
            }
        case "update_baiviet_sp": {
                update_baiviet_sp();
                break;
            }
        case "show_baiviet_sp": {
                show_baiviet_sp();
                break;
            }
        case "show_bv": {
                show_bv();
                break;
            }
        case "delete": {
                delete();
                break;
            }
        case "delete_nhieu": {
                delete_nhieu();
                break;
            }
        case "update_baiviet_bv": {
                update_baiviet_bv();
                break;
            }
        case "add_save_bv": {
                add_save_bv();
                break;
            }
    }
}
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case "show_baiviet_xemct_kh": {
                show_baiviet_xemct_kh();
                break;
            }
    }
}
//
function show_baiviet_xemct_kh()
{

    include('./model/dbconfig.php');
    include('./model/baivietmodel.php');
    $masp = $_GET['MaSP'];
    $bv = new BaiVietModel(0, 0, 0);
    $result = $bv->search_masp($conn, $masp);
    $row=mysqli_fetch_assoc($result);
    echo json_encode($row['NoiDung']);
}
function add_save_bv()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/baivietmodel.php');
        $masp = $_POST['masp'];
        $baiviet = $_POST['baiviet'];
        $bv = new BaiVietModel(0, $baiviet, $masp);
        $result = $bv->add_1($conn);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function update_baiviet_bv()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/baivietmodel.php');
        $baiviet = "";
        if (isset($_POST['baiviet'])) {
            $baiviet = $_POST['baiviet'];
        }
        $mabv = $_POST['mabv'];
        $baiviet = new BaiVietModel(0, $baiviet, $mabv);
        $baiviet->update($conn, $mabv);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function delete_nhieu()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        if (isset($_POST['array_id'])) {
            $arrayid = $_POST['array_id'];
            $data = [
                'add_messages' => 'successfull'
            ];
            include('./model/dbconfig.php');
            include('./model/baivietmodel.php');
            foreach ($arrayid as $value) {
                $lsp = new BaiVietModel(0, 0, 0);
                $lsp->delete($conn, $value);
            }
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function delete()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/baivietmodel.php');
        if (isset($_POST['iddm'])) {
            $id = $_POST['iddm'];
            $lsp = new BaiVietModel(0, 0, 0);
            $lsp->delete($conn, $id);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function show_bv()
{
    include('./model/dbconfig.php');
    include('./model/baivietmodel.php');
    $ncc = new BaiVietModel(0, 0, 0);
    $result = $ncc->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= '<tr>
            <td>
                <input class="checkbox_dm_xoa" data-mabvxoa=' . $row['MaBV'] . ' type="checkbox">
            </td>
            <td>
            ' . $row['MaBV'] . ' 
            </td>         
            <td> ' . $row['NoiDung'] . ' </td>
            <td>  ' . $row['MaSP'] . ' </td>
            <td class="ad_sps_content_table_thaotac">
                <i class="fas fa-edit ad_dms_content_table_thaotac_edit" toggle="tooltip" data-mabv_edit=' . $row['MaBV'] . ' title="sửa"></i>
                <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" toggle="tooltip" data-masp_xoa=' . $row['MaBV'] . ' title="xóa"></i>
            </td>
        </tr>';
        }
    } else {
        $datarp .= ' <tr>
        <td colspan="6">Không có bài viết nào</td>
    </tr>';
    }
    echo ($datarp);
}
function show_baiviet_sp()
{
    include('./model/dbconfig.php');
    include('./model/baivietmodel.php');
    $lsp = new BaiVietModel(0, 0, 0);
    $mabv = $_POST['mabaiviet'];
    $result = $lsp->search_mabv($conn, $mabv);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp = $row['NoiDung'];
        }
    } else {
        $datarp = 'không có nội dung';
    }
    echo $datarp;
}
function update_baiviet_sp()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/baivietmodel.php');
        $baiviet = "";
        if (isset($_POST['baiviet'])) {
            $baiviet = $_POST['baiviet'];
        }
        $masp = $_POST['masp'];
        $baiviet = new BaiVietModel(0, $baiviet, $masp);
        $kiemtra = $baiviet->search_sp($conn, $masp);
        if (mysqli_num_rows($kiemtra) > 0) {
            $baiviet->update_sp($conn, $masp);
        } else {
            $baiviet->add_1($conn);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function add_save_sp()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/baivietmodel.php');
        include('./model/sanphammodel.php');
        $sp = new SanPhamModel(0, 0, 0, 0, 0, 0, 0, 0);
        $result = $sp->max_masp($conn);
        $masp = 0;
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $masp = $row['MaSP'];
        }
        $baiviet = "";
        if (isset($_POST['baiviet'])) {
            $baiviet = $_POST['baiviet'];
        }
        $baiviet = new BaiVietModel(0, $baiviet, $masp);
        $baiviet->add_1($conn);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
