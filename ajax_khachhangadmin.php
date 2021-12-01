<?php
session_start();
require_once('vendor\firebase\php-jwt\src\JWT.php');

use Firebase\JWT\JWT;
use JWT_Token as GlobalJWT_Token;

class JWT_Token
{
    private $data;
    private $secret_key;
    private $mahoa = "HS256";
    public function JWT_Token($_data, $_secret_key)
    {
        $this->data = $_data;
        $this->secret_key = $_secret_key;
    }
    public function token_encode()
    {
        return JWT::encode($this->data, $this->secret_key, $this->mahoa);
    }
    public function token_decode($jwt_token, $sk)
    {
        return JWT::decode($jwt_token, $sk, array($this->mahoa));
    }
};
function send_mail_toemail($message, $email)
{

    $to      = $email;
    $subject = "Xác thực tài khoản";
    $header  =  "From:quan96kun@gmail.com \r\n";
    $header .= "MIME-Version: 1.0\r\n";             //MỚI
    $header .= "Content-type: text/html\r\n";       //MỚI

    mail($to, $subject, $message, $header);
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "add_save": {
                add_save();
                break;
            }
        case "show_kh": {
                show_kh();
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
        case "edit_kh_save": {
                edit_kh_save();
                break;
            }
        case "show_data_hasp_ha": {
                show_data_hasp_ha();
                break;
            }
        case "add_acccountkh_register": {
                add_acccountkh_register();
                break;
            }
        case "login_acccountkh_login": {
                login_acccountkh_login();
                break;
            }
        case "dangxuat_account_tk_indexkh": {
                dangxuat_account_tk_indexkh();
                break;
            }
        case "dangxuat_account_facebook_indexkh": {
                dangxuat_account_facebook_indexkh();
                break;
            }
        case "dangxuat_account_gmail_indexkh": {
                dangxuat_account_gmail_indexkh();
                break;
            }
        case "kiemtralogin_page_giohang": {
                kiemtralogin_page_giohang();
                break;
            }
    }
}
//
function kiemtralogin_page_giohang()
{
    $data = [
        "ktra" => "chuatontai"
    ];

    if (isset($_SESSION['usernameDQ']) && isset($_SESSION['pthuc'])) {
        $makh = 0;
        if (isset($_SESSION['MaKH'])) {
            $makh = $_SESSION['MaKH'];
        }
        include('./model/dbconfig.php');
        include('./model/khachhangmodel.php');
        $khachhang = new KhachHangModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $result = $khachhang->search_1($conn, $makh);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $data = [
                "ktra" => "tontai",
                "TenKH" => $row['TenKH'],
                "Email" => $row['Email'],
                "SDT" => $row['SDT']
            ];
        }
    }
    echo json_encode($data);
}
function dangxuat_account_gmail_indexkh()
{
    session_destroy();
    if (isset($_SESSION['usernameDQ'])) {
        unset($_SESSION['usernameDQ']);
    }
    if (isset($_SESSION['emailDQ'])) {
        unset($_SESSION['emailDQ']);
    }
    if (isset($_SESSION['login_gmail_url'])) {
        unset($_SESSION['login_gmail_url']);
    }
    if (isset($_SESSION['pthuc'])) {
        unset($_SESSION['pthuc']);
    }
    header('location: https://quannguyen.com/du%20an%20website%20ban%20hang/google_gmail/login_gmail.php');
}
function dangxuat_account_facebook_indexkh()
{
    session_destroy();
    if (isset($_SESSION['usernameDQ'])) {
        unset($_SESSION['usernameDQ']);
    }
    if (isset($_SESSION['emailDQ'])) {
        unset($_SESSION['emailDQ']);
    }
    if (isset($_SESSION['user_id'])) {
        unset($_SESSION['user_id']);
    }
    if (isset($_SESSION['login_facebook_url'])) {
        unset($_SESSION['login_facebook_url']);
    }
    if (isset($_SESSION['pthuc'])) {
        unset($_SESSION['pthuc']);
    }
    header('location: https://quannguyen.com/du%20an%20website%20ban%20hang/facebook/login.php');
}
function dangxuat_account_tk_indexkh()
{
    session_destroy();
    if (isset($_SESSION['usernameDQ'])) {
        unset($_SESSION['usernameDQ']);
    }
    if (isset($_SESSION['pthuc'])) {
        unset($_SESSION['pthuc']);
    }
}
function login_acccountkh_login()
{
    $data = [
        'add_messages' => 'error'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/khachhangmodel.php');

        $taikhoan = "";
        if (isset($_POST['username'])) {
            $taikhoan = $_POST['username'];
        }
        $matkhau = "";
        if (isset($_POST['password'])) {
            $matkhau = md5($_POST['password']);
        }
        $khachhang = new KhachHangModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $result = $khachhang->check_account_login($conn, $taikhoan, $matkhau);
        // lấy mã kh
        $result_search = $khachhang->search_account_taikhoan($conn, $taikhoan, $matkhau);
        if (mysqli_num_rows($result_search) > 0) {
            $row_search = mysqli_fetch_assoc($result_search);
            $_SESSION['MaKH'] = $row_search['MaKH'];
        }
        if (mysqli_num_rows($result) == 1) {
            $data = [
                'add_messages' => 'successfull'
            ];
            $_SESSION['usernameDQ'] = $taikhoan;
            $_SESSION['pthuc'] = "taikhoan";
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function add_acccountkh_register()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/khachhangmodel.php');
        $taikhoan = "";
        if (isset($_POST['username'])) {
            $taikhoan = $_POST['username'];
        }
        $matkhau = "";
        if (isset($_POST['password'])) {
            $matkhau = md5($_POST['password']);
        }
        $tenkh = "";
        if (isset($_POST['tenkh'])) {
            $tenkh = $_POST['tenkh'];
        }
        $facebook = "";
        if (isset($_POST['facebook'])) {
            $facebook = $_POST['facebook'];
        }
        $email = "";
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        $address = "";
        if (isset($_POST['address'])) {
            $address = $_POST['address'];
        }
        $sdt = 0;
        if (isset($_POST['sdt'])) {
            $sdt = $_POST['sdt'];
            if ($sdt == "") {
                $sdt = 0;
            }
        }
        $hienthi = 0;
        if (isset($_POST['hienthi'])) {
            $hienthi = $_POST['hienthi'];
        }
        // check tai khoarn ton tai
        $kh = new KhachHangModel(0, $taikhoan, $matkhau, $tenkh, $facebook, $email, $address, $sdt, $hienthi);
        $result = $kh->check_account_register($conn, $taikhoan);

        if (mysqli_num_rows($result) > 0) {
            $data = [
                'add_messages' => 'tontai'
            ];
        } else {
            if ($kh->add_1($conn)) {
                // gửi mail kích hoạt tài khoản
                $secret_key = "MAT_KHAU_XAC_THUC";
                $data_token = $taikhoan;
                $token_xacthuc = new JWT_Token($data_token, $secret_key);
                $token = $token_xacthuc->token_encode();
                $link = '<h2>Chào mừng bạn đến với Shop D&Q</h2>
                    <div>Hãy xác thực để sử dụng tài khoản mua sắm tại website của chúng tối </div>
                <a href="https://quannguyen.com/du%20an%20website%20ban%20hang/pagexacthuc.php?token=' . $token . '">CLick để xác thực</a>';
                send_mail_toemail($link, $email);
            } else {
                $data = [
                    'add_messages' => 'error'
                ];
            }
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function show_data_hasp_ha()
{
    include('./model/dbconfig.php');
    include('./model/khachhangmodel.php');
    $khachhang = new KhachHangModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
    $result = $khachhang->show($conn);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= ' <option value=' . $row['MaKH'] . '>' . $row['MaKH'] . '-' . $row['TenKH'] . '</option>';
        }
    } else {
        $datarp .= '<option value=null>không có sản phẩm nào</option>';
    }
    echo $datarp;
}
function edit_kh_save()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/khachhangmodel.php');
        $MaKH = $_POST['MaKH'];
        $TKLogin = $_POST['TKLogin'];
        $MKLogin = $_POST['MKLogin'];
        $TenKH = $_POST['TenKH'];
        $FaceBook = $_POST['FaceBook'];
        $Email = $_POST['Email'];
        $address = $_POST['address'];
        $SDT = $_POST['SDT'];
        $TrangThaiTK = $_POST['TrangThaiTK'];
        $lsp = new KhachHangModel($MaKH, $TKLogin, $MKLogin, $TenKH, $FaceBook, $Email, $address, $SDT, $TrangThaiTK);
        $lsp->update($conn, $MaKH);
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
    include('./model/khachhangmodel.php');
    if (isset($_POST['iddm'])) {
        $id = $_POST['iddm'];
        $lsp = new KhachHangModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
        $result = $lsp->search_1($conn, $id);
        $row = mysqli_fetch_assoc($result);
        $data = [
            "MaKH" => $row['MaKH'],
            "TKLogin" => $row['TKLogin'],
            "MKLogin" => $row['MKLogin'],
            "TenKH" => $row['TenKH'],
            "FaceBook" => $row['FaceBook'],
            "Email" => $row['Email'],
            "address" => $row['address'],
            "SDT" => $row['SDT'],
            "TrangThaiTK" => $row['TrangThaiTK']
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
            include('./model/khachhangmodel.php');
            foreach ($arrayid as $value) {
                $lsp = new KhachHangModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
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
        include('./model/khachhangmodel.php');
        if (isset($_POST['iddm'])) {
            $id = $_POST['iddm'];
            $lsp = new KhachHangModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
            $lsp->delete($conn, $id);
        }
    } catch (Exception $e) {
        $data = [
            'add_messages' => 'error'
        ];
    }
    echo json_encode($data);
}
function show_kh()
{
    include('./model/dbconfig.php');
    include('./model/khachhangmodel.php');
    $ncc = new KhachHangModel(0, 0, 0, 0, 0, 0, 0, 0, 0);
    $result = $ncc->show($conn);
    $datarp = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datarp .= '<tr>
            <td>
                <input class="checkbox_dm_xoa" data-makhxoa=' . $row['MaKH'] . ' type="checkbox">
            </td>
            <td>
            ' . $row['MaKH'] . ' 
            </td>         
            <td>' . $row['TKLogin'] . ' </td>
            <td>' . $row['MKLogin'] . ' </td>
            <td>
            ' . $row['TenKH'] . ' 
            </td>
            <td>
            ' . $row['FaceBook'] . ' 
            </td>
            <td>
            ' . $row['Email'] . ' 
            </td>
            <td>
            ' . $row['address'] . ' 
            </td>
            <td>
            ' . $row['SDT'] . ' 
            </td>
            <td>
            ' . $row['TrangThaiTK'] . ' 
             </td>
            <td class="ad_sps_content_table_thaotac">
                <i class="fas fa-edit ad_dms_content_table_thaotac_edit" toggle="tooltip" data-masp_edit=' . $row['MaKH'] . ' title="sửa"></i>
                <i class="fas fa-trash-alt ad_dms_content_table_thaotac_delete" toggle="tooltip" data-masp_xoa=' . $row['MaKH'] . ' title="xóa"></i>
            </td>
        </tr>';
        }
    } else {
        $datarp .= ' <tr>
        <td colspan="12">Không có khách hàng nào</td>
    </tr>';
    }
    echo ($datarp);
}
function add_save()
{
    $data = [
        'add_messages' => 'successfull'
    ];
    try {
        include('./model/dbconfig.php');
        include('./model/khachhangmodel.php');
        $taikhoan = "";
        if (isset($_POST['taikhoan'])) {
            $taikhoan = $_POST['taikhoan'];
        }
        $matkhau = "";
        if (isset($_POST['matkhau'])) {
            $matkhau = md5($_POST['matkhau']);
        }
        $tenkh = "";
        if (isset($_POST['tenkh'])) {
            $tenkh = $_POST['tenkh'];
        }
        $facebook = "";
        if (isset($_POST['facebook'])) {
            $facebook = $_POST['facebook'];
        }
        $email = "";
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        $address = "";
        if (isset($_POST['address'])) {
            $address = $_POST['address'];
        }
        $sdt = 0;
        if (isset($_POST['sdt'])) {
            $sdt = $_POST['sdt'];
            if ($sdt == "") {
                $sdt = 0;
            }
        }
        $hienthi = "";
        if (isset($_POST['hienthi'])) {
            $hienthi = $_POST['hienthi'];
        }
        $lsp = new KhachHangModel(0, $taikhoan, $matkhau, $tenkh, $facebook, $email, $address, $sdt, $hienthi);
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
