<?php
class HoaDonBanModel
{
    private $MaHDB;
    private $MaAD;
    private $Date;
    private $SoLuong;
    private $TongTien;
    private $MaThue;
    private $TrangThai;
    private $MaKH;
    private $MaGH;
    private $EmailDat;
    private $DiaChiDat;
    private $SDTDat;
    public function __construct($MaHDB, $MaAD, $Date, $SoLuong, $TongTien, $MaThue, $TrangThai, $MaKH, $MaGH, $EmailDat, $DiaChiDat, $SDTDat)
    {
        $this->MaHDB = $MaHDB;
        $this->MaAD = $MaAD;
        $this->Date = $Date;
        $this->SoLuong = $SoLuong;
        $this->TongTien = $TongTien;
        $this->MaThue = $MaThue;
        $this->TrangThai = $TrangThai;
        $this->MaKH = $MaKH;
        $this->MaGH = $MaGH;
        $this->EmailDat = $EmailDat;
        $this->DiaChiDat = $DiaChiDat;
        $this->SDTDat = $SDTDat;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO HoaDonBan VALUES (null,$this->MaAD,'$this->Date',$this->SoLuong,$this->TongTien,$this->MaThue,$this->TrangThai,$this->MaKH,$this->MaGH,'$this->EmailDat','$this->DiaChiDat','$this->SDTDat')";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_MaHDB_pagegiohang($conn)
    {
        try {
            $sql = "SELECT MAX(MaHDB) as MaHDB FROM HoaDonBan ";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

    public function tongdonhang($conn)
    {
        try {
            $sql = "SELECT COUNT(*) FROM HoaDonBan";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_hdb_marris_line($conn, $ngaybatdau, $ngayketthuc)
    {
        try {
            if ($ngaybatdau == "" || $ngayketthuc == "") {
                $sql = "SELECT MaHDB,MaAD, DATE(Date) DateOnly , SUM(SoLuong) as SoLuong ,SUM(TongTien) as TongTien FROM HoaDonBan GROUP BY DateOnly ASC";
            } else {
                $sql = "SELECT MaHDB,MaAD, DATE(Date) DateOnly , SUM(SoLuong) as SoLuong ,SUM(TongTien) as TongTien FROM HoaDonBan WHERE Date BETWEEN '$ngaybatdau' and '$ngayketthuc'   GROUP BY DateOnly ASC";
            }

            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)==0){
                $sqlnew = "SELECT MaHDB,MaAD, DATE(Date) DateOnly , SUM(SoLuong) as SoLuong ,SUM(TongTien) as TongTien FROM HoaDonBan GROUP BY DateOnly ASC";
                $result== mysqli_query($conn, $sqlnew);
            }
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_hdb_marris_bar($conn)
    {
        try {
            $sql = "SELECT MaHDB,MaAD, MONTH(Date) month,YEAR(Date) year , SUM(SoLuong) as SoLuong ,SUM(TongTien)  as TongTien ,Date(Date) dateonly FROM HoaDonBan GROUP BY  year,month ASC";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_hdb_marris_area($conn)
    {
        try {
            $sql = "SELECT MaHDB,MaAD, SUM(SoLuong) as SoLuong ,SUM(TongTien)  as TongTien ,Date(Date) dateonly FROM HoaDonBan GROUP BY  dateonly ASC";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    
    public function baocaoexcel($conn)
    {
        try {
            $sql = "SELECT h.MaHDB,s.MaSP, Date(h.Date) date,s.TenSP,c.SoLuong,c.DonGia, c.SoLuong*c.DonGia as ThanhTien FROM HoaDonBan h, ChiTietHoaDonBan c,sanpham s WHERE h.MaHDB=c.MaHDB and c.MaSP=s.MaSP  Order BY  date ASC";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
