<?php
    session_start();

    if (!isset($_SESSION["id"]) || $_SESSION["id"] == "") {
        header("Location: ../html/loginUsuario.html?msg=Usuário não logado");
        return;
    }
    
    $usuario = $_SESSION["id"];
    $con = new mysqli("localhost", "root", "", "estagiosPIT");
    $stmt = $con->prepare("select * from cadastroUsuario where id=?");
    $stmt->bind_param("i", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();   
        $nome = $row['nome'];
        $cpf = $row['cpf'];
        $email = $row['email'];
        $data_nasc = $row['dataNascimento'];
        $senha = $row['senha'];

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
        <div class="blue">
            <img src="../Itens/imgs/menu.png" alt="MENU" class="imgMenuPrincipal" id='imagem' onClick="fechar()" onMouseOver="abrir()">
            <ul id="popup" class="popup">
            <li class="itemLiPopUp"><a href="../html/landingPage.html">HOME</a></li>
            <li class="itemLiPopUp" ><a href="../html/escolha.html">Login</a></li>
            <li class="itemLiPopUp" ><a href="../php/geral_estagios.php">Estagios</a></li>
            <li class="itemLiPopUp" ><a href="#">Estagio Favoritos</a></li>
            <li class="itemLiPopUp" ><a href="#">Curriculo</a></li>
            <li class="itemLiPopUp" ><a href="#">Minha Conta</a></li>
            </ul>
        </div>
    </header>

    <div class="boderBodyEscopo">
        <form action="../php/alterar_usuario.php" method="post" class="formCadastroUsuario">
            <div class="h1">
                <h1>Atualizar USUARIO</h1>
            </div>
            <input type="text" name="nome" id="nomeCadastro" placeholder="Nome" value="<?php echo $nome ?>" required>
            <div class="conf">
            <input type="text" name="cpf" id="cpfCadastro" placeholder="cpf" value="<?php echo $cpf ?>" required>
            <input type="email" name="email" id="emailCadastro" placeholder="e-mail" value="<?php echo $email ?>" required>
            
            </div>
            <div class="conf">
                <input type="date" name="dataNascimento" id="dataNascimento" placeholder="Data de Nascimento" value="<?php echo $data_nasc ?>" required>
                <input type="text" name="senha" id="senhaCadasdro" placeholder="Senha" value="<?php echo $nome ?>" value="<?php echo $senha ?>" required>
            </div>
            <button type="submit">Atualizar</button>
        </form>
            <a href="deletar_usuario.php"><button>Excluir</button></a>
    </div>


</body>
</html>