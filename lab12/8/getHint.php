<?php
// Array with names
$a[] = "Iphone11";
$a[] = "IphoneXS Max";
$a[] = "IphoneXS";
$a[] = "Macbook Pro";
$a[] = "Xiaomi Note 9";
$a[] = "Lamp";
$a[] = "Glasses";
$a[] = "Shirt";
$a[] = "Shorts";
$a[] = "Trousers";
$a[] = "Shoes";
$a[] = "Wallet";
$a[] = "Bottle";
$a[] = "Flycam";
$a[] = "Calendar";
$a[] = "Boxes";
$a[] = "Pencil";
$a[] = "Lego";
$a[] = "Medicine";
$a[] = "Papers";
$a[] = "Marker";
$a[] = "Laptop";
$a[] = "Bike";
$a[] = "Car";
$a[] = "Flowers";
$a[] = "Pepsi";
$a[] = "Cola";
$a[] = "Toothbrush";
$a[] = "Table";
$a[] = "Vegetables";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    foreach ($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;