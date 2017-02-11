<?php
session_start();
$lista='';
$lista_arr=array();
if(isset($_GET['extractbt'])){
	$broj=$_GET['phoneNo'];
	if($_SESSION['number']==$broj){
		echo 'Go pogodivte brojot';
		session_unset();
	}else{
		echo 'Obidete se povtorno';
		if($_GET['lista']!='')
		$lista_arr=explode(',', $_GET['lista']);
		$lista_arr[]=$broj;
		sort($lista_arr);
		$lista=implode(',', $lista_arr);
	}
}
$rand=mt_rand(1, 10);
while(in_array($rand,$lista_arr)){
	$rand=mt_rand(1, 10);
}
$_SESSION['number']=33;
?>
<?php echo implode(', ', $lista_arr);?>
<form action="" method="get">
	Enter phone number: <input type="text" name="phoneNo" id="phoneNo">
	<input type="submit"  name="extractbt" value="Extract" > </br>
	<input type="hidden" name="lista" value="<?php echo implode(',', $lista_arr);?>"/>
    </br>
        	
    CC: <label id="lblcc" name="lblcc"></label> </br>
    MNO: <label id="countryCode" name="lblmno"></label> </br>
    SN: <label id="lblsn" name="lblsn"></label> </br>
    CI: <label id="lblci" name="lblci"></label>
        	
</form>