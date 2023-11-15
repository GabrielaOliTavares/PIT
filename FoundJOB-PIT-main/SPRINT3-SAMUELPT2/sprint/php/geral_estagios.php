<?php
$con = new mysqli("localhost", "root", "", "estagiosPIT");
$query_a = "SELECT distinct(localizacao) FROM cadastroEstagio;";
$query_run_a = mysqli_query($con, $query_a);
if($query_a){
    $lugar = mysqli_fetch_array($query_run_a);
}
?>

<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-7">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estagiosGeral.css">
    <title>FoundJOB</title>
</head>

<body>

<header>
        <div class="topo" >
            <img src="../Itens/Icons/acordo1.png" alt="logo" class="logotipo">
        </div>
        <div class="lateral">
            <a href="../html/landingPage.html">
                <img src="../Itens/Icons/botao-quadrado 1.png" alt="menu Inicial" class="imgs">
            </a>

            <a href="../php/geral_estagios.php">
                <img src="../Itens/Icons/pasta 1.png" alt="Pagina Estagios" class="imgs">
            </a>

            <a href="#">
                <img src="../Itens/Icons/marca-paginas 1.png" alt="estagios Favoritos" class="imgs">
            </a>

            <a href="#">
                <img src="../Itens/Icons/curriculo-e-cv 1.png" alt="curriculo-e-cv" class="imgs">
            </a>

            <a href="../php/perfil_empresa.php">
                <img src="../Itens/Icons/do-utilizador 1.png" alt="Usuario" class="imgs">
            </a>
        </div>
    </header>

    <div class="total">

<h1>Filtros</h1>
<form method="POST" class="filtro">

        <div class="">
            <h3>Bolsa:</h3>
            <input type="text" name="min" placeholder="Valor Mínimo">
            <input type="text" name="max" placeholder="Valor Máximo"> <br><br>
            <input type="text" name="tempo" placeholder="Hora"> <br><br>
        </div>

        
        <div class="">
            <h3>Localização:</h3>
            <select name="combobox">
                <option  value="select" >Todos</option>
                <?php
                    foreach($query_run_a as $lugar){
                        ?>
                        <option  value="<?php echo $lugar['localizacao']?>" ><?php echo $lugar['localizacao']?></option>
                        <?php
                    }
                
                
                ?>
                </select>
            <input type="submit" name="Procurar" value="Procurar">
        </div>
        
        
        
        
    </form>
<br><br>

<?php



if(isset($_POST['Procurar'])){
    $max = $_POST['max'];
    $min = $_POST['min'];
    if($max == ""){
        $max = 999999999;
    }
    if($min == ""){
        $min = -999999999;
    }
    $local = $_POST['combobox'];
    $hora = $_POST['tempo'];
    if($hora == ""){
        $hora = 10;
    }
    

    // $local = "";
    // if(isset($_POST['select'])){
    //     $local = $_POST['select'];
    //     echo "<h1> chegamos aqui? </h1>";
    // }
    // if(isset($_POST['belo'])){
    //     $local = $_POST['belo'];
    //     echo "<h1> chegamos aqui? </h1>";
    // }
    // if(isset($_POST['contagem'])){
    //     $local = $_POST['contagem'];
    // }
    // if(isset($_POST['sabara'])){
    //     $local = $_POST['sabara'];
    // }


    if($local == 'select'){
        
        $query = "SELECT * FROM cadastroEstagio where bolsa between $min and $max and cargaHoraria <= $hora;";
    
    }
    else{
        $query  = "SELECT * from cadastroEstagio where localizacao = '$local' and bolsa between $min and $max and cargaHoraria <= $hora;";
    }
    // if($local == 'select' && $estagio == null){

    //     $query = "SELECT * FROM cadastroEstagio;";
    
    // }
    // if($local == 'belo'){
        
    //     $query  = "SELECT * from cadastroEstagio where localizacao = '$local' and bolsa between $min and $max;";
    
    // }
    // // if($local == 'belo' && $estagio == null){
        
    // //     $query  = "SELECT * from cadastroEstagio where localizacao = $local;";
    
    // // }
    // else if($local == 'contagem'){
    
    //     $query  = "SELECT * from cadastroEstagio where localizacao = '$local' and bolsa between $min and $max;";
    
    // }
    // // else if($local == 'contagem' && $estagio == null){
    
    // //     $query  = "SELECT * from cadastroEstagio where localizacao = $local;";
    
    // // }
    
    // else if($local == 'sabara'){

    //    $query  = "SELECT * from cadastroEstagio where localizacao = '$local' and bolsa between $min and $max;";
    
    // }
    // else if($local == 'sabara' && $estagio == null){

    //    $query  = "SELECT * from cadastroEstagio where localizacao = $local;";
    
    // }
    
}
else{
    $query = "SELECT * FROM cadastroEstagio;";

}

// $query = "SELECT * FROM cadastroEstagio";
$query_run = mysqli_query($con, $query);
if($query_run){
    $estagio = mysqli_fetch_array($query_run);
}
foreach ($query_run as $estagio) {
?>
    <tr>
        <td>
            <div class="estagio">
                nome: <?= $estagio['nome']; ?><br>
                localização: <?= $estagio['localizacao']; ?><br>
                contato: <?= $estagio['contato']; ?><br>
                bolsa: <?= $estagio['bolsa']; ?><br>
                cargaHoraria: <?= $estagio['cargaHoraria']; ?><br>
                conhecomento: <?= $estagio['conhecimento']; ?><br>
                informações adicionais: <?= $estagio['informaçõesExtras']; ?><br><br><br><br><br>
            </div>
        </td> <br>
    </tr>
<?php
}





?>

</html>


<?php

?>