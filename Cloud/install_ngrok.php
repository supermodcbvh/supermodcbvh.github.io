<?php
$token = readline("Enter your Ngrok Auth Token: ");

$port = readline("Enter the TCP Port you want to open: ");

// Download ngrok
system("wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-arm.zip");

// Unzip ngrok
system("unzip ngrok-stable-linux-arm.zip");

// Start ngrok
system("./ngrok authtoken $token");
system("./ngrok tcp $port");
?>
