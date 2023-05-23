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

    <!-- <title>Qual o nome do site?</title> -->
    <style>
        body {
            height: 100%;
            padding: 170px;
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            display: absolute;
            background-color: #406d96;

        }

        button {
            font-size: 20px;
            padding: 5px;
            margin: 5px;
            box-shadow: 1px 1px 10px black;
            border: none;
            border-radius: 5px 5px;
        }

        input {
            font-size: 20px;
            background-color: white;
            box-shadow: 1px 1px 10px black;
            margin: 5px;
            border: none;
            padding: 5px;
            border-radius: 10px 10px;
            width: 280px;


        }

        .box_form {
            top: 20%;
            display: flex;
            flex-direction: column;
            background-color: white;
            padding: 5%;
            width: 300px;
            box-shadow: 1px 1px 10px black;
            transform: translate(5%, 5%);
        }

        .h2 {
            top: 50%;

        }


        .box_form .submit {


            background-color: white;
            font-size: 20px;
            margin: 5px;
            border: none;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;

        }

        div.nav {
            position: absolute;
            top: 3%;
            width: 182%;
            transform: translate(-50%, -50%);
            background-color: #A8D0DA;
            font-size: 20px;
            padding: 50px;
            margin: 5px;
            border: none;
            justify-content: center;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;
            left: 6%;

        }
    </style>
</head>

<body>

    <center>
        <div class="nav">
            <div class="box_logo">

                <header>
                    <h1>Tech For US</h1>
                </header>
            </div>
        </div>
        <div class="box_form">
            <table>
                <form method="post" action="php_action/Open.php">
                    <tr>
                        <td>
                            <center>
                                <h2>Entre Já</h2>
                            </center>
                        </td>
                    </tr>
                    <?php
                    session_start();
                    if (isset($_SESSION['msg'])) {
                    ?>
                        <tr>
                            <td>
                                <h4 class='msg'> <?php echo $_SESSION['msg']; ?></h4><br>
                            </td>
                        </tr>

                    <?php
                        unset($_SESSION['msg']);
                    }

                    ?>
                    <tr>
                        <th><label for="nome">Nome</label></th>
                    </tr>
                    <tr>
                        <td>
                            <center><input type="text" name="nome" id="nome" onkeyup="this.value = this.value.toUpperCase();" placeholder="Nome"></center>
                        </td>
                    <tr>
                    <tr>
                        <th><label for="senha">Senha</label></th>
                    </tr>

                    <tr>
                        <td>
                            <center><input type="password" name="senha" id="senha" placeholder="Senha"></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center><button type="submit">Entrar</button><a href="RecSenha.php"><button type="button">Recuperar Senha</button></a></center>
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </center>
</body>

</html>