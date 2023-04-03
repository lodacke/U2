<?php 
require_once "functions.php";

ini_set("display_errors", 1);

$file_name = "users.json";

$user_json = file_get_contents($file_name);
$users = json_decode($user_json, true);


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $requestInput = file_get_contents("php://input");
    $requestDATA = json_decode($requestInput, true);
  
    $username = $requestDATA["username"];
    $password = $requestDATA["password"];



    for($i = 0; $i < count($users); $i++){
        $user = $users[$i];
        if($user["username"] == $username && $user["password"] == $password){

            $points =  $user["points"];
            
            $registered_user = [ 
                "username" => $username,
                "password" => $password,
                "points" => $points,
            ]; 
            sendJSON($registered_user);
        }
}  sendJSON([
    "message" => "wrong username or password"], 404);
}

?> 