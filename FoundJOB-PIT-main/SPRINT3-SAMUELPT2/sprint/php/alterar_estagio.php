<?php

session_start();
$con = new mysqli("localhost", "root", "", "estagiosPIT");
$estagio = $_POST['atu'];
$empresa = $_SESSION['id'];


$nome = $_POST['nome'];
        $localizacao = $_POST['localizacao'];
        $contato = $_POST['contato'];
        $bolsa = $_POST['bolsa'];
        $cargaHoraria = $_POST['cargaHoraria'];
        $conhecimento = $_POST['conhecimento'];
        $informaçõesExtras = $_POST['informaçõesExtras'];


        $query_update = "UPDATE cadastroEstagio SET nome='$nome', localizacao='$localizacao', contato='$contato', bolsa=$bolsa, cargaHoraria='$cargaHoraria', conhecimento='$conhecimento', informaçõesExtras='$informaçõesExtras' where id=$estagio";
        $query_run = mysqli_query($con,$query_update);
    
        if($query_run){
            echo"<script type='text/javascript'>alert('Alterado com sucesso!!');";
            echo"javascript:window.location='../php/visualizar_estagios.php'</script>;";
        }else{
            echo"<script type='text/javascript'>alert('Não Alterado!!');";
            echo"javascript:window.location='../php/visualizar_estagios.php'</script>;";
        }
    
?>