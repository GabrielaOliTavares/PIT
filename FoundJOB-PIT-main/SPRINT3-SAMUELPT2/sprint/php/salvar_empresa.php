<?php

try{


  $con = new mysqli("localhost", "root", "", "estagiosPIT");
  
  
  $nome = strtoupper($_POST["nome"]);
  $ende = strtoupper($_POST["end"]);
  $tel = $_POST["tel"];
  $cnpj = strtoupper($_POST["cnpj"]);
  $cep = $_POST["cep"];
  $cidade = strtoupper($_POST["cidade"]);
  $estado = strtoupper($_POST["estado"]);
  $senha = strtoupper($_POST["senha"]);
  
  $query_select = "SELECT * FROM cadastroEmpresa where cnpj='$cnpj'";

  $result = $con->query($query_select);

  if($result->num_rows > 0){
    echo"<script type='text/javascript'>alert('Cnpj inválido!!');";
    echo"javascript:window.location='../html/cadastroEmpresa.html'</script>;";
  }else{
    $query_insert = "INSERT INTO cadastroEmpresa VALUES (NULL,'$cnpj', '$nome', '$ende', $cep, '$senha', $tel, '$cidade', '$estado')";
    $query_run = mysqli_query($con,$query_insert);
    if($query_run){
      header("location: ../html/index.html");

    }else{
      echo"<script type='text/javascript'>alert('Falha no cadastro!!');";
      echo"javascript:window.location='../html/cadastroEmpresa.html'</script>;";

    }
  }


}
catch(Exception $ex){
  echo $ex->getMessage();
}

  ?>