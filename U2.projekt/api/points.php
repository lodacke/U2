<?php 

require_once "functions.php";

$points_file = "users.json";
$points_content = ["points" => 0];
$method = $_SERVER["REQUEST_METHOD"];

if(file_exists($points_file)){
    $json = file_get_contents($points_file);
    $data = json_decode($json, true);

} else { 
    $json = json_encode($points_content);
    $data = file_put_contents($points_file, $json);  
};

if($method == "POST"){
    if(isset($_POST["points"])){
        $points_dom = $_POST["points"];
        $points_file += $points_dom;
    } 
    file_put_contents($points_file, $points_content);
    sendJSON($points_file);
} else {
    $error = ["error" => "Cant load points"];
    sendJSON($points_file);
}

?>