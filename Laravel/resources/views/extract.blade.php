<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Extract msisdn</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script type="text/javascript">
        
        function clickEx(element)
        {
        	var phoneNum = document.getElementById("phoneNo").value;
        	//var phoneNumStr= phoneNum.replace(" ","");
        	var phoneNumStr=phoneNum.split(" ").join("");
        	var ccStr = phoneNumStr.substring(0, 4);
        	document.getElementById("lblcc").innerText = ccStr;

       	
        	//var testt = "<?php echo $name; ?>";
        	//var somevariable = "{{ $name }}";
        	//alert("Clicked on " + testt);
        	//foreach countrycode order by length sporedi so prvite tri cifri, pa so dve, pa so edna
        	//vrati country code i country identifier
        	//slednite dve cifri sporedi gi so mno->code
        	//ostanatite se sn     
		}

        </script>
    </head>
    <body>
        <h1>Extract</h1> 
      	
      	<!--
	      	@foreach ($country as $c)
	      	{{ $c->CountryName }}
			@endforeach
-->
<!--        @foreach ($mno as $m)-->
<!--			{{ $m->MnoCode }} </br>-->
<!--		@endforeach-->
		
		<form action="extractClick.php" method="get">
    		Enter phone number: <input type="text" name="phoneNo" id="phoneNo">
        	<input type="button"  name="extractbutton" value="Extract" onClick="clickEx(this);"> </br>
        	</br>
        	CC: <label id="lblcc" name="lblcc"></label> </br>
        	MNO: <label id="countryCode" name="lblmno"></label> </br>
        	SN: <label id="lblsn" name="lblsn"></label> </br>
        	CI: <label id="lblci" name="lblci"></label>
        	
       </form>
    </body>
</html>

