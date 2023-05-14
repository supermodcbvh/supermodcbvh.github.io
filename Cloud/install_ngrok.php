<?php
// Update and upgrade packages
system("apt update && apt upgrade");

// Download ngrok
system("wget https://bin.equinox.io/c/4VmDzA7iaHb/ngrok-stable-linux-arm.zip");

// Unzip ngrok
system("unzip ngrok-stable-linux-arm.zip");

// Ask for Ngrok Auth Token
$valid_token = false;
while (!$valid_token) {
    $token = readline("Nhập Token Auth Ngrok: ");

    // Validate Ngrok Auth Token
    $output = shell_exec("./ngrok authtoken $token");
    if (strpos($output, "ERROR") !== false) {
        echo "Token sai vui lòng nhập lại.\n";
    } else {
        $valid_token = true;
    }
}

// Ask for TCP Port
$port = readline("Nhập port để mở server NRO: ");

// Start Ngrok
system("./ngrok tcp $port");
?>
