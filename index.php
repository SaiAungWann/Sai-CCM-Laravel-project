<?php
 
// Day 2
// Data Type 

// String
echo "Hello World";

// Number => Integer, Float
// Integer  
echo 123;

// Float
echo 10.2;      

// Boolean
echo true;      
echo false;      

// Array    => [nurmaric array and associative array]

// nurmaric array
$names = ["A", "B", "C"];
var_dump($names); // result : array(3) { [0]=> string(1) "A" [1]=> string(1) "B" [2]=> string(1) "C" }

// associative array
$person = [
    "name" => "nurmaric",
    "age" => 20]    
    ;
var_dump($person); // result : array(2) { ["name"]=> string(7) "nurmaric" ["age"]=> int(20) }

// object 
$car = new stdClass();
$car->name = "bmw";
$car->color = "black";
var_dump($car); // result : object(stdClass)#1 (2) { ["name"]=> string(3) "bmw" ["color"]=> string(5) "black" }
echo $car->name; // result : bmw

// null
$null = null;
var_dump($null); // result : null

// datastructure 
// mostly use in project / larvel or other framework
// => array of object

$car1 = new stdClass();
$car1->name = "bmw";
$car1->color = "black";

$car2 = new stdClass();
$car2->name = "toyota";
$car2->color = "white";


$cars = [
    $car1, $car2
];

echo($cars[0]->name); // result : bmw

// condition 
// gate 

// and / && => true + true = true
// or / || => false + false = false
// xor / !=  => false + true = true
// not / ! => true => false

// arithmetic 
// + - * / % **

// assignment 
// = += -= *= /= %= **=

// comparison 
// == === != !== > < >= <=

// increment / decrement
// ++ --

// concatenation
// . .= 
// to add string + string => "Sai" . "Aung" . "Wann" => result => "Sai Aung Wann"

// ternary operator
// condition ? true : false

// if
// if else
// if elseif else



?>