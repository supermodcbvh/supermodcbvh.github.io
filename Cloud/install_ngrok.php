<?php
$token = readline("Nhập Ngrok Auth Token: ");

$port = readline("Nhập Port muốn mở: ");

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
