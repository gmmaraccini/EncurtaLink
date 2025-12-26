<?php
// Importa as funções (certifique-se que o functions.php está na mesma pasta)
require 'functions.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'] ?? '';
    // Chama a função de criar
    $result = createShortUrl($pdo, $url);

    if (isset($result['error'])) {
        $message = "<div style='color:red; background: #fee; padding: 10px; border: 1px solid red; margin-bottom: 10px;'>Erro: {$result['error']}</div>";
    } else {
        // Monta as duas versões da URL
        $urlPadrao = BASE_URL . 'r.php?c=' . $result['code'];
        $urlAmigavel = BASE_URL . $result['code'];

        $message = "
        <div style='background: #eaffea; padding: 15px; border: 1px solid #0f0; text-align: left; margin-bottom: 20px;'>
            <h3 style='margin-top:0;'>Sucesso! URL Encurtada:</h3>
            
            <p><strong>1. Com .htaccess (Amigável):</strong><br>
            <a href='$urlAmigavel' target='_blank'>$urlAmigavel</a></p>
            
            <p><strong>2. Sem .htaccess (Padrão):</strong><br>
            <a href='$urlPadrao' target='_blank'>$urlPadrao</a></p>
        </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encurtador de URL</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 50px auto; text-align: center; background-color: #f4f4f4; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input[type="text"] { width: 70%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 20px; cursor: pointer; background-color: #007bff; color: white; border: none; border-radius: 4px; font-weight: bold; }
        button:hover { background-color: #0056b3; }
        .result { margin-top: 20px; font-size: 1em; word-break: break-all; }
    </style>
</head>
<body>
<div class="container">
    <h1>✂️ EncurtaLink</h1>

    <div class="result">
        <?= $message ?>
    </div>

    <form method="POST">
        <input type="text" name="url" placeholder="Cole sua URL longa aqui (https://...)" required>
        <button type="submit">Encurtar</button>
    </form>
</div>
</body>
</html>