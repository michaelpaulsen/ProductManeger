<?php
/*sort.php*/
$a["Category"] = "Test";
$a["SubCategory"] = "cleaner";
$a["Weight"] = 1;
$a["ProductName"] = "the super mario show";


$b["Category"] = "TestA";
$b["SubCategory"] = "dirt";
$b["Weight"] = 1000;
$b["ProductName"] = "the super sanic show";
$arr[] = $b;
$arr[] = $a;
//var_dump($arr);
function cmpWeight($a,$b)
{
	if( $a["Weight"] > $b["Weight"]){ 
		return 1;
	}else if( $a["Weight"] < $b["Weight"]){
		return -1;
	}else{
		return 0; 
	}
}
function compareCatigory($a, $b)
{
    return strcmp($a["Category"], $b["Category"]);
}
function compareSubCatigory($a, $b)
{
    return strcmp($a["SubCategory"], $b["SubCategory"]);
}
function compareName($a, $b)
{
    return strcmp($a["ProductName"], $b["ProductName"]);
}
function doSort($arr){
	usort($arr,"compareCatigory");
	usort($arr,"compareSubCatigory");
	usort($arr,"compareName");
	Usort($arr,"cmpWeight");
	return $arr;
};
$temp = doSort($arr);
//var_dump($temp);
?>