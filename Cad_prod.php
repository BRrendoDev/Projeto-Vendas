<?php
require_once "php_action/db_connect.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap" rel="stylesheet">
    <?php
    session_start();
    $id = $_SESSION['id_user'];
    $nome = $_SESSION['nome'];
    $senha = $_SESSION['senha'];
    $tipo = $_SESSION['tipo'];

    if ((isset($_SESSION['nome']) != true) && (isset($_SESSION['senha']) != true) && (isset($_SESSION['tipo']) != true)) {

        header("location:Login.php");
    } else {
    }
    if ($tipo == 0) {
        header("location:index.php");
    }
    ?>
    <!-- <title>Qual o nome do site?</title> -->
    <style>
        body {
            background-image: linear-gradient(2deg, darkblue, cyan);
        }

        form {
            background: white;
            display: flex;
            flex-direction: column;
            margin-left: 500px;
            margin-right: 500px;
            margin-top: 100px;
            border-radius: 20px;
            padding: 20px;
            font-family: 'Pathway Extreme', sans-serif;
            font-weight: bold;
            color: #008B8B;
        }

        input {
            border-radius: 9px;
            border: #008B8B solid;
        }

        h1 {
            font-size: 40px;
            font-family: 'Pathway Extreme', sans-serif;
        }

        .back {
            margin-left: 115px;
            background: darkblue;
            color: white;
            font-family: 'Pathway Extreme', sans-serif;
            border: darkblue;
            border-radius: 9px;
            padding: 9px;
            font-weight: bold;
        }

        .button {
            background: #008B8B;
            color: white;
            border-radius: 10px;
            font-family: 'Pathway Extreme', sans-serif;
            font-weight: bold;
            font-size: 20px;
            border: #008B8B;

        }

        .img {
            position: fixed;
            top: 20px;
            left: 400pt;

        }
    </style>
</head>

<body>

    <form method="post" action="php_action/Cad_prod.php">




        <h1>Novo Produto</h1>
        <?php

        if (isset($_SESSION['msg'])) {
        ?> <h4 class='msg'><?php echo $_SESSION['msg']; ?> </h4>

        <?php
            unset($_SESSION['msg']);
        }

        ?>

        <label for="img">Imagem do Produto</label>

        <input type="text" name="img" id="img" placeholder="Link Da Imagem"><br><br>

        <label for="nome">Nome do Produto</label>

        <input type="text" name="nome" id="nome" placeholder="Nome"><br><br>

        <label for="qtd">Quantidade do Produto</label>

        <input type="text" name="qtd" id="qtd" placeholder="Quantidade"><br><br>

        <label for="valor">Valor Produto</label>

        <input type="text" name="valor" id="valor" placeholder="R$">

        <br><br><button class="button" type="submit">Cadastrar</button> <a href="index.php"><br>
            <button type="button" class="back">Voltar</button></a>

    </form>



</body>

</html>