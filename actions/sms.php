<?php 	

// Textlocal account details
	$username = 'rorobig@live.com';
	$hash = 'd837496a70feeb23bca99c2333a5e54cf5f7a31e';
	$message =$_POST['msg'];
	$name= $_POST['name']; 
	$number= $_POST	['number'];

	// Message details
	$numbers = array($number);
	$sender = urlencode($name);
	$message = rawurlencode($message);
 
        $numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('username' => $username, 'hash' => $hash, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('http://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;

	header( "refresh:3;url=../index.php" );
 ?>