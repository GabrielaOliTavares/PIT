<?php 
    session_start();
    $con = new mysqli("localhost", "root", "", "estagiosPIT");
    $empresa = $_SESSION['id'];

    $id = $_POST['del'];
    $_SESSION['estagio'] = $id;

    $query_delete = "DELETE FROM cadastroEstagio where id=$id";
    $query_run = mysqli_query($con,$query_delete);

    if($query_run){
        echo"<script type='text/javascript'>alert('Deletado com sucesso!!');";
        echo"javascript:window.location='../php/visualizar_estagios.php'</script>;";
    }else{
        echo"<script type='text/javascript'>alert('Não Deletado!!');";
        echo"javascript:window.location='../php/visualizar_estagios.php'</script>;";
    }

?>