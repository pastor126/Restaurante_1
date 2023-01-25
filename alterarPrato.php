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
        $altera = $stmt->fetchAll();
    }
} catch (PDOException $e) {
    echo 'Falha ao obter dados. Tente novamente mais tarde.';
    die($e->getMessage());
}

try {
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
    echo '<br>Falha ao cadastrar prato';
    die($ex->getMessage());
}
?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/949dcd6b8d.js" crossorigin="anonymous"></script>
        <title>Alterar Prato</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');

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
                background-color: rgb(120, 60, 60);
                font-size: 18px;
            }

            button:active {
                background-color: rgb(120, 60, 60);
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
                left: 40%;
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
                height: 80%;
                border-radius: 12px;
            }

            .CadastrarPrato {
                width: 70%;
                height: 70%;
                padding: 3%;
            }

            .container-form {
                margin: 6% auto;
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
                margin-bottom: 5%;
                font-size: 20px;
            }

            .CadastrarPrato input {
                padding-left: 5%;
                height: 50%;
            }

            .col-2 {
                margin-left: 20%;
            }

            .img {
                margin-left: 10%;
            }

            .img label {
                margin-left: 83%;
            }

            .img input {
                width: 200%;
            }

            .CadastrarPrato button {
                position: absolute;
                bottom: 10%;
                left: 22%;
                width: 8.3%;
                padding: 8px;
            }

            .visualizar {
                position: absolute;
                bottom: 10%;
                right: 24%;
                width: 8.3%;
                padding: 8px;
            }
        </style>

        <script>
            function Visualizar() {
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
            <div class="container-form">
                <h1>Alterar Prato</h1>
                <img src="<?php echo $altera[0]['img'] ?>" alt="">

                <form action="processoAlterarPrato.php" method="post" class="CadastrarPrato">
                    <input type="hidden" name="codigo" value="<?php echo $altera[0]['codigo'] ?>">
                    <div>
                        <label>Novo Prato</label>
                        <input type="text" name="nome" value="<?php echo $altera[0]['nome'] ?>">
                    </div>
                    <div class="col-2">
                        <label>Tipo</label>
                        <select name="tipo">
                            <option value="Entrada" <?php echo $ctipo[0] === 'Entrada' ? 'selected' : '' ?>>Entrada</option>
                            <option value="Carnes" <?php echo $ctipo[0] === 'Carnes' ? 'selected' : '' ?>>Carnes</option>
                            <option value="Peixe" <?php echo $ctipo[0] === 'Peixe' ? 'selected' : '' ?>>Peixe</option>
                            <option value="Frango" <?php echo $ctipo[0] === 'Frango' ? 'selected' : '' ?>>Frango</option>
                            <option value="Sopas" <?php echo $ctipo[0] === 'Sopas' ? 'selected' : '' ?>>Sopas</option>
                            <option value="Sobremesa" <?php echo $ctipo[0] === 'Sobremesa' ? 'selected' : '' ?>>Sobremesa</option>
                        </select>                  
                    </div>
                    <div>
                        <label>Chefe</label>
                        <select name="chefe">
                            <option value="Amanda" <?php echo $cchefe[0] === 'Amanda' ? 'selected' : '' ?>>Amanda</option>
                            <option value="Duilio" <?php echo $cchefe[0] === 'Duilio' ? 'selected' : '' ?>>Duilio</option>
                            <option value="Eduardo"<?php echo $cchefe[0] === 'Eduardo' ? 'selected' : '' ?>>Eduardo</option>
                            <option value="Luis" <?php echo $cchefe[0] === 'Luis' ? 'selected' : '' ?>>Luis</option>
                        </select>  
                    </div>

                    <div class="col-2">
                        <label>Cozinha</label>
                        <select name="cozinha">
                            <option value="CG_Cozinha" <?php echo $ccozinha[0] == "CG_Cozinha" ? 'selected' : '' ?>>CG_Cozinha</option>
                            <option value="AQ_Cozinha" <?php echo $ccozinha[0] == "AQ_Cozinha" ? 'selected' : '' ?>>AQ_Cozinha</option>
                            <option value="DO_Cozinha" <?php echo $ccozinha[0] == "DO_Cozinha" ? 'selected' : '' ?>>DO_Cozinha</option>
                        </select>
                    </div>
                    <div>
                        <label>Custo</label>
                        <input type="text" name="custo" value="<?php echo $altera[0]['custo'] ?>">
                    </div>
                    <div class="col-2">
                        <label>Preço</label>
                        <input type="text" name="preco" value="<?php echo $altera[0]['preco'] ?>">
                    </div>
                    <div class="img">
                        <label>Imagem</label>
                        <input type="text" name="img" value="<?php echo $altera[0]['img'] ?>">
                    </div>
                    <input type="hidden" name="dataC" value="<?php echo $crdate = date("Y-m-d"); ?>">
                    <button type="submit" name="inserirPrt">Alterar</button>
                </form>
            </div>
            <button class="visualizar" onclick="Visualizar()">Voltar</button>
        </div>
    </form>
</body>

</html>