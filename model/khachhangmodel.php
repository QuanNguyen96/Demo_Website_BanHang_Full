<?php
class KhachHangModel
{
    private $MaKH;
    private $TKLogin;
    private $MKLogin;
    private $TenKH;
    private $FaceBook;
    private $Email;
    private $address;
    private $SDT;
    private $TrangThaiTK;
    public function __construct($MaKH, $TKLogin, $MKLogin, $TenKH, $FaceBook, $Email, $address, $SDT,$TrangThaiTK)
    {
        $this->MaKH = $MaKH;
        $this->TKLogin = $TKLogin;
        $this->MKLogin = $MKLogin;
        $this->TenKH = $TenKH;
        $this->FaceBook = $FaceBook;
        $this->Email = $Email;
        $this->address = $address;
        $this->SDT = $SDT;
        $this->TrangThaiTK = $TrangThaiTK;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO KhachHang VALUES (null,'$this->TKLogin','$this->MKLogin','$this->TenKH','$this->FaceBook','$this->Email','$this->address','$this->SDT',$this->TrangThaiTK)";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show($conn)
    {
        try {
            $sql = "SELECT * From KhachHang";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_1($conn,$MaKH)
    {
        try {
            $sql = "SELECT * From KhachHang WHERE MaKH=$MaKH";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function delete($conn, $id)
    {
        try {
            $sql = "DELETE FROM KhachHang WHERE MaKH=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update($conn, $id)
    {
        try {
            $sql = "UPDATE KhachHang SET TKLogin='$this->TKLogin',MKLogin='$this->MKLogin',TenKH='$this->TenKH',FaceBook='$this->FaceBook',Email='$this->Email',address='$this->address',SDT='$this->SDT',TrangThaiTK=$this->TrangThaiTK WHERE MaKH=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
          
        } catch (Exception $e) {
            return false;
        }
    }
    // public function update_trangthaihienthi($conn, $id)
    // {
    //     try {
    //         $sql = "UPDATE KhachHang SET Email=$this->Email WHERE  MaKH=$id";
    //         $result = mysqli_query($conn, $sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }
    // public function max_MaKH($conn)
    // {
    //     try {
    //         $sql = "SELECT MaKH  FROM KhachHang where MaKH=(select max(MaKH) from KhachHang)";
    //         $result = mysqli_query($conn, $sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }

    // check ton tai cua tai khoan de them vao trong page register
    public function check_account_register($conn,$TKLogin)
    {
        try {
            $sql = "SELECT * From KhachHang WHERE TKLogin='$TKLogin'";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function kichhoat_account_register($conn,$TKLogin)
    {
        try {
            $sql = "UPDATE KhachHang SET TrangThaiTK=1 WHERE TKLogin='$TKLogin'";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function check_account_login($conn,$username,$password)
    {
        try {
            $sql = "SELECT * From KhachHang WHERE TKLogin='$username' and MKLogin='$password' and TrangThaiTK=1";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function check_account_facebook($conn,$email)
    {
        try {
            $sql = "SELECT * From KhachHang WHERE Email='$email' and TrangThaiTK=2";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_account_facebook_gmail($conn)
    {
        try {
            $sql = "SELECT * From KhachHang WHERE TKLogin='$this->TKLogin' and MKLogin='$this->MKLogin' and TenKH='$this->TenKH' and FaceBook='$this->FaceBook' and Email='$this->Email' and address='$this->address' and SDT='$this->SDT' and TrangThaiTK=$this->TrangThaiTK ";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_account_taikhoan($conn,$taikhoan,$matkhau)
    {
        try {
            $sql = "SELECT * From KhachHang WHERE TKLogin='$taikhoan' and MKLogin='$matkhau' and TrangThaiTK=1 ";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
