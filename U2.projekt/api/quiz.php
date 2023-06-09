<?php

ini_set("display_errors", 1);

require_once "functions.php";

if($_SERVER["REQUEST_METHOD"] == "GET"){
   
    $images = '../images/';
    $dogs_images = scandir($images);
    $file_name = "dogs.json";

    $dogs = [];

         if (file_exists($file_name)) {
            $json = file_get_contents($file_name);
             $users = json_decode($json, true);
         } else {
             file_put_contents($file_name, $dogs);
         }

        foreach($dogs_images as $dog){
            $dog_name = str_replace("_", " ", $dog);
            $correct_dog_name = substr_replace($dog_name, "", -4);
            $index = [
                "name" =>  $correct_dog_name,
                "image" => $dog,
            ];
        array_push($dogs, $index);
    };

    array_splice($dogs, 0,2);

    $data = json_encode($dogs, JSON_PRETTY_PRINT);
    file_put_contents($file_name, $data);

    $first_alternatives = [];
    $i = 0;

    while(count($first_alternatives) < 4){

         $name = $dogs[array_rand($dogs, 1)]["name"];
         if(!in_array($name, $first_alternatives)){
            array_push($first_alternatives, $name);   
         };

         $i++;  
    };

    $correct_answer = $first_alternatives[array_rand($first_alternatives, 1)];

    $alternatives = [];
    $j = 0;

    while($j < 4){

        foreach($first_alternatives as $alt){

            if($alt == $correct_answer){

                $option = [ 
                    "name" => $correct_answer,
                    "correct" => true,
                      ];
                array_push($alternatives, $option);
                $j++;

            } else {

                $option = [            
                    "name" => $alt,
                    "correct" => false,        
                     ];                
                 array_push($alternatives, $option);
                $j++;   
            }
        }   
    }

    foreach($dogs as $dog){
     if ( $correct_answer === $dog["name"]){
        $correct_imgtag = $dog["image"];
        }
   }

        $alt = [
            "image" => $images . $correct_imgtag,    
            "alternatives" => $alternatives,
        ];    

        sendJSON($alt);

    } else {
        sendJSON(["message" => "Wrong HTTP method"], 405);
};



    



//ALTERNATIV 2
//
//        $correct_answer = [
//            "name" =>  $dogs[array_rand($dogs, 1)]["name"],
//            "correct" => true,
//    ];
//    array_push($alternatives, $correct_answer);
//
//   get_alternatives($dogs[array_rand($dogs, 1)]["name"]);   
//
//   $i = 0;
//
//    function get_alternatives($answer){
//        global $alternatives;
//        $correct_comparisson = $alternatives[0]["name"];
//        while(count($alternatives) < 4){
//        if(!$answer == $correct_comparisson){       
//                $option = [
//                    "correct" => false,
//                    "name" => $dogs[array_rand($dogs, 1)]["name"], 
//                ]; 
//
//                if(!in_array($option,$alternatives)){
//                    array_push($alternatives, $option);
//                    $i++;
//                } else { 
//                    global $dogs;
//                get_alternatives($dogs[array_rand($dogs, 1)]["name"]); };    
//            } else {
//                global $dogs;
//                $new_option = $dogs[array_rand($dogs, 1)]["name"];
//             get_alternatives($new_option);
//            };
//        }; 
//    };

?>


