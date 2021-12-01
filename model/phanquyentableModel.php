<?php
class PhanQuyenTableModel
{
    private $MaPQT;
    private $MaTable;
    private $TenTable;
    private $MaAD;
    private $TrangThai;
    public function __construct($MaPQT, $MaTable, $TenTable, $MaAD, $TrangThai)
    {
        $this->MaPQT = $MaPQT;
        $this->MaTable = $MaTable;
        $this->TenTable = $TenTable;
        $this->MaAD = $MaAD;
        $this->TrangThai = $TrangThai;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO PhanQuyenTable VALUES (null,$this->MaTable,'$this->TenTable',$this->MaAD,$this->TrangThai)";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_1dm($conn,$maad)
    {
        try {
            $sql = "SELECT * FROM PhanQuyenTable WHERE MaAD=$maad";
            $result =mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update_phanquyen($conn,$maad)
    {
        try {
            $sql = "UPDATE PhanQuyenTable SET TrangThai=$this->TrangThai WHERE MaAD=$maad and MaTable=$this->MaTable";
            $result =mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_phan_quyen($conn,$MaAD,$MaTable)
    {
        try {
            $sql = "SELECT * FROM PhanQuyenTable WHERE MaAD=$MaAD and MaTable=$MaTable ";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_phan_quyen_full_maad($conn,$MaAD)
    {
        try {
            $sql = "SELECT * FROM PhanQuyenTable WHERE MaAD=$MaAD";
            $result = mysqli_query($conn, $sql);
            return $result;
            // echo $sql;
        } catch (Exception $e) {
            return false;
        }
    }
}
