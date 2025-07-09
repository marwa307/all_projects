<?php
echo "hello";
//def variable
$name="ooo";
//array
$student=["a","b","c"];
//def constant
define("site","google,com");
echo site;   //use cont without $
//arithmetic operators
$coffee_quantity=3;
$coffe_price=3.5;
$coffee_total=$coffee_quantity*$coffe_price;
echo "coffee:" .$coffee_total ."\n";    //string concatenation by ."dot"
//if, else if
$grade=90;
if($grade>=90){
    echo"A+ grade";
}else if($grade>=80) {
    echo"B+ grade";
}else if($grade>=70) {
    echo"C+ grade";
}else if($grade>=60) {
    echo"D+ grade";
} else {
    echo"faild";
}
//switch case
$menu_option=2;
if($menu_option==1){
    echo"1.arabic";
}if($menu_option==2){
    echo"2.english";
}
//use switch
switch($menu_option){
    case 1:
         echo"1.arabic";
         break;
    case 2:
         echo"2.english";
         break;
         
}
//logical operators
// == ,=== ,!= ,!== ,< ,> , <= ,>= 
// || ,&&
$x=3;
$y="3";
if($x==$y){
    echo"is equal";
}
//===  strict equal compare the datatype
$x=3;
$y="3";
if($x===$y){
    echo"is  not equal";
}
$x=3;
$y=4;
if($x!=$y){
    echo"is  not equal";
}
//!==  strict not equal datatype
$x=3;
$y="3";
if($x!==$y){
    echo"is  not equal";
}
//&& and 
$grade=90;
$attendance="yes";
if($grade>=90 && $attendance="yes"){
    echo"top graduate";
}
//|| or
$age=18;
$membership="yes";
if($age>=18 || $membership==="yes"){
    echo"granted";
}
// loops
$counter=1;
while($counter<=100){
    echo $counter ."\n";
    $counter=$counter+1;
}
// Do while
do {
    echo $counter ."\n";
    $counter=$counter+1;
}
while($counter<=100);
// for loop
for($counter=1;$counter<=100;$counter++){
    echo $counter ."\n";
}
//  def functions
function sumTWOnumbers($x,$y){
    return $x+$y;
}
//usag fun

$res=sumTWOnumbers(10,5);
$anotherres=$res*2;
function sumTWOnumbers1($x,$y){
    if($x<0 || $y<0){
        return -1;
    }
    $theresult=$x+$y;
    return $theresult;
}
//usage
$result=sumTWOnumbers1(-1,5);
if($result ==-1){
    echo "error";
}else $result ."\n";
?>





