<?php
require_once './conectaDB.php';

$sql = 'SELECT * FROM prato WHERE codigo = :cod';

try {
    $stmt = $pdo->prepare($sql);

    $dados = array(
        ':cod' => $_GET['cod']
    );

    $resultado = $stmt->execute($dados);

    if ($resultado == true) {
        // Atribuir o resultado da consulta SQL em uma variável do PHP
        $altera = $stmt->fetchAll();
        // print_r($altera);
    }
} catch (PDOException $e) {
    echo 'Falha ao obter dados. Tente novamente mais tarde.';
    die($e->getMessage());
}

//Montar SQL para inserção no BD;
try {


// Definindo dados para o sql

    $tp = $altera[0]['codigo_tipo'];
    $tipo = "select nome from tipo where codigo=$tp";
    $stmt1 = $pdo->prepare($tipo);
    $resultado1 = $stmt1->execute();
    $ctipo = $stmt1->fetch();

    $cf = $altera[0]['codigo_chefe'];
    $chefe = "select nome from chefe where codigo=$cf";
    $stmt2 = $pdo->prepare($chefe);
    $resultado2 = $stmt2->execute();
    $cchefe = $stmt2->fetch();

    $cz = $altera[0]['codigo_cozinha'];
    $cozinha = "select nome from cozinha where codigo=$cz";
    $stmt3 = $pdo->prepare($cozinha);
    $resultado3 = $stmt3->execute();
    $ccozinha = $stmt3->fetch();

    $crdate = date("Y-m-d");
} catch (Exception $ex) {
    echo '<br>Falha ao visualizar prato';
    die($ex->getMessage());
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Visualizar Prato</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: Itim;
            }

            input,
            button {
                border: #000 2px solid;
                border-radius: 10px;
            }

            button {
                background-color: rgb(143, 82, 54);
            }

            button:active {
                background-color: rgb(120, 82, 54);
            }

            body {
                width: 100vw;
                height: 100vh;
            }

            .container {
                width: 100%;
                height: 100%;
                background-color: #DCD9D4;
                background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.50) 0%, rgba(0, 0, 0, 0.50) 100%), radial-gradient(at 50% 0%, rgba(255, 255, 255, 0.10) 0%, rgba(0, 0, 0, 0.50) 50%);
                background-blend-mode: soft-light, screen;
            }

            header {
                width: 99%;
                height: 5%;
                padding: 0.5%;
                background-color: rgb(158, 118, 118);
                text-align: center;
                display: flex;
                align-items: center;
                justify-content: space-between;
                font-size: 200%;
            }

            header span:nth-child(2) {
                margin-right: 43.5%;
            }

            h1 {
                position: absolute;
                top: 10%;
                left: 38%;
            }

            .container-visualizar {
                margin: 8% auto;
                width: 80%;
                height: 55%;
                background-color: #DCD9D4;
                background-color: rgb(158, 118, 118);
                box-shadow: 5px 2px 59px -8px rgba(0, 0, 0, 0.54);
                border-radius: 12px;
                display: flex;
            }

            img {
                width: 50%;
                height: 100%;
                border-top-left-radius: 20px;
                border-end-start-radius: 20px;
            }

            .CadastrarPrato div {
                width: 40%;
                height: 20%;
                float: left;
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                text-align: center;
                margin-bottom: 6%;
            }

            .tabela {
                padding: 2%;
                display: grid;
            }

            .btns button{
                padding: 5%;
            }
            
            .btns button:last-child {
                position: absolute;
                left: 10%;
                bottom: 10%;
                padding: 1% 2%;
            }
        </style>
        <script>
            function excluirPrato(codigoPrato) {
                if (confirm(`Deseja realmente excluir o prato ${codigoPrato} ?`)) {
                    window.location.href = `excluirPrato.php?cod=${codigoPrato}`;
                }
            }
            function visualizar(codigoPrato) {
                window.location.href = `index.php`;
            }
        </script>
    </head>
    <body>
        <div class="container">
            <header>
                <span><i class="fa-solid fa-utensils"></i></span>
                <span>Trabalho Web 2</span>
            </header>

            <div class="container-visualizar">
                <h1>Restaurante WEB 2</h1>
                <img src="<?php echo $altera[0]['img'] ?>" alt="">

                <div class="tabela">

                    <div>
                        <span><strong>Prato: </strong></span>
                        <span><?php echo $altera[0]['nome'] ?></span>
                    </div>

                    <div>
                        <span><strong>Tipo: </strong></span>
                        <span><?php echo $ctipo[0] ?></span>
                    </div>
                    <div>
                        <span><strong>Chefe: </strong></span>
                        <span><?php echo $cchefe[0] ?></span>
                    </div>
                    <div>
                        <span><strong>Cozinha: </strong></span>
                        <span><?php echo $ccozinha[0] ?></span>
                    </div>
                    <div>
                        <span><strong>Custo: </strong></span>
                        <span><?php echo $altera[0]['custo'] ?></span>
                    </div>
                    <div>
                        <span><strong>Preço: </strong></span>
                        <span><?php echo $altera[0]['preco'] ?></span>
                    </div>
                    <div>
                        <span><strong>Data de criação: </strong></span>
                        <span><?php echo $crdate ?></span>
                    </div>
                    <div class="btns">
                        <button onclick="excluirPrato(<?php echo $altera[0]['codigo']; ?>);" name="inserirPrt">Deseja realmente EXCLUIR</button>
                        <button onclick="visualizar()" name="inserirPrt">Voltar</button>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

