<?php
session_start();
$lista='';
$lista_arr=array();
$countries=array();
$dc=0;
$dcLen=0;
$ci=0;
$mno=0;
$mnoLen=0;
$vkLen=0;

$countries = DB::select('select * from country');
foreach ($countries as $value) {
    /* echo $value; */
}
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
	
	//$numb=$_SESSION['number'];

    $phoneNumStr=str_replace(" ","",$broj);
  // echo "broj: ".$phoneNumStr."</br>";    
	foreach($rows as $row){
	  $ccStr=substr($phoneNumStr,0,3);
	 // echo "ccstr: ".$ccStr."</br>";
	 // echo "dcof: ".$row["DialingCode"]."</br>";
	  if ($ccStr == $row["DialingCode"]){
	  	//echo "ccstr: ".$ccStr;
	  	$dc=$row["DialingCode"];
	  	$ci=$row["IsoCode"];
	  	echo "CC:".$dc."</br>";
	  	
	  	//echo $row["CountryName"];
	  	}
	}
	
	$dcLen=strlen($dc);
	//echo "len ".$dcLen;
	$mnoStr=substr($phoneNumStr,$dcLen,2);
	//echo "mnostr: ".$mnoStr;
	foreach($rowsMno as $rowMno){
		//echo "mnocode: ".$rowMno["MnoCode"]."</br>";
		  $mnoStr=substr($phoneNumStr,$dcLen,2);
		 //echo "mnostr: ".$mnoStr;
		 if ($mnoStr == $rowMno["MnoCode"]){
		  	//echo "ccstr: ".$ccStr;
		  	$mno=$rowMno["MnoName"];
		  	echo "MNO:".$mno."</br>";
		  	//echo $row["CountryName"];
		  	}
	}
	$mnoLen=strlen($mnoStr);
	//echo "len ".$mnoLen;
	$vkLen=$mnoLen+$dcLen;
	$snStr=substr($phoneNumStr,$dcLen);
	echo "SN: ".$snStr."</br>";
	echo "CI:".$ci."</br>";
}
?>
<?php echo implode(', ', $lista_arr);?>

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
   <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Extract msisdn</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script type="text/javascript">
        
       //function clickEx(element)
        //{
        	//var phoneNum = document.getElementById("phoneNo").value;
        	//var phoneNumStr= phoneNum.replace(" ","");
        	//var phoneNumStr=phoneNum.split(" ").join("");
        	//var ccStr = phoneNumStr.substring(0, 4);
        	//document.getElementById("lblcc").innerText = ccStr;
        	//var somevariable = "{{ $name }}";
        	//alert("Clicked on " + testt);
        	//foreach countrycode order by length sporedi so prvite tri cifri, pa so dve, pa so edna
        	//vrati country code i country identifier
        	//slednite dve cifri sporedi gi so mno->code
        	//ostanatite se sn     
		//}

        </script>
    </head>
    <body>
        <h1>Extract</h1> 	
		<form action="" method="get">
    		Enter phone number: <input type="text" name="phoneNo" id="phoneNo">
        	<input type="submit"  name="extractbt" value="Extract" > </br>
               	
        	CC: <label id="lblcc" name="lblcc"></label> </br>
        	MNO: <label id="countryCode" name="lblmno"></label> </br>
        	SN: <label id="lblsn" name="lblsn"></label> </br>
        	CI: <label id="lblci" name="lblci"></label>        	
       </form>
    </body>
</html>