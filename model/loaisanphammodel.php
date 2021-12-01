<?php
class LoaiSanPhamModel
{
    private $malsp;
    private $tenlsp;
    private $halsp;
    private $madm;
    public function __construct($malsp, $tenlsp, $halsp, $madm)
    {
        $this->malsp = $malsp;
        $this->tenlsp = $tenlsp;
        $this->halsp = $halsp;
        $this->madm = $madm;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO LoaiSanPham VALUES (null,'$this->tenlsp','$this->halsp',$this->madm)";
            $result=mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show($conn)
    {
        try {
            $sql = "SELECT l.MaLSP,l.TenLSP,l.HALSP,d.TenDM FROM  DanhMuc d, LoaiSanPham l WHERE l.MaDM=d.MaDM";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function delete($conn, $id)
    {
        try {
            $sql = "DELETE FROM LoaiSanPham WHERE MaLSP=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_1dm($conn, $id)
    {
        try {
            $sql = "SELECT l.MaLSP,l.TenLSP,l.HALSP,d.MaDM,d.TenDM FROM  DanhMuc d, LoaiSanPham l WHERE l.MaDM=d.MaDM and l.MaLSP=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update($conn, $id)
    {
        try {
            $sql = "UPDATE LoaiSanPham SET TenLSP='$this->tenlsp',HALSP='$this->halsp',MaDM=$this->madm WHERE  MaLSP=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update_noupload($conn, $id)
    {
        try {
            $sql = "UPDATE LoaiSanPham SET TenLSP='$this->tenlsp',MaDM=$this->madm WHERE  MaLSP=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
