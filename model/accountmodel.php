<?php
class AccountModel
{
    private $MaAD;
    private $TKLogin;
    private $MKLogin;
    private $TenAD;
    private $NgaySinh;
    private $Email;
    private $Address;
    private $SDT;
    private $HinhAnh;
    public function __construct($MaAD, $TKLogin, $MKLogin, $TenAD, $NgaySinh, $Email, $Address, $SDT, $HinhAnh)
    {
        $this->MaAD = $MaAD;
        $this->TKLogin = $TKLogin;
        $this->MKLogin = $MKLogin;
        $this->TenAD = $TenAD;
        $this->NgaySinh = $NgaySinh;
        $this->Email = $Email;
        $this->Address = $Address;
        $this->SDT = $SDT;
        $this->HinhAnh = $HinhAnh;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO AccountAdmin VALUES (null,'$this->TKLogin','$this->MKLogin','$this->TenAD','$this->NgaySinh','$this->Email','$this->Address',$this->SDT,'$this->HinhAnh')";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show($conn)
    {
        try {
            $sql = "SELECT * FROM AccountAdmin";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    // public function show_sp($conn)
    // {
    //     try {
    //         $sql = "SELECT s.TenAD,s.TenSP,b.MaAD,b.MaAD,b.TKLogin  FROM AccountAdmin b, sanpham s WHERE s.TenAD=b.MaAD";
    //         $result = mysqli_query($conn, $sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }
    public function delete($conn, $id)
    {
        try {
            $sql = "DELETE FROM AccountAdmin WHERE MaAD=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_TenAD_NgaySinh($conn, $TenAD, $NgaySinh)
    {
        try {
            $sql = "SELECT * FROM AccountAdmin WHERE TenAD=$TenAD and NgaySinh=$NgaySinh";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_MaAD($conn, $MaAD)
    {
        try {
            $sql = "SELECT * FROM AccountAdmin WHERE MaAD=$MaAD";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update($conn, $id)
    {
        try {
            $sql = "UPDATE AccountAdmin SET TKLogin=$this->TKLogin,MKLogin=$this->MKLogin,TenAD=$this->TenAD ,NgaySinh=$this->NgaySinh  WHERE  MaAD=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public function max_maacc($conn)
    {
        try {
            $sql = "SELECT MAX(MaAD) as MaAD FROM AccountAdmin";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update_account($conn, $id)
    {
        try {
            $sql = "UPDATE AccountAdmin SET TKLogin='$this->TKLogin',MKLogin='$this->MKLogin',TenAD='$this->TenAD' ,NgaySinh='$this->NgaySinh',Email='$this->Email',Address='$this->Address',SDT=$this->SDT ,HinhAnh='$this->HinhAnh'   WHERE  MaAD=$id";
            $result = mysqli_query($conn, $sql);
            return $result;

        } catch (Exception $e) {
            return false;
        }
    }
    public function search_MaAD_pagegiohang($conn)
    {
        try {
            $sql = "SELECT * FROM AccountAdmin LIMIT 1";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function login_page_loginadmin($conn,$username,$password)
    {
        try {
            $sql = "SELECT * FROM AccountAdmin WHERE TKLogin='$username' and MKLogin='$password' ";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    // public function update_sp($conn, $TenAD)
    // {
    //     try {
    //         $sql = "UPDATE AccountAdmin SET TKLogin='$this->TKLogin' WHERE  TenAD=$TenAD";
    //         $result = mysqli_query($conn, $sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }
    // public function update_noupload($conn, $id)
    // {
    //     try {
    //         $sql = "UPDATE AccountAdmin SET TKLogin='$this->TKLogin' WHERE  MaAD=$id";
    //         $result = mysqli_query($conn, $sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }
   
}
