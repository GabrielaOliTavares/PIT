<?php
    session_start();

    if (!isset($_SESSION["id"]) || $_SESSION["id"] == "") {
        header("Location: index.php?msg=Usuário não logado");
        return;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/principal.css">
    <title>Document</title>
</head>
<body>
    Estou logado!!!
    <a href="processa_sair.php">Sair</a>
</body>
</html>