<?php
require_once './conectaDB.php';

try {
    $pr = $_POST['nome'];
    $prato = "select codigo from prato where nome ilike '%$pr%'";
    $stmt1 = $pdo->prepare($prato);
    $resultado1 = $stmt1->execute();
    $cprato = $stmt1->fetch();
    //print_r($cprato);

    header("Location: visualizar.php?cod=$cprato[0]");

} catch (PDOException $ex) {
    echo '<br>Falha ao obter pratos. Tente mais tarde.';
    die($e->getMessage());
}
?>