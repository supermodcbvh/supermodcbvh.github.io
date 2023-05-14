<?php
echo "Enter your Ngrok Auth Token: ";
$authToken = trim(fgets(STDIN));

echo "Enter the TCP Port you want to open (maximum 65535): ";
$tcpPort = trim(fgets(STDIN));

shell_exec("wget https://bin.equinox.io/c/bNyj1mQVY4c/ngrok-v3.3.0-linux-amd64.tar.gz -O ngrok.tar.gz && tar -xvf ngrok.tar.gz && rm ngrok.tar.gz");

shell_exec("chmod +x ./ngrok");
$file_type = shell_exec("file ./ngrok");
$is_executable = strpos($file_type, 'executable') !== false;
if (!$is_executable) {
    die("Error: Ngrok is not executable\n");
}

$system_arch = shell_exec("uname -m");
$is_64bit = strpos($file_type, '64-bit') !== false;
if ($is_64bit && strpos($system_arch, 'x86_64') === false) {
    die("Error: Ngrok is 64-bit but your system is not\n");
}

$ngrokCommand = "./ngrok authtoken $authToken && ./ngrok tcp --region=jp $tcpPort";
passthru($ngrokCommand);
?>
