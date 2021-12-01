<?php
class HASPModel
{
    private $MaHASP;
    private $MaSP;
    private $HinhAnh;
    public function __construct($MaHASP, $MaSP, $HinhAnh)
    {
        $this->MaHASP = $MaHASP;
        $this->MaSP = $MaSP;
        $this->HinhAnh = $HinhAnh;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO HinhAnhSanPham VALUES (null,$this->MaSP,'$this->HinhAnh')";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show($conn)
    {
        try {
            $sql = "SELECT * FROM HinhAnhSanPham";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function delete($conn, $id)
    {
        try {
            $sql = "DELETE FROM HinhAnhSanPham WHERE MaHASP=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update_hasp($conn, $mahasp)
    {
        try {
            $sql = "UPDATE HinhAnhSanPham SET HinhAnh='$this->HinhAnh' WHERE MaHASP=$mahasp";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_1dm($conn, $id)
    {
        try {
            $sql = "SELECT * FROM HinhAnhSanPham WHERE MaHASP=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_1_theo_masp($conn, $masp)
    {
        try {
            $sql = "SELECT HinhAnh FROM HinhAnhSanPham WHERE MaSP=$masp LIMIT 1";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public function hasp_theosp($conn, $masp)
    {
        try {
            $sql = "SELECT * FROM HinhAnhSanPham WHERE  MaSP=$masp";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public function updatefull($conn, $mahasp)
    {
        try {
            $sql = "UPDATE HinhAnhSanPham SET MaSP=$this->MaSP, HinhAnh='$this->HinhAnh' WHERE   MaHASP=$mahasp";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function updatekofull($conn, $mahasp)
    {
        try {
            $sql = "UPDATE HinhAnhSanPham SET MaSP=$this->MaSP WHERE   MaHASP=$mahasp";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_hasp_xct_theo_masp($conn, $masp)
    {
        try {
            $sql = "SELECT * FROM HinhAnhSanPham WHERE   MaSP=$masp";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
