<?php
class CTHoaDonBanModel
{
    private $MaHDB;
    private $MaSP;
    private $SoLuong;
    private $DonGia;
    private $KM;
    public function __construct($MaHDB,$MaSP,$SoLuong,$DonGia,$KM){
        $this->MaHDB=$MaHDB;
        $this->MaSP=$MaSP;
        $this->SoLuong=$SoLuong;
        $this->DonGia=$DonGia;
        $this->KM=$KM;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO KhachHang VALUES ($this->MaHDB,$this->MaSP,$this->SoLuong,$this->DonGia,'$this->KM')";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}