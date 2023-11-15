<?php
    $login = $_POST["login"];
    $senha = $_POST["senha"];




    $con = new mysqli("localhost", "root", "", "estagiosPIT");
    $query_select = "SELECT * from cadastroEmpresa where cnpj='$login' AND senha='$senha'";
    $result = $con->query($query_select);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row['nome'];
        session_start();
        $_SESSION["id"] = $row['id'];
        header("Location: perfil_empresa.php");

    } else {
        header("Location: index.php?msg=Usuario ou senha invalido!");
    }



//aki
?>
