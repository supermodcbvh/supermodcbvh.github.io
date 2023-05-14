<?php
echo "Enter your Ngrok Auth Token: ";
$authToken = trim(fgets(STDIN));

echo "Enter the TCP Port you want to open (maximum 65535): ";
$tcpPort = trim(fgets(STDIN));

// Determine system architecture
$system_arch = shell_exec("uname -m");
if (strpos($system_arch, 'x86_64') !== false) {
    // 64-bit system
    $ngrok_download_url = 'https://bin.equinox.io/c/bNyj1mQVY4c/ngrok-stable-linux-386.zip';
} elseif (strpos($system_arch, 'arm') !== false) {
    // ARM-based system
    $ngrok_download_url = 'https://bin.equinox.io/c/bNyj1mQVY4c/ngrok-stable-linux-386.zip';
} else {
    // Unsupported system
    die("Error: Unsupported system architecture ($system_arch)\n");
}

// Download and extract Ngrok
shell_exec("wget $ngrok_download_url -O ngrok.zip && unzip -qq ngrok.zip && rm ngrok.zip");
shell_exec("chmod +x ./ngrok");

// Check if Ngrok is executable
$file_type = shell_exec("file ./ngrok");
$is_executable = strpos($file_type, 'executable') !== false;
if (!$is_executable) {
    die("Error: Ngrok is not executable\n");
}

// Connect to Ngrok with auth token and open TCP port
$ngrokCommand = "./ngrok authtoken $authToken && ./ngrok tcp --region=jp $tcpPort";
passthru($ngrokCommand);
?>
