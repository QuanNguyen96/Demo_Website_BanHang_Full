<?php
class DanhGiaModel
{
    private $MaDG;
    private $Sao;
    private $Thich;
    private $MaSP;
    private $MaKH;
    public function __construct($MaDG, $Sao, $Thich, $MaSP, $MaKH)
    {
        $this->MaDG = $MaDG;
        $this->Sao = $Sao;
        $this->Thich = $Thich;
        $this->MaSP = $MaSP;
        $this->MaKH = $MaKH;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO DanhGia VALUES (null,$this->Sao,$this->Thich,$this->MaSP,$this->MaKH)";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show($conn)
    {
        try {
            $sql = "SELECT * FROM DanhGia";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    // public function show_sp($conn)
    // {
    //     try {
    //         $sql = "SELECT s.MaSP,s.TenSP,b.MaDG,b.MaDG,b.Sao  FROM DanhGia b, sanpham s WHERE s.MaSP=b.MaDG";
    //         $result = mysqli_query($conn, $sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }
    public function delete($conn, $id)
    {
        try {
            $sql = "DELETE FROM DanhGia WHERE MaDG=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_masp_makh($conn, $masp, $makh)
    {
        try {
            $sql = "SELECT * FROM DanhGia WHERE MaSP=$masp and MaKH=$makh";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_masp_indexkh($conn, $masp)
    {
        try {
            $sql = "SELECT * FROM DanhGia WHERE MaSP=$masp";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    // public function search_MaDG($conn, $MaDG)
    // {
    //     try {
    //         $sql = "SELECT * FROM DanhGia WHERE MaDG=$MaDG";
    //         $result = mysqli_query($conn, $sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }
    public function update($conn, $id)
    {
        try {
            $sql = "UPDATE DanhGia SET Sao=$this->Sao,Thich=$this->Thich,MaSP=$this->MaSP ,MaKH=$this->MaKH  WHERE  MaDG=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    // public function update_sp($conn, $masp)
    // {
    //     try {
    //         $sql = "UPDATE DanhGia SET Sao='$this->Sao' WHERE  MaSP=$masp";
    //         $result = mysqli_query($conn, $sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }
    // public function update_noupload($conn, $id)
    // {
    //     try {
    //         $sql = "UPDATE DanhGia SET Sao='$this->Sao' WHERE  MaDG=$id";
    //         $result = mysqli_query($conn, $sql);
    //         return $result;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }
}
