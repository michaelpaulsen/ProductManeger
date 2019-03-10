<html>
<head></head>
<body>
<?php
include_Once("./inc/sort.php");
$fileName = "data.json"; 
//var_dump($_POST);
$i = 0; 
$test = "";
echo empty($test) ."<br>"	;
$Products = [];
$Products["Products"] = [];
$done = false;
var_dump($Products);
echo "<br>";
while(!$done){
	$output = false;
	$product = [];
	if(
			(
				isset($_POST["Category"    . $i]) &&
				isset($_POST["SubCategory" . $i]) &&
				isset($_POST["ProductName" . $i]) &&
				isset($_POST["Tags"        . $i]) &&
				isset($_POST["USAvailable" . $i]) &&
				isset($_POST["USPrice"     . $i]) &&
				isset($_POST["CAAvailable" . $i]) &&
				isset($_POST["CAPrice"     . $i]) &&
				isset($_POST["Weight"      . $i])
			)
	) {
		$product["Category"]    = $_POST["Category"    . $i];
		$product["SubCategory"] = $_POST["SubCategory" . $i];
		$product["ProductName"] = $_POST["ProductName" . $i]; 
		$product["Tags"]        = $_POST["Tags"        . $i];
		$product["USAvailable"] = $_POST["USAvailable" . $i];
		$product["USPrice"]     = $_POST["USPrice"     . $i];
		$product["CAAvailable"] = $_POST["CAAvailable" . $i];
		$product["CAPrice"]     = $_POST["CAPrice"     . $i];
		$product["Weight"]      = $_POST["Weight"      . $i];
		$i++;
		foreach($product as $k => $v){
			if($v != ""){
				$output = true;	
				break;
			}
		}
		if($output){ 
			$Products["Products"][] = $product;
		}
	}else{
		$done = true;
		break;
	}
}
$Products["Products"] = doSort($Products["Products"]);
var_dump($Products);
$str = json_encode($Products);
//now send evrything to ur data.json file using folowing code
if(!isset($file)){
	$file = fopen($fileName,'w');
	fwrite($file, $str);
	fclose($file);
}

?>
<body>


<html>