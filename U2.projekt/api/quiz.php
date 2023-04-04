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

$i = 0;

while(count($alternatives) < 4){

     $name = $dogs[array_rand($dogs, 1)]["name"];
     if(!in_array($name, $alternatives)){
        array_push($alternatives, $name);   
     };

     $i++;  
};

$correct_answer = $alternatives[array_rand($alternatives, 1)];

$alternatives_1 = [];

$j = 0;

while($j < 4){
    
    foreach($alternatives as $alt){

        if($alt == $correct_answer){
            
            $option = [ 
                "name" => $correct_answer,
                "correct" => true,
                  ];
            array_push($alternatives_1, $option);
            $j++;
        } else {
                     
            $option = [            
                "name" => $alt,
                "correct" => false,        
                 ];                
             array_push($alternatives_1, $option);
            $j++;   
        }
    }   
}

var_dump($alternatives_1);



//ALTERNATIV 1
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
//
//    var_dump($alternatives);
       // $data = json_encode($alternatives_1, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
       //         file_put_contents($databas, $data);

    

   foreach($dogs as $dog){
    if ( $correct_answer === $dog["name"]){
        $correct_imgtag = $dog["image"];
    }
   }

   var_dump($correct_imgtag);


    $alt = [
        "image" => $images . $correct_imgtag,    
        "alternatives" => $alternatives_1,
    ];    
//
   // var_dump($alt);
//
    $json = json_encode($alt, JSON_PRETTY_PRINT);
    file_put_contents($databas, $json);
    sendJSON($alt);


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


