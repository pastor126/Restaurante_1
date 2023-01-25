<?php
require_once './conectaDB.php';

//Selecionar todas  os pratos >select*
$sql = 'select * from prato order by codigo;';

//transformar a consulta em uma variável do php
try {
    $stmt = $pdo->prepare($sql);
    $resultado = $stmt->execute();
    if ($resultado == true) {
        //atribuir  o resultadop da consulta sql em uma variável php
        $pratos = $stmt->fetchAll();
     //print_r($pratos);
    }
} catch (PDOException $ex) {
    echo '<br>Falha ao obter pratos. Tente mais tarde.';
    die($ex->getMessage());
}

for ($i = 0; $i < count($pratos); $i++) {
    $tp = $pratos[$i]['codigo_tipo'];
    $tipo = "SELECT nome from tipo where codigo=$tp";
    $stmt1 = $pdo->prepare($tipo);
    $resultado1 = $stmt1->execute();
    $ctipo = $stmt1->fetch();
    $pratos[$i]['codigo_tipo'] = $ctipo[0];

    $cf = $pratos[$i]['codigo_chefe'];
    $chefe = "SELECT nome from chefe where codigo=$cf";
    $stmt2 = $pdo->prepare($chefe);
    $resultado2 = $stmt2->execute();
    $cchefe = $stmt2->fetch();
    $pratos[$i]['codigo_chefe'] = $cchefe[0];

    $cz = $pratos[$i]['codigo_cozinha'];
    $cozinha = "SELECT nome from cozinha where codigo=$cz";
    $stmt3 = $pdo->prepare($cozinha);
    $resultado3 = $stmt3->execute();
    $ccozinha = $stmt3->fetch();
    $pratos[$i]['codigo_cozinha'] = $ccozinha[0];
}
?>

<html lang="en">

    <head>
        <title>Restaurante</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/949dcd6b8d.js" crossorigin="anonymous"></script>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');

            * {
                margin: 0;
                padding: 0;
                font-family: Itim;
            }

            input {
                border-radius: 12px;
            }

            button {
                background-color: rgb(120, 60, 60);
            }

            button:active {
                background-color: rgb(120, 82, 54);
            }

            body {
                width: 100vw;
                height: 100vh;
                background-color: #DCD9D4;
                background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.50) 0%, rgba(0, 0, 0, 0.50) 100%), radial-gradient(at 50% 0%, rgba(255, 255, 255, 0.10) 0%, rgba(0, 0, 0, 0.50) 50%);
                background-blend-mode: soft-light, screen;
            }

            .container {
                width: 100%;
                height: 100%;
                background-image: linear-gradient(to top, #6a85b6 0%, #bac8e0 100%);
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

            header form {
                width: 20%;
            }

            header form input {
                height: 100%;
            }

            .icon-button{
                border-radius: 12px;
                padding: 2% 5%;
            }

            header span:nth-child(2) {
                margin-left: 16%;
            }

            h1 {
                position: absolute;
                top: 10%;
                left: 37.5%;
            }

            .BuscarPrato {
                width: 20%;
                padding: 0.7%;
            }

            .BuscarPrato input {
                border: #000 1px solid;
                height: 60%;
                padding: 5%;
            }

            .BuscarPrato button {
                width: 15%;
                height: 60%;
                border-radius: 12px;
            }

            #Cardapio {
                width: 70%;
                height: 60%;
                padding: 2%;
                border-radius: 12px;
                background-color: rgb(158, 118, 118);
                box-shadow: 5px 2px 59px -8px rgba(0, 0, 0, 0.54);
                margin: 0 auto;
                margin-top: 3%;
                overflow: auto;
            }

            .Prato {
                border-bottom: #000 2px dotted;
                padding-bottom: 0.5%;
                display: flex;
                justify-content: space-between;
            }

            .Prato div {
                width: 40%;
            }

            .Prato div span:nth-child(1) {
                padding: 0 1% 0 1%;
                border-right: #000 1px solid;
            }

            .Prato div span:nth-child(2) {
                padding-left: 2%;
            }

            .Info {
                margin: 1% 0 3% 0;
                padding-left: 2%;
                display: flex;
                justify-content: space-between;
            }

            .Info div {
                width: 40%;
            }

            .Info span:nth-child(1) {
                padding: 0 1% 0 3%;
                border-right: #000 1px solid;
            }

            .Info div span:nth-child(2) {
                padding-left: 2%;
            }

            #Cardapio button {
                border-radius: 12px;
                padding: 2%;
            }

            #Cardapio .btns {
                width: 22%;
            }
            .voltar {
                margin: 2% 0 0 47%;
                border-radius: 12px;
                padding: 0.5%;
            }
            .cadastrar{
                margin: 1% 0 0 1%;
                border-radius: 12px;
                padding: 0.5%;
            }
        </style>
        <script>
            function alterarPrato(codigoPrato) {
                a = confirm(`Prosseguir com alteração do prato ${codigoPrato} ?`);
                console.log(a);
                if (a === true) {
                    window.location.href = `alterarPrato.php?cod=${codigoPrato}`;
                }


            }
            function excluirPrato(codigoPrato) {
                window.location.href = `visualizaExcluir.php?cod=${codigoPrato}`;
            }

            function cadastrarPrato() {
                window.location.href = `cadastrarPrato.php`;
            }

            function visualizar(codigoPrato) {
                console.log(codigoPrato);
                window.location.href = `visualizar.php?cod=${codigoPrato}`;
            }

            function buscar(nome) {
                console.log(nome);
                window.location.href = `BuscarPrato.php?cod`;
            }


        </script>
    </head>

    <body>
        <div>
            <header>
                <span><i class="fa-solid fa-utensils"></i></span>
                <span>Trabalho Web 2</span>
                <form action="BuscarPrato.php" method="post">
                    <input type="text" name="nome">
                    <button type="submit" class="icon-button"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </header>
            <div>
                <h1>Pratos Disponíveis</h1>  
            </div>

            <div>
                <button onclick="cadastrarPrato()" class="cadastrar">Cadastrar</button>   
            </div>

            <div id="Cardapio">
                <?php
                foreach ($pratos as $prt) {
                    ?>
                    <div class="Prato">
                        <div>
                            <span>
                                <?php echo $prt['codigo'] ?>
                            </span>
                            <span>
                                <?php echo $prt['nome'] ?>
                            </span>
                        </div>
                        <span>
                            R&#36;
                            <?php echo $prt['preco'] ?>
                        </span>
                    </div>
                    <div class="Info">
                        <div>
                            <span>
                                <?php echo $prt['codigo_chefe'] ?>
                            </span>
                            <span>
                                <?php echo $prt['codigo_cozinha'] ?>
                            </span>
                        </div>
                        <span class="btns">
                            <button onclick="visualizar(<?php echo $prt['codigo']; ?>);">Visualizar</button>
                            <button onclick="alterarPrato(<?php echo $prt['codigo']; ?>);">Alterar</button>
                            <button onclick="excluirPrato(<?php echo $prt['codigo']; ?>);">Excluir</button>
                        </span>
                    </div>
                <?php } ?>
            </div>

            <?php
            if (!empty($_GET['msg'])) {
                $a = $_GET['msg'];
                ?> <script>alert("<?php echo $a ?>")</script>
                <?php } ?>

        </div>
    </body>

</html>

