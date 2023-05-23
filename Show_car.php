<?php
require_once "php_action/db_connect.php";
session_start();

$id = $_SESSION['id_user'];
$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$tipo = $_SESSION['tipo'];

if ((isset($_SESSION['nome']) != true) && (isset($_SESSION['senha']) != true) && (isset($_SESSION['tipo']) != true)) {

    header("location:Login.php");
} elseif ($tipo == 0) {
} elseif ($tipo == 1) {
    header("location:index.php");
}

$carrinho = $_SESSION['carrinho'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap" rel="stylesheet">

    <!-- <title>Qual o nome do site?</title> -->
    <style>
        body {
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            padding: 0%;
            margin: 0%;
        }

        button {
            font-size: 20px;
            padding: 5px;
            margin: 0px;
            box-shadow: 1px 1px 10px black;
            border: none;
            border-radius: 5px 5px;
        }

        table {
            width: 500px;
        }
    </style>
</head>

<body>
    <div class="nav">
        <div class="box_logo">
            <h1>Tech For US</h1>
        </div>
    </div>
    <h1>Carrinho
        <a href="index.php"><button type="button" class="back">Voltar</button></a>
        <a href="php_action/Delete_car.php"><button>Apagar Carrinho</button></a>
        <a href="php_action/comp.php"><button>Comprar</button></a>
    </h1>
    <div class="box_table">
        <table>
            <tr>
                <th>
                    Produto
                </th>
                <th>
                    Quantidade
                </th>
                <th>
                    Valor Unidade
                </th>
            </tr>


            <?php
            $total = 0;
            foreach ($carrinho as $key => $values) {
            ?>
                <tr>
                    <td>
                        <center><?php echo $values["nome"]; ?></center>
                    </td>
                    <td>
                        <center><?php echo $values["qtd"]; ?></center>
                    </td>
                    <td>
                        <center><?php echo $values["valor"]; ?></center>
                    </td>
                </tr>
            <?php

                $total += $values['qtd'] * $values['valor'];
            }
            ?>



        </table>
        <center>
            <h1><span>Valor Total: R$<?php echo $total; ?></span></h1>
        </center>
    </div>

</body>

</html>