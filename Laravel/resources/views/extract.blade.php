<?php
session_start();
$dc="";
$dcLen=0;
$ci="";
$mno="";
$snStr="";
$mnoLen=0;
$vkLen=0;

if(isset($_GET['extractbt'])){
	$broj=$_GET['phoneNo'];

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
	$phoneNumStr=str_replace(" ","",$phNumStr);
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
}
?>


<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
   <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Extract msisdn</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <h2>Extract MSISDN</h2> 	
		<form action="" method="get">
    		Enter phone number: <input type="text" name="phoneNo" id="phoneNo">
        	<input type="submit"  name="extractbt" value="Extract" > </br>    	
       </form>
    </body>
</html>

<?php 
	echo "CC:".$dc."</br>";
	echo "MNO:".$mno."</br>";
	echo "SN: ".$snStr."</br>";
	echo "CI:".$ci."</br>";
?>