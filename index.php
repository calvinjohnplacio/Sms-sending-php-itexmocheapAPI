<?php 
function itexmo($number,$message,$apicode,$passwd){
		$url = 'https://www.itexmo.com/php_api/api.php';
		$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
		$param = array(
			'http' => array(
				'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
				'method'  => 'POST',
				'content' => http_build_query($itexmo),
			),
		);
		$context  = stream_context_create($param);
		return file_get_contents($url, false, $context);
} 
if(isset($_POST['submit'])){
$num=$_POST['number'];
$msg=$_POST['message'];
$uname="APiname";
$apipass="Apipass";
$result = itexmo($num,$msg,$uname,$apipass);
if ($result == ""){
echo "iTexMo: No response from server!!!
Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
Please CONTACT US for help. ";	
}else if ($result == 0){
echo '<script> alert("Message Sent!") </script>';
}
else{	
echo "Error Num ". $result . " was encountered!";
}
}
?>

<form method="POST" action="index.php">
	
<input type="text" name="number">
<br>
<input type="text" name="message">
<br>

<input type="submit" name="submit">

</form>