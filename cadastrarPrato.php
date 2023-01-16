<?php
require_once './conectaDB.php';
?>

<html lang="en">

    <head>
        <title>Cadastrar Prato</title>
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

            input,
            button {
                border: #000 2px solid;
                border-radius: 10px;
            }

            button {
                background-color: rgb(143, 82, 54) ;
                font-size: 18px;
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
                height: 60%;
                border-radius: 12px;
            }

            .CadastrarPrato {
                width: 70%;
                height: 70%;
                padding: 5%;
            }

            .container-form {
                margin: 8% auto 2%;
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

            .img label{
                margin-left: 83%;
            }

            .img input {
                width: 200%;
            }

            .acao {
                margin-left: 350px;

                width: 8.3%;
                padding: 8px;
            }
        </style>

        <script>
            function visualizar() {
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
                <h1>Cadastrar Prato</h1>
                <img src="https://t1.rg.ltmcdn.com/pt/posts/5/8/7/sarapatel_nordestino_tradicional_1785_orig.jpg" alt="">

                <form action="processoPratoNovo.php" method="post" class="CadastrarPrato" id="fcadastro">
                    <div>
                        <label>Novo Prato</label>
                        <input type="text" name="nome">
                    </div>
                    <div class="col-2">
                        <label>Tipo</label>
                        <select name="tipo">
                            <option value="Entrada">Entrada</option>
                            <option value="Carnes">Carnes</option>
                            <option value="Peixe">Peixe</option>
                            <option value="Frango">Frango</option>
                            <option value="Sopas">Sopas</option>
                            <option value="Sobremesa">Sobremesa</option>
                        </select>
                    </div>
                    <div>
                        <label>Chefe</label>
                        <select name="chefe">
                            <option value="Amanda">Amanda</option>
                            <option value="Duilio">Duilio</option>
                            <option value="Eduardo">Eduardo</option>
                            <option value="Luis">Luis</option>
                        </select>
                    </div>
                    <div class="col-2">
                        <label>Cozinha</label>
                        <select name="cozinha">
                            <option value="CG_Cozinha">CG_Cozinha</option>
                            <option value="AQ_Cozinha">AQ_Cozinha</option>
                            <option value="DO_Cozinha">DO_Cozinha</option>
                        </select>
                    </div>
                    <div>
                        <label>Custo</label>
                        <input type="text" name="custo">
                    </div>
                    <div class="col-2">
                        <label>Preço</label>
                        <input type="text" name="preco">
                    </div>
                    <div class="img">
                        <label>Imagem</label>
                        <input type="text" name="img">
                    </div>
                </form>


            </div>

            <button form="fcadastro" class="acao">Cadastrar</button>
            <button class="acao" onclick="visualizar()">Voltar</button> 

        </div>





    </body>

</html>