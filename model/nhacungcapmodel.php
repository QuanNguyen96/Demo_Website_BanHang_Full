<?php
class NhaCungCapModel
{
    private $mancc;
    private $tenncc;
    private $diachi;
    private $email;
    private $sdt;
    public function __construct($tenncc, $diachi, $email, $sdt)
    {
        $this->tenncc = $tenncc;
        $this->diachi = $diachi;
        $this->email = $email;
        $this->sdt = $sdt;
    }
    public function add_1($conn)
    {
        try {
            $sql = "INSERT INTO NhaCungCap VALUES (null,'$this->tenncc','$this->diachi','$this->email',$this->sdt)";
            mysqli_query($conn, $sql);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
    public function show($conn)
    {
        try {
            $sql = "SELECT * FROM NhaCungCap";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function delete($conn, $id)
    {
        try {
            $sql = "DELETE FROM NhaCungCap WHERE MaNCC=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function search_1dm($conn, $id)
    {
        try {
            $sql = "SELECT * FROM NhaCungCap WHERE MaNCC=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
    public function update($conn, $id)
    {
        try {
            $sql = "UPDATE NhaCungCap SET tenncc='$this->tenncc',Address='$this->diachi',Email='$this->email',SDT=$this->sdt WHERE  MaNCC=$id";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}
