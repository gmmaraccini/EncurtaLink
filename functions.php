<?php
require 'config.php';

// Gera uma string aleatória de X caracteres
function generateRandomString($length = 6) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        // random_int é criptograficamente seguro, melhor que rand()
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

function createShortUrl($pdo, $longUrl) {
    // Validação básica de URL
    if (!filter_var($longUrl, FILTER_VALIDATE_URL)) {
        return ['error' => 'URL inválida.'];
    }

    // Tenta gerar um código único (loop para evitar colisão, embora raro)
    $unique = false;
    $maxTries = 5;
    $tries = 0;

    while (!$unique && $tries < $maxTries) {
        $code = generateRandomString(6);

        // Verifica se já existe
        $stmt = $pdo->prepare("SELECT id FROM urls WHERE short_code = ?");
        $stmt->execute([$code]);

        if ($stmt->rowCount() == 0) {
            $unique = true;
        }
        $tries++;
    }

    if (!$unique) {
        return ['error' => 'Erro ao gerar código único. Tente novamente.'];
    }

    // Salva no banco
    $stmt = $pdo->prepare("INSERT INTO urls (long_url, short_code) VALUES (?, ?)");
    if ($stmt->execute([$longUrl, $code])) {
        return ['success' => true, 'code' => $code, 'url' => BASE_URL . 'r.php?c=' . $code];
    } else {
        return ['error' => 'Erro ao salvar no banco.'];
    }
}

function getOriginalUrl($pdo, $code) {
    $stmt = $pdo->prepare("SELECT long_url FROM urls WHERE short_code = ? LIMIT 1");
    $stmt->execute([$code]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>