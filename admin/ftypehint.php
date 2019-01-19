<?php
$a[] = "Apple";
$a[] = "Akee";
$a[] = "Apricot";
$a[] = "Avocado";
$a[] = "Banana";
$a[] = "Bilberry";
$a[] = "Blackberry";
$a[] = "Blackcurrant";
$a[] = "Black sapote";
$a[] = "Black sapote";
$a[] = "Blueberry";
$a[] = "Boysenberry";
$a[] = "Buddha's hand (fingered citron)";
$a[] = "Crab apples";
$a[] = "Currant";
$a[] = "Cherry";
$a[] = "Cherimoya (Custard Apple)";
$a[] = "Chico fruit";
$a[] = "Cloudberry";
$a[] = "Coconut";
$a[] = "Cranberry";
$a[] = "Date";
$a[] = "Dragonfruit (or Pitaya)";
$a[] = "Durian";
$a[] = "Elderberry";
$a[] = "Grape";
$a[] = "Grapefruit";
$a[] = "Guava";
$a[] = "Honeyberry";
$a[] = "Japanese plum";
$a[] = "Jostaberry";
$a[] = "Kiwifruit";
$a[] = "Kumquat";
$a[] = "Longan";
$a[] = "Lychee";
$a[] = "Mango";
$a[] = "Marionberry";
$a[] = "Melon";
$a[] = "Cantaloupe";
$a[] = "Honeydew";
$a[] = "Watermelon";
$a[] = "Mulberry";
$a[] = "Orange";
$a[] = "Blood orange";
$a[] = "Clementine";
$a[] = "Mandarine";
$a[] = "Tangerine";
$a[] = "Papaya";
$a[] = "Passionfruit";
$a[] = "Peach";
$a[] = "Pear";
$a[] = "Persimmon";
$a[] = "Plantain";
$a[] = "Plum";
$a[] = "Prune (dried plum)";
$a[] = "Pineapple";
$a[] = "Pineberry";
$a[] = "Plumcot (or Pluot)";
$a[] = "Pomegranate";
$a[] = "Pomelo";
$a[] = "Raspberry";
$a[] = "Salmonberry";
$a[] = "Redcurrant";
$a[] = "Star apple";
$a[] = "Star fruit";
$a[] = "Strawberry";
$a[] = "Surinam cherry";
$a[] = "Tamarillo";
$a[] = "Tamarind";
$a[] = "White currant";
$a[] = "Yuzu";
$q= $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q= strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
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

?>