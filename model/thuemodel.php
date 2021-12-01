<?php
class ThueModel
{
    private $MaT;
    private $TenT;
    private $TienT;
    public function __construct($MaT,$TenT,$TienT){
        $this->MaT=$MaT;
        $this->TenT=$TenT;
        $this->TienT=$TienT;
    }
    public function search_MaT_pagegiohang($conn)
    {
        try {
            $sql = "SELECT * FROM Thue LIMIT 1";
            $result = mysqli_query($conn, $sql);
            return $result;
        } catch (Exception $e) {
            return false;
        }
    }
}