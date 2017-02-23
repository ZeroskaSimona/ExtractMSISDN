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

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000000;
                font-family: 'Times New Roman', serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links {
                color: #000000;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                /*text-transform: uppercase;*/
            }

            .m-b-md {
                margin-top: -250px;
                margin-left: -380px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   Extract MSISDN
                </div>
		</br>
		</br>
		</br>
             </div>
            
            <div class="links m-b-md">
	            <h2></h2> 	
				<form action="" method="get">
		    		Enter phone number: <input type="text" name="phoneNo" id="phoneNo">
		        	<input type="submit"  name="extractbt" value="Extract" > </br>
		        	<div name="ccR"></div>  
		       </form>
		       <?php 
					echo "CC:".$dc."</br>";
					echo "MNO:".$mno."</br>";
					echo "SN: ".$snStr."</br>";
					echo "CI:".$ci."</br>";
				?>
        	</div>
        </div>
        
        
    </body>
</html>


