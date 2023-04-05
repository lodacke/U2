<?php 
ini_set("display_errors", 1);

require_once("functions.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file_name = "users.json";
    $users = [];

    if (!file_exists($file_name)) {
        file_put_contents($file_name, $users);

    } else {
      $users_json = file_get_contents($file_name);
      $users = json_decode($users_json, true);
    }

    $requestjson = file_get_contents("php://input");
    $requestdata = json_decode($requestjson, true);

    $username = $requestdata["username"];
    $password = $requestdata["password"];

    for($i = 0; $i < count($users); $i++) {

    $user = $users[$i];
    
        if ($user["username"] == $username) {
            sendJSON(["message" => "Conflict (the username is already taken)"], 409);
        }
    }

      if ($username == "" or $password == "") {
              sendJSON(["message" => "Please enter username and password"], 400);
              exit();

      } else {
        $new_users = [
          "username" => $username,
          "password" => $password,
          "points" => 0,
        ];
        array_push($users, $new_users);

      }

      $encodedData = json_encode($users, JSON_PRETTY_PRINT);
      file_put_contents($file_name, $encodedData);

      sendJSON([
        "username" => $username,
        "message" => "The user $username was added successfully"
      ]);

    }

?>