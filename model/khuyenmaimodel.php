<?php
class KhuyenMaiModel
{
    private $MaKM;
    private $TenKM;
    private $NgayBatDau;
    private $NgayKetThuc;
    private $GiamGia;
    private $MaSP;
    public function __construct($MaKM, $TenKM, $NgayBatDau, $NgayKetThuc, $GiamGia, $MaSP)
    {
        $this->MaKM = $MaKM;
        $this->TenKM = $TenKM;
        $this->NgayBatDau = $NgayBatDau;
        $this->NgayKetThuc = $NgayKetThuc;
        $this->GiamGia = $GiamGia;
        $this->MaSP = $MaSP;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO KhuyenMai VALUES (null,'$this->TenKM','$this->NgayBatDau','$this->NgayKetThuc',$this->GiamGia,$this->MaSP)";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show($conn)
    {
        try {
            $sql = "SELECT * FROM KhuyenMai";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_searchkh($conn)
    {
        try {
            $sql = "SELECT * FROM KhuyenMai ORDER BY GiamGia DESC LIMIT 10";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    // // public function show_sp($conn)
    // // {
    // //     try {
    // //         $sql = "SELECT s.MaSP,s.TenSP,b.MaKM,b.MaKM,b.TenKM  FROM DanhGia b, sanpham s WHERE s.MaSP=b.MaKM";
    // //         $result = mysqli_query($conn, $sql);
    // //         return $result;
    // //     } catch (Exception $e) {
    // //         return false;
    // //     }
    // // }
    public function delete($conn, $id)
    {
        try {
            $sql = "DELETE FROM KhuyenMai WHERE MaKM=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    // public function search_masp_NgayBatDau($conn, $masp, $NgayBatDau)
    // {
    //     try {
    //         $sql = "SELECT * FROM DanhGia WHERE MaSP=$masp and NgayBatDau=$NgayBatDau";
    //         $result = mysqli_query($conn, $sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }
    public function search_1dm($conn, $MaKM)
    {
        try {
            $sql = "SELECT * FROM KhuyenMai WHERE MaKM=$MaKM";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_1km_theo_masp($conn, $MaSP)
    {
        try {
            $sql = "SELECT * FROM KhuyenMai WHERE MaSP=$MaSP LIMIT 1";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update($conn, $id)
    {
        try {
            $sql = "UPDATE KhuyenMai SET TenKM='$this->TenKM',NgayBatDau='$this->NgayBatDau',NgayKetThuc='$this->NgayKetThuc' ,GiamGia=$this->GiamGia ,MaSP=$this->MaSP   WHERE  MaKM=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_shopee_mail($conn)
    {
        try {
            $sql = "SELECT * FROM KhuyenMai ORDER BY GiamGia DESC LIMIT 6";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_flashsale_mail($conn)
    {
        try {
            $sql = "SELECT * FROM KhuyenMai ORDER BY GiamGia DESC LIMIT 8";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    // // public function update_sp($conn, $masp)
    // // {
    // //     try {
    // //         $sql = "UPDATE DanhGia SET TenKM='$this->TenKM' WHERE  MaSP=$masp";
    // //         $result = mysqli_query($conn, $sql);
    // //         return $result;
    // //     } catch (Exception $e) {
    // //         return false;
    // //     }
    // // }
    // // public function update_noupload($conn, $id)
    // // {
    // //     try {
    // //         $sql = "UPDATE DanhGia SET TenKM='$this->TenKM' WHERE  MaKM=$id";
    // //         $result = mysqli_query($conn, $sql);
    // //         return $result;
    // //     } catch (Exception $e) {
    // //         return false;
    // //     }
    // // }
}
