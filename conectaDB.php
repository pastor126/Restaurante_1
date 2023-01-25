<?php

try {
    $pdo = new PDO('pgsql:host=containers-us-west-72.railway.app;dbname=railway; port=6239', 'postgres', 'g1d9I4yfWFjgxw4WY805', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
} catch (PDOException $e) {
    echo '<br>Falha na conexão';
    die($e->getMessage());
}


// postgresql://
// postgres:
// g1d9I4yfWFjgxw4WY805@
// containers-us-west-72.railway.app:6239/railway/


?>
