<?php

try{
  session_start();
  $empresa = $_SESSION['id'];

  $con = new mysqli("localhost", "root", "", "estagiosPIT");
  
  
  $nome = strtoupper($_POST["nome"]);
  $localizacao = strtoupper($_POST["localizacao"]);
  $contato = strtoupper($_POST["contato"]);
  $bolsa = $_POST["bolsa"];
  $cargaHoraria = strtoupper($_POST["cargaHoraria"]);
  $conhecimento = strtoupper($_POST["conhecimento"]);
  $informaçõesExtras = strtoupper($_POST["informaçõesExtras"]);
  $localizacao = strtoupper($localizacao);



    $query_insert = "INSERT INTO cadastroEstagio VALUES (NULL, '$nome', '$localizacao', '$contato', $bolsa, '$cargaHoraria', '$conhecimento', '$informaçõesExtras', $empresa)";
    $query_run = mysqli_query($con,$query_insert);
    if($query_run){
      // Redirecionar para pagina individual do estágio cadastrado
      header("location: ../html/cadastroEstagio.html");

    }else{
      echo"<script type='text/javascript'>alert('Falha no cadastro!!');";
      echo"javascript:window.location='../html/cadastroEstagio.html'</script>;";

    }



}
catch(Exception $ex){
  echo $ex->getMessage();
}

  ?>