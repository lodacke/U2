<?php 
ini_set("display_errors", 1);

require_once "functions.php";

$file_name = "users.json";

if(file_exists($file_name)){
    $json = file_get_contents($file_name);
    $users = json_decode($json, true);
} else {
    sendJSON(["message " => "Couldn't load JSON-file"], 400);
};

$requestdata = file_get_contents("php://input");
$logedinUser = json_decode($requestdata, true);


if($_SERVER["REQUEST_METHOD"] == "GET"){

    function sorted($user_low, $user_high) {

        return ($user_low["points"] > $user_high["points"]) ? - 1 : 1;
        };

        usort($users, "sorted");

    $i = 0;
    $top_five = [];

        while($i < count($users)){

            $user = [
                "username" => $users[$i]["username"],
                "points" => $users[$i]["points"],
            ]; 
        
         array_push($top_five, $user); 
            $i++;    
        };

    array_slice($top_five, 0, 5);
    sendJSON($top_five);

    }  else if($_SERVER["REQUEST_METHOD"] == "POST"){

    for($i = 0; $i < count($users); $i++){  

        $username = $logedinUser["username"];
        $points = $logedinUser["points"];
    
        if ($users[$i]["username"] === $username) {
            
            $users[$i]["points"] = $users[$i]["points"] + $points;
            
            $encodedData = json_encode($users, JSON_PRETTY_PRINT);
            file_put_contents($file_name, $encodedData);

            sendJSON(["points" => $users[$i]["points"]]);
          } 
    }
} else {
    sendJSON(["message" => "Wrong HTTP method"], 405);
}


?>