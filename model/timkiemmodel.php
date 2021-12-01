<?php
class TimKiemModel
{
    private $MaTK;
    private $ChuoiTK;
    private $MaKH;
    public function __construct($MaTK, $ChuoiTK, $MaKH)
    {
        $this->MaTK = $MaTK;
        $this->ChuoiTK = $ChuoiTK;
        $this->MaKH = $MaKH;
    }
    public function show_indexkh($conn)
    {
        try {
            $sql = "SELECT * FROM TimKiem LIMIT 15";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }

}
