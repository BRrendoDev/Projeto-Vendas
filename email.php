<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Pathway+Extreme:wght@500&display=swap"
        rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type='text/javascript' src='http://files.rafaelwendel.com/jquery.js'></script>
    <style>
        body {
            font-family: 'Abel', sans-serif;
            font-family: 'Pathway Extreme', sans-serif;
            padding: 0%;
            margin: 0%;
        }
        div.box_text{
            position:absolute;
            top:50%;
            left:50%;
            transform:
                translate(-50%,-50%);
            
            border:1px solid black;
            margin:10px;
            padding:20px;
        }
    </style>
    <?php 
    session_start();

    ?>
</head>

<body>
<div class="box_text">
    <div class="box_title">
        <h1>Olá, Aqui é a Tech For Us</h1>
    </div>

    <center><h3>Código De Recuperação De Senha:</h3></center>
    <center><h1><div class="box_code"><?php echo $_SESSION["code"]; ?></div></h1></center>
        
</div>
</body>

</html>