<?php
$token = readline("Enter your Ngrok Auth Token: ");

$port = readline("Enter the TCP Port you want to open: ");

// Update and upgrade packages
system("apt update && apt upgrade");

// Download ngrok
system("wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-arm.zip");

// Unzip ngrok
system("unzip ngrok-stable-linux-arm.zip");

// Start ngrok
system("./ngrok authtoken $token");
system("./ngrok tcp $port");
?>
