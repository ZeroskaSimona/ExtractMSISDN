<?php
$dc="";
$dcLen=0;
$ci="";
$mno="";
$snStr="";
$mnoLen=0;
$vkLen=0;
$broj=$msnum;
$con=mysqli_connect("localhost","root","","grabit");
	if (mysqli_connect_errno())
	{
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$res  = mysqli_query($con,"select * from country");
	$rows = array();
	while($row = mysqli_fetch_assoc($res)){
	  array_push($rows, $row);
	}
	
	$resMno  = mysqli_query($con,"select * from mobilenetworkoperator");
	$rowsMno = array();
	while($rowMno = mysqli_fetch_assoc($resMno)){
	  array_push($rowsMno, $rowMno);
	}
	mysqli_close($con);

	$phNumStr=str_replace("+","",$broj);
	$phNumStrs=str_replace(" ","",$phNumStr);
	$povBroj = substr($phNumStrs,0,2);
	if ($povBroj == '00'){
		$phoneNumStr=substr($phNumStrs,2);
		//echo "test za 00";
	} else {
		$phoneNumStr=$phNumStrs;
		//echo "test za ne 00";
	}
	
    //echo "broj: ".$phoneNumStr."</br>";    
	foreach($rows as $row){
	  $ccStr=substr($phoneNumStr,0,3);
	  $ccStrs=substr($phoneNumStr,0,2);
	  
	  if ($ccStr == $row["DialingCode"]){
	  	$dc=$row["DialingCode"];
	  	$ci=$row["IsoCode"];
	  } elseif($ccStrs == $row["DialingCode"]){
		  	$dc=$row["DialingCode"];
		  	$ci=$row["IsoCode"];
	  } else {
	  	//$dc="Invalid Dialing code!";
	  	//$ci="Invalid Iso code!";
	  }
	}
	
	$dcLen=strlen($dc);
	$mnoStr=substr($phoneNumStr,$dcLen,2);
	foreach($rowsMno as $rowMno){
		  $mnoStr=substr($phoneNumStr,$dcLen,2);
		 if ($mnoStr == $rowMno["MnoCode"]){
		  	$mno=$rowMno["MnoName"];
		  }
	}
	$mnoLen=strlen($mnoStr);
	$vkLen=$mnoLen+$dcLen;
	$snStr=substr($phoneNumStr,$vkLen);
	
	$array = array(
    'cc' => $dc,
    'mno' => $mno,
	'sn' => $snStr,
	'ci'=> $ci
);

echo json_encode($array, JSON_PRETTY_PRINT);
?>
