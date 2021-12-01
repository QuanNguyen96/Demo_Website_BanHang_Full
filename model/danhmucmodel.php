<?php
class DanhMucModel
{
    private $madm;
    private $tendm;
    private $hadm;
    public function __construct($madm, $tendm, $hadm)
    {
        $this->madm = $madm;
        $this->tendm = $tendm;
        $this->hadm = $hadm;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO DanhMuc VALUES (null,'$this->tendm','$this->hadm')";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show($conn)
    {
        try {
            $sql = "SELECT * FROM DanhMuc";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function delete($conn, $id)
    {
        try {
            $sql = "DELETE FROM DanhMuc WHERE MaDM=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_1dm($conn, $id)
    {
        try {
            $sql = "SELECT * FROM DanhMuc WHERE MaDM=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update($conn, $id)
    {
        try {
            $sql = "UPDATE DanhMuc SET TenDM='$this->tendm',HADM='$this->hadm' WHERE  MaDM=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update_noupload($conn, $id)
    {
        try {
            $sql = "UPDATE DanhMuc SET TenDM='$this->tendm' WHERE  MaDM=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
