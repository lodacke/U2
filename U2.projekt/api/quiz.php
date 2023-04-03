<?php

require_once "functions.php";

    $images = '../images/';

$dogs_images = scandir($images);

$databas = "dogs.json";

$dogs = [];

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

$data = json_encode($dogs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
file_put_contents($databas, $data);

$alternatives = [];
// ALTERNATIV 2 

//$i = 0;
//
//while(count($alternatives) < 4){
//
//     $name = $dogs[array_rand($dogs, 1)]["name"];
//     if(! in_array($name, $alternatives)){
//        array_push($alternatives, $name);   
//     };
//
//     $i++;  
//};
//
//var_dump($alternatives);
//
//$random = array_rand($alternatives, 1);
//
//$correct_answer = $alternatives[$random];
//
//var_dump($correct_answer);
//
//$alternatives_1 = [];
//
//$j = 0;
//while(count($alternatives_1) < 4){
//    if(in_array($correct_answer,$alternatives)){
//        $option = [ 
//            "name" => $correct_answer,
//            "correct" => true,
//        ];
//        array_push($option, $alternatives_1);
//        $j++;
//    } else {
//        $option = [
//            "name" => $alternatives(array_rand($alternatives, 1))["name"],
//            "correct" => false,       
//        ];
//
//        if(! in_array($alternatives_1, $option)){
//            array_push($option, $alternatives_1);
//        }
//        $j++;
//    }
//
//}
//
//var_dump($alternatives_1);
//

//ALTERNATIV 1

//        $correct_answer = [
//            "name" =>  $dogs[array_rand($dogs, 1)]["name"],
//            "correct" => true,
//    ];
//    array_push($alternatives, $correct_answer);
//
//   get_alternatives($dogs[array_rand($dogs, 1)]["name"]);   
//
//    function get_alternatives($answer){
//        global $alternatives;
//        $correct_comparisson = $alternatives[0]["name"];
//
//        if(!$answer === $correct_comparisson){
//            while(count($alternatives) < 4){
//                $option = [
//                    "correct" => false,
//                    "name" => $dogs[array_rand($dogs, 1)]["name"], 
//                ]; 
//
//                if(! in_array($option,$alternatives)){
//                    array_push($alternatives, $option);
//                } else { 
//                    global $dogs;
//                get_alternatives($dogs[array_rand($dogs, 1)]["name"]);
//
//                }    
//            };
//        } else {
//            global $dogs;
//         get_alternatives($dogs[array_rand($dogs, 1)]["name"]);
//        }
//    }
//
    var_dump($alternatives);
       // $data = json_encode($alternatives_1, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
       //         file_put_contents($databas, $data);

    
  //  $correct_imgtag = str_replace(" ", "_" ,$alternatives[$answer]["name"]) . ".jpg";
//    $correct_answer = $alternatives[$answer]["name"];


   // $img = json_encode($images.$correct_imgtag);

   $json = json_encode($alternatives);
   file_put_contents($databas, $json);

   // $alt = [
   //     "image" => $img,    
   //     "alternatives" => $alternatives_1,
   // ];    
//
   // var_dump($alt);
//
   // sendJSON($alt);


       // foreach($dog as $value){
        
           // var_dump($value);
            
            
                 //   if(array_search($correct_answer, $values)){         
                //     if($values["name"] == $correct_answer){
                //         $option = [ 
                //             "correct" => true,
                //             "name" => $correct_answer,
                //         ];
                //         array_push($alternatives, $option);
                //   } 
                //         for($i = 0; $i < 3; $i++){
                //         $option = [ 
                //             "correct" => false,
                //             "name" => array_rand($dogs),
                //         ];
                //         array_push($alternatives, $option);
                //         var_dump($alternatives); 
                //     } 
        
               // };
    
       // }
 
?>


