<?php

try{
  



  $con = new mysqli("localhost", "root", "", "estagiosPIT");
  
  
  $nome = strtoupper($_POST["nome"]);
  $cpf = $_POST["cpf"];
  $email = $_POST["email"];
  $data_nasc = $_POST["dataNascimento"];
  $senha = $_POST["senha"];
  
  $query_select = "SELECT * FROM cadastroUsuario where cpf='$cpf'";

  $result = $con->query($query_select);

  if($result->num_rows > 0){
    echo"<script type='text/javascript'>alert('Cpf inválido!!');";
    echo"javascript:window.location='../html/cadastroUsuario.html'</script>;";
  }else{
    $query_insert = "INSERT INTO cadastroUsuario VALUES (NULL,'$cpf', '$nome', '$email', '$data_nasc', '$senha')";
    $query_run = mysqli_query($con,$query_insert);
    if($query_run){
      header("location: ../html/loginUsuario.html");

    }else{
      echo"<script type='text/javascript'>alert('Falha no cadastro!!');";
      echo"javascript:window.location='../html/cadastroUsuario.html'</script>;";

    }
  }


}
catch(Exception $ex){
  echo $ex->getMessage();
}

  ?>