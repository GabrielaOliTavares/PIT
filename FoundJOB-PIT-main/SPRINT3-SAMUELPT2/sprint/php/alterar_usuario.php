<?php 
    session_start();
    $con = new mysqli("localhost", "root", "", "estagiosPIT");
    $id = $_SESSION['id'];
        

        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $data_nasc = $_POST['dataNascimento'];
        $senha = $_POST['senha'];

    $query_update = "UPDATE cadastroUsuario SET cpf='$cpf',nome='$nome', email='$email',dataNascimento='$data_nasc', senha='$senha' where id=$id";
    $query_run = mysqli_query($con,$query_update);

    if($query_run){
        echo"<script type='text/javascript'>alert('Alterado com sucesso!!');";
        echo"javascript:window.location='../php/perfil_usuario.php'</script>;";
    }else{
        echo"<script type='text/javascript'>alert('Não Alterado!!');";
        echo"javascript:window.location='../php/perfil_usuario.php'</script>;";
    }


?>