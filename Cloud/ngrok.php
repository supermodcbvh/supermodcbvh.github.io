<?php
// Prompt user to enter Ngrok auth token
echo "Enter your Ngrok Auth Token: ";
$authToken = trim(fgets(STDIN));

// Prompt user to enter the TCP port to open
echo "Enter the TCP Port you want to open (maximum 65535): ";
$tcpPort = trim(fgets(STDIN));

shell_exec("wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-amd64.zip -O ngrok.zip");
shell_exec("unzip -qq ngrok.zip");
shell_exec("rm ngrok.zip");

// Set execute permissions on the Ngrok binary
shell_exec("chmod +x ./ngrok");

// Connect to Ngrok with auth token and open TCP port
$ngrokCommand = "./ngrok authtoken $authToken && ./ngrok tcp $tcpPort";
$output = shell_exec($ngrokCommand);
?>
