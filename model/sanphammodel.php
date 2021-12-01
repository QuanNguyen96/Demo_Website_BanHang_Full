<?php
class SanPhamModel
{
    private $MaSP;
    private $TenSP;
    private $SoLuong;
    private $GiaBan;
    private $GiaNhap;
    private $TrangThaiShow;
    private $MaLSP;
    private $MaNCC;
    public function __construct($MaSP, $TenSP, $SoLuong, $GiaBan, $GiaNhap, $TrangThaiShow, $MaLSP, $MaNCC)
    {
        $this->MaSP = $MaSP;
        $this->TenSP = $TenSP;
        $this->SoLuong = $SoLuong;
        $this->GiaBan = $GiaBan;
        $this->GiaNhap = $GiaNhap;
        $this->TrangThaiShow = $TrangThaiShow;
        $this->MaLSP = $MaLSP;
        $this->MaNCC = $MaNCC;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO sanpham VALUES (null,'$this->TenSP',$this->SoLuong,$this->GiaBan,$this->GiaNhap,$this->TrangThaiShow,$this->MaLSP,$this->MaNCC)";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show($conn)
    {
        try {
            $sql = "SELECT s.MaSP,s.TenSP,s.SoLuong,s.GiaBan,s.GiaNhap,s.TrangThaiShow,s.MaLSP,s.MaNCC,l.TenLSP,n.TenNCC,h.HinhAnh  FROM sanpham s,LoaiSanPham l, NhaCungCap n,HinhAnhSanPham h WHERE s.MaLSP=l.MaLSP and s.MaNCC=n.MaNCC and h.MaSP=s.MaSP GROUP BY s.MaSP";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_index_kh($conn)
    {
        try {
            $sql = "SELECT * FROM sanpham WHERE TrangThaiShow=1";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_index_kh_phantrang($conn, $ptubatdau, $sophantuhienthi)
    {
        try {
            $sql = "SELECT * FROM sanpham WHERE TrangThaiShow=1 LIMIT $ptubatdau,$sophantuhienthi";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_1sp_index_kh($conn, $masp)
    {
        try {
            $sql = "SELECT * FROM sanpham WHERE MaSP=$masp";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_1($conn, $masp)
    {
        try {
            $sql = "SELECT s.MaSP,s.TenSP,s.SoLuong,s.GiaBan,s.GiaNhap,s.TrangThaiShow,s.MaLSP,s.MaNCC,l.TenLSP,n.TenNCC,h.HinhAnh  FROM sanpham s,LoaiSanPham l, NhaCungCap n,HinhAnhSanPham h WHERE s.MaLSP=l.MaLSP and s.MaNCC=n.MaNCC and h.MaSP=s.MaSP and s.MaSP=$masp GROUP BY s.MaSP";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function delete($conn, $id)
    {
        try {
            $sql = "DELETE FROM sanpham WHERE MaSP=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update($conn, $id)
    {
        try {
            $sql = "UPDATE sanpham SET TenSP='$this->TenSP',SoLuong=$this->SoLuong,GiaBan=$this->GiaBan,GiaNhap=$this->GiaNhap,TrangThaiShow=$this->TrangThaiShow,MaLSP=$this->MaLSP,MaNCC=$this->MaNCC WHERE  MaSP=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update_trangthaihienthi($conn, $id)
    {
        try {
            $sql = "UPDATE sanpham SET TrangThaiShow=$this->TrangThaiShow WHERE  MaSP=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function max_masp($conn)
    {
        try {
            $sql = "SELECT MaSP  FROM sanpham where MaSP=(select max(MaSP) from sanpham)";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_sp_baiviet($conn)
    {
        try {
            $sql = "SELECT * FROM sanpham";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_sp_baiviet_search($conn, $search)
    {
        try {
            $sql = "SELECT * FROM sanpham where $search";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show_sp_hinhanh_search($conn)
    {
        try {
            $sql = "SELECT * FROM sanpham ";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_lsp_dm_theo_masp($conn, $masp)
    {
        try {
            $sql = "SELECT l.MaDM,d.TenDM,l.MaLSP,l.TenLSP FROM sanpham s, DanhMuc d, LoaiSanPham l WHERE s.MaLSP=l.MaLSP and l.MaDM=d.MaDM and s.MaSP=$masp LIMIT 1";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_indexkh($conn, $text_search)
    {
        try {
            $sql = "SELECT s.MaSP,s.TenSP,s.SoLuong,s.GiaBan,s.GiaNhap,s.TrangThaiShow,s.MaLSP,s.MaNCC,l.TenLSP,n.TenNCC,h.HinhAnh  FROM sanpham s,LoaiSanPham l, NhaCungCap n,HinhAnhSanPham h WHERE s.MaLSP=l.MaLSP and s.MaNCC=n.MaNCC and h.MaSP=s.MaSP and (s.TenSP LIKE N'%$text_search%' or l.TenLSP LIKE N'%$text_search%'  or n.TenNCC LIKE N'%$text_search%' or s.GiaBan <='$text_search' ) GROUP BY s.MaSP LIMIT 5";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_page_searchkh($conn, $text_search, $ptubatdau, $sophantuhienthi)
    {
        try {
            $sql = "SELECT s.MaSP,s.TenSP,s.SoLuong,s.GiaBan,s.GiaNhap,s.TrangThaiShow,s.MaLSP,s.MaNCC,l.TenLSP,n.TenNCC,h.HinhAnh  FROM sanpham s,LoaiSanPham l, NhaCungCap n,HinhAnhSanPham h WHERE s.MaLSP=l.MaLSP and s.MaNCC=n.MaNCC and h.MaSP=s.MaSP and (s.TenSP LIKE N'%$text_search%' or l.TenLSP LIKE N'%$text_search%'  or n.TenNCC LIKE N'%$text_search%' or s.GiaBan <='$text_search' ) GROUP BY s.MaSP LIMIT $ptubatdau,$sophantuhienthi";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function phantrang_page_searchkh($conn, $text_search)
    {
        try {
            $sql = "SELECT s.MaSP,s.TenSP,s.SoLuong,s.GiaBan,s.GiaNhap,s.TrangThaiShow,s.MaLSP,s.MaNCC,l.TenLSP,n.TenNCC,h.HinhAnh  FROM sanpham s,LoaiSanPham l, NhaCungCap n,HinhAnhSanPham h WHERE s.MaLSP=l.MaLSP and s.MaNCC=n.MaNCC and h.MaSP=s.MaSP and (s.TenSP LIKE N'%$text_search%' or l.TenLSP LIKE N'%$text_search%'  or n.TenNCC LIKE N'%$text_search%' or s.GiaBan <='$text_search' ) GROUP BY s.MaSP";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_page_searchkh_loc($conn, $text_search, $ptubatdau, $sophantuhienthi, $sql)
    {
        try {
            $sql = "SELECT s.MaSP,s.TenSP,s.SoLuong,s.GiaBan,s.GiaNhap,s.TrangThaiShow,s.MaLSP,s.MaNCC,l.TenLSP,n.TenNCC,h.HinhAnh  FROM DanhMuc d, sanpham s,LoaiSanPham l, NhaCungCap n,HinhAnhSanPham h WHERE s.MaLSP=l.MaLSP and s.MaNCC=n.MaNCC and h.MaSP=s.MaSP and l.MaDM=d.MaDM and (s.TenSP LIKE N'%$text_search%' or l.TenLSP LIKE N'%$text_search%'  or n.TenNCC LIKE N'%$text_search%' or s.GiaBan <='$text_search' ) $sql GROUP BY s.MaSP LIMIT $ptubatdau,$sophantuhienthi";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function phantrang_page_searchkh_loc($conn, $text_search, $sql)
    {
        try {
            $sql = "SELECT s.MaSP,s.TenSP,s.SoLuong,s.GiaBan,s.GiaNhap,s.TrangThaiShow,s.MaLSP,s.MaNCC,l.TenLSP,n.TenNCC,h.HinhAnh  FROM DanhMuc d, sanpham s,LoaiSanPham l, NhaCungCap n,HinhAnhSanPham h WHERE s.MaLSP=l.MaLSP and s.MaNCC=n.MaNCC and h.MaSP=s.MaSP and l.MaDM=d.MaDM and (s.TenSP LIKE N'%$text_search%' or l.TenLSP LIKE N'%$text_search%'  or n.TenNCC LIKE N'%$text_search%' or s.GiaBan <='$text_search' ) $sql GROUP BY s.MaSP ";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_1sp_addcart($conn, $masp)
    {
        try {
            $sql = "SELECT s.MaSP,s.TenSP,s.SoLuong,s.GiaBan,s.GiaNhap,s.TrangThaiShow,h.HinhAnh  FROM sanpham s , HinhAnhSanPham h WHERE h.MaSP=s.MaSP AND s.MaSP=$masp GROUP BY s.MaSP";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
