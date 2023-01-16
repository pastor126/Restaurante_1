<?php

try {
    $pdo = new PDO('pgsql:host=localhost;dbname=Web2; port=5432', 'postgres', 'sodnamoc', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
} catch (PDOException $e) {
    echo '<br>Falha na conexão';
    die($e->getMessage());
}
?>
