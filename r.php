<?php
require 'config.php';
require 'functions.php';

// 1. Validação: Verifica se o parâmetro 'c' existe E não está vazio
if (empty($_GET['c'])) {
    // Se não tem ID, manda de volta pra home
    header("Location: index.php");
    exit;
}

$code = $_GET['c'];

// 2. Busca a URL original sanitizando a entrada (embora o prepare já ajude)
// Importante: Limitar a busca a caracteres alfanuméricos para evitar lixo
$code = preg_replace("/[^a-zA-Z0-9]/", "", $code);

$data = getOriginalUrl($pdo, $code);

if ($data) {
    // SUCESSO: Redireciona
    header("Location: " . $data['long_url'], true, 301); // Mudei para 301 (Permanente) se preferir cache
    exit;
} else {
    // ERRO: Código não encontrado no banco
    // Você pode criar uma página 404 personalizada aqui
    http_response_code(404);
    echo "<div style='font-family:sans-serif; text-align:center; margin-top:50px;'>";
    echo "<h1>Ops! Link não encontrado.</h1>";
    echo "<p>Este código de encurtamento (<strong>$code</strong>) não existe ou expirou.</p>";
    echo "<a href='index.php'>Voltar para a Home</a>";
    echo "</div>";
}
?>