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
    <meta charset="UTF-8">
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

            button {
                font-size: 20px;
                padding: 5px;
                margin: 0px;
                box-shadow: 1px 1px 10px black;
                border: none;
                border-radius: 5px 5px;
            }

            input[type=text] {
                font-size: 20px;
                padding: 5px;
                margin: 5px;
                border: none;
                border-radius: 5px 5px;
                box-shadow: 1px 1px 10px black;
            }
        </style>
    </head>

<body>

    <div class="box_logo">
        <h1>Tech For US</h1>
    </div>
    <div class="box_form">
        <div class="box_title">
            <center>
                <h1>Alterar Produto</h1>
            </center>
        </div>
        <center>



            <form action="php_action/AlterProd.php" method="post">
                <table>
                    <?php
                    if ($_POST) {
                        $id = $_POST['id_prod'];

                        $sql = "SELECT * from produto where id_prod=$id and tipo=1";
                        $result = $connect->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                    ?>
                                <input type="hidden" name="id_prod" value="<?php echo $row['id_prod']; ?>">
                                <tr>
                                    <th>Nome</th>
                                </tr>
                                <tr>
                                    <td>
                                        <center>
                                            <input type="text" name="nome_prod" value="<?php echo $row['nome_prod']; ?>">
                                        </center>
                                    <td>
                                </tr>
                                <tr>
                                    <th>Valor Unitário</th>
                                </tr>
                                <tr>
                                    <td>
                                        <center>
                                            <input type="text" name="valor_prod" value="<?php echo $row['valor_prod']; ?>">
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Quantidade Disponível</th>
                                </tr>
                                <tr>
                                    <td>
                                        <center>
                                            <input type="text" name="qtd_prod" value="<?php echo $row['qtd_prod']; ?>">
                                        </center>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Imagem do Produto</th>
                                </tr>
                                <tr>
                                    <td>
                                        <center>
                                            <input type="text" name="img_prod" value="<?php echo $row['img_prod']; ?>">
                                        </center>
                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    }
                    ?>
                    <center>
                        <tr>
                            <td>
                                <button type="submit">Alterar</button>
                                <a href='AllProd.php'>
                                    <button type="button">Voltar</button>
                                </a>
                            </td>
                        </tr>
                    </center>
                </table>
            </form>
        </center>
    </div>
</body>

</html>