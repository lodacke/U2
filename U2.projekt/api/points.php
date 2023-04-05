<?php 
ini_set("display_errors", 1);

require_once "functions.php";

$file_name = "users.json";

$json = file_get_contents($file_name);
$users = json_decode($json, true);

$requestdata = file_get_contents("php://input");
$logedinUser = json_decode($requestdata, true);

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $logedinUser["username"];
    $password = $logedinUser["password"];
    $points = $logedinUser["points"];

    foreach($users as $user){  
        
        var_dump($user);
        var_dump($username);


        //Kan behöva vara forloop?

        if ($user["username"] == $username) {
            
            $user["points"] = $user["points"] + $logedinUser["points"];
            
            $encodedData = json_encode($users, JSON_PRETTY_PRINT);
            file_put_contents($file_name, $encodedData);

            sendJSON(["points" => $user["points"]]);
        } else {
            sendJSON([
                "error" => "Cant find user with named username."
            ], 404);
        }
    }
} else {
$error = ["error" => "Cant load points"];
sendJSON($file_name);
}

if($_SERVER["REQUEST_METHOD"] == "GET"){

    $sorted_users = [];
    $i = 0;
    while($i < count($users)){
        $user = $users[$i];

       // if($user["points"] < $user["points"])

        $user = [
            "username" => $user["username"],
            "points" => $user["points"],
        ]; 
       
     array_push($sorted_users, $user); 
        $i++;    
    };

    arsort($sorted_users);


   // $top_five = array_slice($sorted_users, 5, 0);


     //sortera arrayen med users och plocka ut de 5 med högsta värden i points. 

   sendJSON($sorted_users);

}

?>