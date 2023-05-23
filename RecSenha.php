<?php
require_once "php_action/db_connect.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap" rel="stylesheet">

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
            margin: 0px;
            box-shadow: 1px 1px 10px black;
            border: none;
            border-radius: 5px 5px;
        }

        input[type=text] {
            font-size: 20px;
            width: 250px;
            padding: 5px;
            margin-left: 10px;
            border: none;
            border-radius: 5px 5px;
            box-shadow: 1px 1px 10px black;
        }

        div.box_form {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: stretch;
        }

        div.box_text {
            position: absolute;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <div class="box_text">
        <label for="email">
            <h1>Digite Aqui o Seu Email
                <?php
                session_start();
                if (isset($_SESSION['msg'])) {
                ?>
                    <h4><?php echo $_SESSION['msg']; ?></h4><br>
                <?php
                    unset($_SESSION['msg']);
                }

                ?>
            </h1>
        </label>
        <br>
    </div>
    <div class="box_form">

        <form action="EnvRec.php" method="post">

            <input type="text" onkeyup="CPF();" name="cpf" id="cpf" placeholder="CPF" data-mask="000.000.000-00" maxlength="14">
            <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js'></script>
            <input type="text" id="email" name="email" placeholder="Insira seu email">
            <button id="but" type="submit">Recuperar</button>
            <a href="Login.php"><button type="button" name="enviar">Voltar</button></a>

        </form>
        </section>
    </div>
</body>

</html>