<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Extract msisdn</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script type="text/javascript">
        </script>
    </head>
    <body>
        <h1>Extract</h1> 
      
      	@foreach ($country as $c)
			{{ $c->CountryName }} </br>
		@endforeach
                
        @foreach ($mno as $m)
			{{ $m->MnoCode }} </br>
		@endforeach
		
		<form action="extractClick.php" method="get">
    		Enter phone number: <input type="text" name="phoneNo">
        	<input type="button"  name="extractbutton" value="Extract">
       </form>
    </body>
</html>
