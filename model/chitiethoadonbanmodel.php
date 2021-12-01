<?php
class ChiTietHoaDonBanModel
{
    private $MaHDB;
    private $MaSP;
    private $SoLuong;
    private $DonGia;
    private $KhuyenMai;
    public function __construct($MaHDB, $MaSP, $SoLuong, $DonGia, $KhuyenMai)
    {
        $this->MaHDB = $MaHDB;
        $this->MaSP = $MaSP;
        $this->SoLuong = $SoLuong;
        $this->DonGia = $DonGia;
        $this->KhuyenMai = $KhuyenMai;
    }
    public function show_flashsale_indexkh($conn,$masp)
    {
        try {
            $sql = "SELECT * FROM ChiTietHoaDonBan WHERE MaSP=$masp";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO ChiTietHoaDonBan VALUES ($this->MaHDB,$this->MaSP,$this->SoLuong,$this->DonGia,'$this->KhuyenMai')";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function tongsoluongsanphamban($conn)
    {
        try {
            $sql = "SELECT SUM(SoLuong) as TongSoLuong FROM ChiTietHoaDonBan";
            $result=mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function tongsanphamban($conn)
    {
        try {
            $sql = "SELECT COUNT(MaSP)  FROM  ChiTietHoaDonBan GROUP BY MaSP";
            $result=mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}