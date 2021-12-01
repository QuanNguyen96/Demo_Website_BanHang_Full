<?php
session_start();

use Symfony\Component\VarDumper\VarDumper;

use function GuzzleHttp\Promise\exception_for;


if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add_save_ha_account": {
                add_save_ha_account();
                break;
            }
        case "add_save_account": {
                add_save_account();
                break;
            }
        case "show_acc": {
                show_acc();
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
        case "edit_show": {
                edit_show();
                break;
            }
        case "edit_save_account": {
                edit_save_account();
                break;
            }
        case "edit_save_ha_account": {
                edit_save_ha_account();
                break;
            }
        case "login_pageloginadmin": {
                login_pageloginadmin();
                break;
            }
        case "logout_pageloginadmin": {
                logout_pageloginadmin();
                break;
            }
    }
}
function logout_pageloginadmin()
{
    setcookie('usernameAD', '', time()-60);
    setcookie('MaAD', '', time()-60);
}
function login_pageloginadmin()
{
    $data = [
        'login' => 'error'
    ];
    include("./model/dbconfig.php");
    include("./model/accountmodel.php");
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $acc = new AccountModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
    $result = $acc->login_page_loginadmin($conn, $username, $password);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $MaAD = $row['MaAD'];
        setcookie('usernameAD', $username, time() + 3600);
        setcookie('MaAD', $MaAD, time() + 3600);
        $data = [
            'login' => 'successfull'
        ];
    }
    echo json_encode($data);
}
function edit_save_ha_account()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        $file_hadm = [];
        if (isset($_FILES['fileha_account_add_edits'])) {
            $file_hadm = $_FILES['fileha_account_add_edits'];

            $Path = "./upload/image/accountadmin/";
            $Path = $Path . basename($file_hadm['name']);
            move_uploaded_file($file_hadm['tmp_name'], $Path);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function edit_save_account()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/accountmodel.php');

        $maad = $_POST['maad'];
        $taikhoan = $_POST['taikhoan'];
        $matkhau = md5($_POST['matkhau']);
        $ten = $_POST['ten'];
        $ngaysinh = $_POST['ngaysinh'];
        if ($ngaysinh == "") {
            $ngaysinh = date("Y-m-d");
        }
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        if ($sdt == "") {
            $sdt = 0;
        }
        $img_account = $_POST['img_account'];
        $acc = new AccountModel(0, $taikhoan, $matkhau, $ten, $ngaysinh, $email, $diachi, $sdt, $img_account);
        $acc->update_account($conn, $maad);
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function edit_show()
{
    include('./model/dbconfig.php');
    include('./model/accountmodel.php');
    if (isset($_POST['maad'])) {
        $maad = $_POST['maad'];
        $acc = new AccountModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $result = $acc->search_MaAD($conn, $maad);
        $row = mysqli_fetch_assoc($result);
        $data = [
            "MaAD" => $row['MaAD'],
            "TKLogin" => $row['TKLogin'],
            "MKLogin" => $row['MKLogin'],
            "TenAD" => $row['TenAD'],
            "NgaySinh" => $row['NgaySinh'],
            "Email" => $row['Email'],
            "Address" => $row['Address'],
            "SDT" => $row['SDT'],
            "HinhAnh" => $row['HinhAnh']
        ];
        echo json_encode($data);
    }
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
            include('./model/accountmodel.php');
            foreach ($arrayid as $value) {
                $lsp = new  AccountModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
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
        include('./model/accountmodel.php');
        if (isset($_POST['iddm'])) {
            $id = $_POST['iddm'];
            $lsp = new  AccountModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
            $lsp->delete($conn, $id);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function show_acc()
{
    include('./model/dbconfig.php');
    include('./model/accountmodel.php');
    $acc = new AccountModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
    $result = $acc->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        $dem = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $dem++;
            $datarp .= '<tr>
            <td>
                <input class="checkbox_dm_xoa" data-malspxoa=' . $row['MaAD'] . ' type="checkbox">
            </td>
            <td>' . $row['TKLogin'] . '</td>
            <td>' . $row['MKLogin'] . '</td>
            <td>' . $row['TenAD'] . '</td>
            <td>' . $row['NgaySinh'] . '</td>
            <td>' . $row['Email'] . '</td>
            <td>' . $row['Address'] . '</td>
            <td>' . $row['SDT'] . '</td>';
            if ($row['HinhAnh'] != "") {
                $datarp .= '<td><img src="./upload/image/accountadmin/' . $row['HinhAnh'] . '"></td>';
            } else {
                $datarp .= '<td></td>';
            }

            $datarp .= '<td class="ad_dms_content_table_thaotac">
                <i class="fas fa-users ad_dms_content_table_thaotac_phanquyen" toggle="tooltip" data-maacc_pq=' . $row['MaAD'] . ' title="Phân Quyền"></i>
                <i class="fas fa-edit ad_dms_content_table_thaotac_edit" data-malsp_edit=' . $row['MaAD'] . ' toggle="tooltip"  title="sửa"></i>
                <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" data-malsp=' . $row['MaAD'] . ' toggle="tooltip" title="xóa"></i>
            </td>
        </tr>';
        }
    } else {
        $datarp .= ' <tr>
        <td colspan="10">Không có tài khoản nào</td>
    </tr>';
    }
    echo ($datarp);
}
function add_save_account()
{

    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/accountmodel.php');


        $taikhoan = $_POST['taikhoan'];
        $matkhau = md5($_POST['matkhau']);
        $ten = $_POST['ten'];
        $ngaysinh = $_POST['ngaysinh'];
        if ($ngaysinh == "") {
            $ngaysinh = date("Y-m-d");
        }
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $sdt = $_POST['sdt'];
        if ($sdt == "") {
            $sdt = 0;
        }
        $img_account = $_POST['img_account'];
        $lsp = new AccountModel(0, $taikhoan, $matkhau, $ten, $ngaysinh, $email, $diachi, $sdt, $img_account);
        if ($lsp->add_1($conn)) {
        } else {
            $data = [
                'add_messages' => 'error'
            ];
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function add_save_ha_account()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        $file_hadm = [];
        if (isset($_FILES['fileha_account_add'])) {
            $file_hadm = $_FILES['fileha_account_add'];

            $Path = "./upload/image/accountadmin/";
            $Path = $Path . basename($file_hadm['name']);
            move_uploaded_file($file_hadm['tmp_name'], $Path);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
