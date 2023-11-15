<?php 
    session_start();
    $con = new mysqli("localhost", "root", "", "estagiosPIT");
    $id = $_SESSION['id'];
    
    $nome = $_POST['nome'];
    $cnpj = $_POST['cnpj'];
    $ende = $_POST['end'];
    $cep = $_POST['cep'];
    $senha = $_POST['senha'];
    $tel = $_POST['tel'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    $query_update = "UPDATE cadastroEmpresa SET cnpj='$cnpj',nome='$nome', ende='$ende',cep=$cep, senha='$senha', tel=$tel,cidade='$cidade',estado='$estado' where id=$id";
    $query_run = mysqli_query($con,$query_update);

    if($query_run){
        echo"<script type='text/javascript'>alert('Alterado com sucesso!!');";
        echo"javascript:window.location='../php/perfil_empresa.php'</script>;";
    }else{
        echo"<script type='text/javascript'>alert('Não Alterado!!');";
        echo"javascript:window.location='../php/perfil_empresa.php'</script>;";
    }


?>