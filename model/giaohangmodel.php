<?php
class GiaoHangModel
{
    private $MaGH;
    private $TenDVGH;
    private $PhiGiao;
    private $TrangThai;
    private $ThucHienQuyTrinh;
    public function __construct($MaGH,$TenDVGH,$PhiGiao,$TrangThai,$ThucHienQuyTrinh){
        $this->MaGH=$MaGH;
        $this->TenDVGH=$TenDVGH;
        $this->PhiGiao=$PhiGiao;
        $this->TrangThai=$TrangThai;
        $this->ThucHienQuyTrinh=$ThucHienQuyTrinh;
    }
    public function search_MaGH_pagegiohang($conn)
    {
        try {
            $sql = "SELECT * FROM GiaoHang LIMIT 1";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}