<?php
    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];


    $con = new mysqli("localhost", "root", "", "estagiosPIT");
    $query_select = "SELECT * from cadastroUsuario where cpf='$cpf' AND senha='$senha'";
    $result = $con->query($query_select);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        //echo $row['nome'];
        session_start();
        $_SESSION["id"] = $row['id'];
        header("Location: perfil_usuario.php");

    } else {
        echo"<script type='text/javascript'>alert('Falha no login!!');";
        echo"javascript:window.location='../html/loginUsuario.html'</script>;";
        //header("Location: ../html/loginUsuario.html?msg=Usuario ou senha invalido!");
    }



//aki
?>
