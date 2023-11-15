<?php
    session_start();

    if (!isset($_SESSION["id"]) || $_SESSION["id"] == "") {
        header("Location: index.php?msg=Usuario nao logado");
        return;
    }
    
    $usuario = $_SESSION["id"];
    $con = new mysqli("localhost", "root", "", "estagiosPIT");
    $stmt = $con->prepare("select * from cadastroEmpresa where id=?");
    $stmt->bind_param("i", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();   
        $nome = $row['nome'];
        $cnpj = $row['cnpj'];
        $ende = $row['ende'];
        $cep = $row['cep'];
        $senha = $row['senha'];
        $tel = $row['tel'];
        $cidade = $row['cidade'];
        $estado = $row['estado'];

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

    <div class="perfil">
        <img src="../Itens/imgs/perfil/rede.png" alt="">
        <p class="nomeEmpresa"><?php echo $nome ?></p>
    </div>

    <div class="booooderBodyEscopo">
        <form action="../php/alterar_empresa.php" method="post" class="formCadastroEmpresa">
            <div class="h1">
                <h1>ATUALIZAR DE EMPRESA</h1>
            </div>
            <input type="text" name="nome" id="nomeCadastro" value="<?php echo $nome ?>" required>
            <div class="conf">
            <input type="text" name="cnpj" id="cnpjCadastro" value="<?php echo $cnpj ?>" required>
            <input type="text" name="tel" id="telCadastro" value="<?php echo $tel ?>" required>
            </div>
            <input type="text" name="end" id="endcadastro"  value="<?php echo $ende ?>" required>
            <div class="conf">
                <input type="text" name="cep" id="cepCadastro" value="<?php echo $cep ?>" required>
                <input type="text" name="cidade" id="cidadeCadastro" value="<?php echo $cidade ?>" required>
            </div>
            <div class="conf">
                <input type="text" name="estado" id="estadoCadastro" value="<?php echo $estado ?>" required>
                <input type="text" name="senha" id="senhaCadasdro" value="<?php echo $senha ?>" required>
            </div>
            <button name="atualizar" type="submit">Atualizar</button>
            <a href="processa_sair.php" class="sair">Sair</a>
        </form>
    </div>

    <div class="btnss">
    <a href="deletar_empresa.php"><button>Excluir</button></a>
    <a href="../html/cadastroEstagio.html"><button>Cadastrar Estagio</button></a>
    <a href="visualizar_estagios.php"><button>Visualizar Estagio</button></a>
    </div>

</body>
</html>