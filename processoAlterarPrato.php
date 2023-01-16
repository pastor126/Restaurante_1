<?php
require_once './conectaDB.php';


try {
    // Montar a SQL para alteração
    $sql = "UPDATE prato SET nome = :nome, img = :img, preco = :pre, custo = :cust, data_criacao = :dtcri, codigo_tipo = :ct, codigo_chefe = :ccf, codigo_cozinha = :ccz
    WHERE codigo = :cod";

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
    
    // Definindo dados para o SQL
    $dados = array(
        ':nome' => $_POST['nome'],
        ':pre' => $_POST['preco'],
        ':cust' => $_POST['custo'],
        ':dtcri' => $_POST['dataC'],
        ':ct' => $ctipo[0],
        ':ccf' => $cchefe[0],
        ':ccz' => $ccozinha[0],
        ':img' => $_POST['img'],
        ':cod' => $_POST['codigo']
            
    );
//     print_r($dados);
    // Preparar a SQL com o PDO
    $stmt = $pdo->prepare($sql);

    // Executar a SQL (com o PHP)
    $resultado = $stmt->execute($dados); // : bool
    $ateracao = $stmt->fetch();
    //print_r($ateracao);

    if ($resultado) {

        header('Location: index.php?msg=Prato alterado com sucesso!');
    }
} catch (PDOException $e) {
    echo 'Falha ao alterar prato';
    die($e->getMessage());
}
?>


