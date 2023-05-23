<?php
require_once "php_action/db_connect.php";
session_start();

if ($_SESSION['code'] == null) {
    header("location:Login.php");
} elseif ((isset($_SESSION['nome']) == true) && (isset($_SESSION['senha']) == true) && (isset($_SESSION['tipo']) == true)) {
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>

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
            margin: 20px;
            box-shadow: 1px 1px 10px black;
            border: none;
            border-radius: 5px 5px;
        }

        input[type=text] {
            font-size: 20px;
            width: 200px;
            padding: 5px;
            margin: 20px;
            border: none;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;
        }

        input[type=password] {
            font-size: 20px;
            width: 200px;
            padding: 5px;
            margin: 20px;
            border: none;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;
        }

        div.box_text {
            margin: 20px;
        }

        div.box_form form {
            display: flex;
            justify-content: flex-start;

        }

        div.barra {
            position: absolute;
            top: 10%;
            left: 16%;
            transform: translate(-50%, -50%);
            margin-top: 50px;
        }

        span {
            position: absolute;
            top: 16%;
            left: 17%;
            transform: translate(-50%, -50%);
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="box_text">
        <h1>Coloque o Código no Campo Correto e Adicione a Senha nova</h1>
        <?php

        if (isset($_SESSION['msg'])) {
        ?>
            <h4><?php echo $_SESSION['msg']; ?></h4><br>
        <?php
            unset($_SESSION['msg']);
        }

        ?>
    </div>
    <div class="box_form">

        <form action="php_action/AlterSenha.php" method="post">

            <input type="text" name="code" placeholder="Código" require>
            <!-- Formate o type para password, agradeço brendo -->
            <input type="password" id="senha" name="senha" minlength="6" maxlength="6" onkeyup="verificaForcaSenha();" placeholder="Senha" />

            <script>
                function verificaForcaSenha() {
                    v = senha.value;

                    var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<]) /;


                    if (v.match(/[A-Z]{1,}/) && v.match(/[0-9]{1,}/) && v.match(/[~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<]{1,}/) && $('#senha').val().length < 6) {
                        barra.style.backgroundColor = "yellow ";
                        document.getElementById("span").innerHTML = "Média:<br>Digite Pelo menos<br> 6 Caracteres";
                    } else if (v.match(/[A-Z]{1,}/) && v.match(/[0-9]{1,}/) && v.match(/[~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<]{1,}/) && $('#senha').val().length == 6) {
                        barra.style.backgroundColor = "green";
                        document.getElementById("span").innerHTML = "Forte";
                    } else if (v.match(/[A-Z]{1,}/) && $('#senha').val().length < 6) {
                        barra.style.backgroundColor = "red";
                        document.getElementById("span").innerHTML = "Fraca:<br>Digite Pelo menos<br> 1 Número<br> 1 Caractere Especial<br> 6 Caracteres";
                    } else if (v.match(/[A-Z]{1,}/) && $('#senha').val().length == 6) {
                        barra.style.backgroundColor = "yellow";
                        document.getElementById("span").innerHTML = "Média:<br>Digite Pelo Menos<br> 1 Número <br>1 Caractere Especial";
                    } else if (v.match(/[0-9]{1,}/) && $('#senha').val().length < 6) {
                        barra.style.backgroundColor = "red";
                        document.getElementById("span").innerHTML = "Fraca:<br>Digite Pelo menos<br> 1 Letra Maiúscula<br> 1 Caractere Especial<br> 6 Caracteres";
                    } else if (v.match(/[0-9]{1,}/) && $('#senha').val().length == 6) {
                        barra.style.backgroundColor = "yellow";
                        document.getElementById("span").innerHTML = "Média:<br>Digite Pelo Menos<br> 1 Letra Maiúscula<br>1 Caractere Especial";
                    } else if (v.match(/[~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<]{1,}/) && $('#senha').val().length < 6) {
                        barra.style.backgroundColor = "red";
                        document.getElementById("span").innerHTML = "fraca:<br>Digite Pelo menos<br> 1 Letra Maiúscula<br> 1 Número<br> 6 Caracteres";
                    } else if (v.match(/[~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<]{1,}/) && $('#senha').val().length == 6) {
                        barra.style.backgroundColor = "yellow";
                        document.getElementById("span").innerHTML = "Média:<br>Digite Pelo Menos<br> 1 Letra Maiúscula<br>1 Número";
                    } else if ($('#senha').val().length < 6 && $('#senha').val().length > 0) {
                        barra.style.backgroundColor = "red";
                        document.getElementById("span").innerHTML = "fraca:<br>Digite Pelo menos<br> 1 Letra Maiúscula<br> 1 Número<br>1 Caracter Especial<br> 6 Caracteres";
                    } else if (v.match(/[a-z]{1,}/) && $('#senha').val().length <= 6) {
                        barra.style.backgroundColor = "red";
                        document.getElementById("span").innerHTML = "fraca:<br>Digite Pelo menos<br> 1 Letra Maiúscula<br> 1 Número<br>1 Caracter Especial<br> 6 Caracteres";
                    } else {
                        barra.style.backgroundColor = "#fff";
                        document.getElementById("span").innerHTML = "";
                    }
                }
            </script>
            <button type="submit">Confirmar</button><a href="RecSenha.php"><button type="button">Voltar</button></a>
        </form>
        <div id="barra" class="barra" style="border:1px solid black;border-radius:10px 10px; width:100px; height:10px;padding:5px;">
        </div>
        <span id="span"></span>
    </div>

</body>

</html>