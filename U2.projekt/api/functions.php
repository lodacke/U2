<?php 


function sendJSON($data, $status_code = 200){
    header("Content-type: application/json");
    http_response_code($status_code);
    $json = json_encode($data);
    echo $json;
    exit();
}




//ini_set("display_errors", 1);
//
//require_once "functions.php";
//
//$users = [];
//$file_name = "users.json";
//
//
//if($_SERVER["REQUEST_METHOD"] == "POST"){ 
//
//
//   if(file_exists($file_name)){
//       $json = file_get_contents($file_name);
//       $data = json_decode($json, true);
//
//   } else {
//       $data = file_put_contents($file_name, $users);  
//   };
//
//   $requestJSON = file_get_contents("php://input");
//   $requestDATA = json_decode($requestJSON, true);
//
//   $username = $requestDATA["username"];
//   $password = $requestDATA["password"];
//
//   foreach($users as $user){
//       if($user["username"] == $username){
//           $error = ["error" => "Username is already taken, please try a different name"];
//           sendJSON($error, 409);
//           exit();
//       }
//   }
//
//   if($password == "" or $username == ""){
//       $error = ["error" => "Wrong username or password"];
//       sendJSON($error, 400);
//       exit();
//   }
//
//   $addNewUser = [
//       "username" => $username,
//       "password" => $password,
//       "points" => 0,
//   ];
//
//   $users[] = $addNewUser;
//
//   $json = json_encode($users, JSON_PRETTY_PRINT);
//   file_put_contents($file_name, $json);
//   sendJSON($addNewUser);
//
//} 
//
?>




