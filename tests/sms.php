<?php
	// Account details
	$apiKey = urlencode('NmI0NjMxNDU3NTQxNjY2NjZiNTk2NzMzNmI0MzUzNDU=');
	
	// Message details
	$numbers = array('919569505582');
	$sender = urlencode('TXTLCL');
	$message = rawurlencode('Hello Kundan your otp for registration is 3456');
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>