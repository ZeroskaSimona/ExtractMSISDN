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
        <h1>Extract MSISDN</h1>
        <?php echo $users; ?>
        <div>
        Enter phone number: <input type="text" name="phoneNo">
        <input type="button" value="Extract">
        </div>
    </body>
</html>
