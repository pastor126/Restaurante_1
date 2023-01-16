<?php

require_once './conectaDB.php';

//Montar SQL para inserção no BD;
try {
    $sql = 'INSERT INTO prato(nome, img,preco, custo, data_criacao, codigo_tipo, codigo_chefe, codigo_cozinha)
    VALUES(:nome, :img, :preco, :custo, :crdate,:tipo, :chefe, :cozinha)';

// Definindo dados para o sql

    $tp = $_POST['tipo'];
    $tipo = "select codigo from tipo where nome ilike '$tp'";
    $stmt1 = $pdo->prepare($tipo);
    $resultado1 = $stmt1->execute();
    $ctipo = $stmt1->fetch();

    $cf = $_POST['chefe'];
    $chefe = "select codigo from chefe where nome ilike '$cf'";
    $stmt2 = $pdo->prepare($chefe);
    $resultado2 = $stmt2->execute();
    $cchefe = $stmt2->fetch();

    $cz = $_POST['cozinha'];
    $cozinha = "select codigo from cozinha where nome ilike '$cz'";
    $stmt3 = $pdo->prepare($cozinha);
    $resultado3 = $stmt3->execute();
    $ccozinha = $stmt3->fetch();
    $crdate = date("Y-m-d");

    $dados = Array(
        ':nome' => $_POST['nome'], 
        ':img' => $_POST['img'],
        ':preco' => $_POST['preco'], 
        ':custo' => $_POST['custo'], 
        ':crdate' => $crdate,
        ':tipo' => $ctipo[0], 
        ':chefe' => $cchefe[0], 
        ':cozinha' => $ccozinha[0]
    );
    
    $inser = $pdo->prepare($sql); //prepara SQL com PDO

// Executar SQL com PHP    
    $resultado = $inser->execute($dados); // : retorna boolean
    if ($resultado) {
        header('Location: index.php?msg=Prato cadastrado com sucesso!');
    }
} catch (Exception $ex) {
    echo '<br>Falha ao cadastrar prato';
    die($ex->getMessage());
}
?>

