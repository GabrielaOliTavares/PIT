<?php
    session_start();

    if (!isset($_SESSION["id"]) || $_SESSION["id"] == "") {
        header("Location: index.php?msg=Usuário não logado");
        return;
    }
    
    $id = $_POST['atu'];

    $usuario = $_SESSION["id"];
    var_dump($usuario);
    $con = new mysqli("localhost", "root", "", "estagiosPIT");
    $stmt = $con->prepare("select * from cadastroEstagio where id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();   
        $id = $row['id'];
        $nome = $row['nome'];
        $localizacao = $row['localizacao'];
        $contato = $row['contato'];
        $bolsa = $row['bolsa'];
        $cargaHoraria = $row['cargaHoraria'];
        $conhecimento = $row['conhecimento'];
        $informaçõesExtras = $row['informaçõesExtras'];

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/estiloEmpresa.css">
    <link rel="shortcut icon" href="../Itens/Icons/logoSitePrincipal.png" type="image/x-icon">
    <title>FoundJOB</title>
</head>
<body>

<header>
        <div class="topo" >
            <img src="../Itens/Icons/acordo1.png" alt="logo" class="logotipo">
        </div>
        <div class="lateral">
            <a href="./landingPage.html">
                <img src="../Itens/Icons/botao-quadrado 1.png" alt="menu Inicial" class="imgs">
            </a>

            <a href="../php/visualizar_estagios.php">
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

    <div class="boderBodyEscopo">
        <form action="../php/alterar_estagio.php" method="post" class="formCadastroEmpresa">
            <div class="h1">
                <h1>ATUALIZAR DE ESTÁGIO</h1>
            </div>
            <div class="conf">
            <input type="text" name="nome" id="cnpjCadastro" value="<?php echo $nome ?>" required>
            <input type="text" name="localizacao" id="telCadastro" value="<?php echo $localizacao ?>" required>
            </div>
            
            <input type="text" name="contato" id="endcadastro"  value="<?php echo $contato ?>" required>
            <div class="conf">
                <input type="text" name="bolsa" id="cepCadastro" value="<?php echo $bolsa ?>" required>
                <input type="text" name="cargaHoraria" id="cidadeCadastro" value="<?php echo $cargaHoraria ?>" required>
            </div>
            <div class="conf">
                <input type="text" name="conhecimento" id="estadoCadastro" value="<?php echo $conhecimento ?>" required>
                <input type="text" name="informaçõesExtras" id="senhaCadasdro" value="<?php echo $informaçõesExtras ?>" required>
            </div>
            <a href="processa_sair.php" >Sair</a>
            <button name="atu" value="<?php echo $id ?>" >Atualizar</button>
        </form>
    </div>


</body>
</html>