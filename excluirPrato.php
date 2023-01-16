<?php

require_once './conectaDB.php';

 

$sql = 'DELETE FROM prato WHERE codigo = :cod';

try {
    $stmt = $pdo->prepare($sql);

    $dados = array(
        ':cod' => $_GET['cod']
    );

    $resultado = $stmt->execute($dados);


    if ($resultado == true) {
     header('Location: index.php?msg=Prato excluido com sucesso!');
    }
} catch (PDOException $e) {
    echo 'Falha ao obter dados. Tente novamente mais tarde.';
    die($e->getMessage());
}






