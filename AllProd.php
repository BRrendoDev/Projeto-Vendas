<?php
require_once "php_action/db_connect.php";


session_start();
$id = $_SESSION['id_user'];
$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$tipo = $_SESSION['tipo'];

if ((isset($_SESSION['nome']) != true) && (isset($_SESSION['senha']) != true) && (isset($_SESSION['tipo']) != true)) {

    header("location:Login.php");
} elseif ($tipo == 1) {
} elseif ($tipo == 0) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap" rel="stylesheet">

    <head>
        <meta charset="UTF-8">

        <!-- <title>Qual o nome do site?</title> -->
        <style>
            body {
                font-family: 'Abel', sans-serif;
                font-family: 'Pathway Extreme', sans-serif;
                padding: 0%;
                margin: 0%;
            }

            table {
                padding: 10px;
                margin: 20px;
                border: double 5px;
                border-radius: 10px 10px;
            }

            button {
                font-size: 15px;
                padding: 5px;
                margin: 5px;
                box-shadow: 1px 1px 5px black;
                border: none;
                border-radius: 5px 5px;
            }

            div.alter {
                display: flex;
            }
        </style>
        <script>
            function del() {
                alert("O Produto será deletado");
            }
        </script>
    </head>

<body>

</body>

</html>

<div class="table1">
    <center>
        <h3>Todos os Produtos <a href="index.php"><button type="button" class="back">Voltar</button></a></h3>
    </center>
    <?php
    if (isset($_SESSION['msg'])) {
    ?>
        <tr>
            <td>
                <center>
                    <h4 class='msg'> <?php echo $_SESSION['msg']; ?></h4>
                </center>
            </td>
        </tr>

    <?php
        unset($_SESSION['msg']);
    }

    ?>
    <center>
        <table>
            <tr>
                <th>Id Do Produto</th>
                <th>Produto</th>
                <th>Valor Unidade</th>
                <th>Quantidade</th>
                <th>Ações</th>

            </tr>
            <?php
            $sql = "SELECT * FROM produto where tipo=1 order by id_prod asc ";
            $result = $connect->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>

                    <tr>
                        <td>
                            <center><?php echo $row['id_prod']; ?></center>
                        </td>
                        <td>
                            <center><?php echo $row['nome_prod']; ?></center>
                        </td>
                        <td>
                            <center>R$ <?php echo $row['valor_prod']; ?></center>
                        </td>
                        <td>
                            <center> <?php echo $row['qtd_prod']; ?></center>
                        </td>


                        <td>
                            <div class="alter">
                                <form action="AlterProd.php" method="post">

                                    <a href="AlterProd.php"><button name="id_prod" class="edit" value=<?php echo $row['id_prod']; ?>>Editar</button></a>
                                    
                                </form>
                                <form action="php_action/Delete_prod.php" method="post">
                                    <button onclick="del()" name="id_prod" class="delet" type="submit" value=<?php echo $row['id_prod']; ?>>Deletar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td>
                        <center>Nenhum Produto Em Falta</center>
                    </td>
                </tr>
            <?php
            }

            ?>