<?php

$heroku buildpacks:set https://github.com/heroku/heroku-buildpack-php
$method = $_SERVER['REQUEST_METHOD'];

if($method == "POST"){
	$requestrBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	
	$text = $json->queryResult->parameters->text;
	
	switch ($text) {
		case 'hi':
		$speech = "Hi, Nice to meet you";
		break;
		
		case 'bye'
		$speech = "bye, good night";
		break;
		
		case 'anything'
		$speech = "yes, you can type anything here";
		break;
		
		default:
		$speech = "sorry, I didn't get that. Please ask me something else."
		break;
	}
	$response = new \stdClass();
	$response->speech = "";
	$response->displayText = "";
	$response->source = "webhook";
	echo json_encode($response);
	
}
else 
{
	echo "Method not allowed";
}

?>
