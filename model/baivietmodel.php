<?php
class BaiVietModel
{
    private $MaBV;
    private $NoiDung;
    private $MaSP;
    public function __construct($MaBV, $NoiDung, $MaSP)
    {
        $this->MaBV = $MaBV;
        $this->NoiDung = $NoiDung;
        $this->MaSP = $MaSP;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO BaiViet VALUES (null,'$this->NoiDung',$this->MaSP)";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show($conn)
    {
        try {
            $sql = "SELECT * FROM BaiViet";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_sp($conn)
    {
        try {
            $sql = "SELECT s.MaSP,s.TenSP,b.MaBV,b.MaBV,b.NoiDung  FROM BaiViet b, sanpham s WHERE s.MaSP=b.MaSP";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function delete($conn, $id)
    {
        try {
            $sql = "DELETE FROM BaiViet WHERE MaBV=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_sp($conn, $masp)
    {
        try {
            $sql = "SELECT s.MaSP,s.TenSP,b.MaBV,b.MaBV,b.NoiDung  FROM BaiViet b, sanpham s WHERE s.MaSP=b.MaSP and s.MaSP=$masp";
           $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_mabv($conn, $mabv)
    {
        try {
            $sql = "SELECT * FROM BaiViet WHERE MaBV=$mabv";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_masp($conn, $masp)
    {
        try {
            $sql = "SELECT * FROM BaiViet WHERE MaSP=$masp";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update($conn, $id)
    {
        try {
            $sql = "UPDATE BaiViet SET NoiDung='$this->NoiDung' WHERE  MaBV=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update_sp($conn, $masp)
    {
        try {
            $sql = "UPDATE BaiViet SET NoiDung='$this->NoiDung' WHERE  MaSP=$masp";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update_noupload($conn, $id)
    {
        try {
            $sql = "UPDATE BaiViet SET NoiDung='$this->NoiDung' WHERE  MaBV=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
