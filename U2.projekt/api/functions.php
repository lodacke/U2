<?php 

function sendJSON($data, $status_code = 200){
    header("Content-type: application/json");
    http_response_code($status_code);
    $json = json_encode($data);
    echo $json;
    exit();
}

?>




