<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="ISO 8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/landing.css">
    <link rel="shortcut icon" href="../Itens/Icons/logoSitePrincipal.png" type="image/x-icon">
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

            <a href="../html/curriculos.html">
                <img src="../Itens/Icons/curriculo-e-cv 1.png" alt="curriculo-e-cv" class="imgs">
            </a>

            <a href="../php/perfil_empresa.php">
                <img src="../Itens/Icons/do-utilizador 1.png" alt="Usuario" class="imgs">
            </a>
        </div>
    </header>
    

    <div class="bodyy">
            <div class="imgAcordo">
                <img src="../Itens/imgs/landing/image 1.png" alt="acordoLanding" class="img">
            </div>
            <div class="textUno">
                <h1>
                    Cansado de não achar <br/>estágio para completar o <br/>curso de TI?
                </h1>
            </div>
            <div class="textDuo">
                <h4>
                    Na FOUNDJOB você acha o melhor estágio para <br/>sua localização, seu rendimento familiar <br/> e horas que deseja trabalhar. <br/>Tudo isso na empresa dos seus sonhos.
                </h4>
            </div>

            <a href="../html/escolha.html"><button>COMECE AGORA</button></a>
        </div>

    <script>
        <?php
        if (isset($_GET["msg"]) && $_GET["msg"] != "") {
        ?>
            alert("<?php echo $_GET["msg"]; ?>");
        <?php
        }
        ?>
    </script>


    <script src="../js/script.js"></script>
</body>

</html>