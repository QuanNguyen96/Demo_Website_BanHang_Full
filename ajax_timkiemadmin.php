<?php

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "show_search_index_kh": {
                show_search_index_kh();
                break;
            }
    }
}
function show_search_index_kh()
{
    include('./model/dbconfig.php');
    include('./model/timkiemmodel.php');
    $tk = new TimKiemModel(0, 0, 0);
    $result = $tk->show_indexkh($conn);
    $datarp = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data_item = [
                "ChuoiTK" => $row['ChuoiTK']
            ];
            array_push($datarp, $data_item);
        }
    }

    echo json_encode($datarp);
}
