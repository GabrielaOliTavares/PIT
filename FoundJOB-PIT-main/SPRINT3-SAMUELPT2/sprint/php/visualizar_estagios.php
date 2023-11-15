<?php
session_start();
// puxa o id do uduario (que é o mesmo do guarda roupa sem exceção pelo trigger no bd)
$usuario = $_SESSION["id"];

// abre a conexao
$con = new mysqli("localhost", "root", "", "estagiosPIT");
// puxa o nome e o blob(blob é uma imagem em formato de string) do item
$query = "SELECT * FROM cadastroEstagio where empresa_fk=$usuario;";
$query_run = mysqli_query($con, $query);
// se der certo, ele atribui a um arry
if (mysqli_num_rows($query_run) > 0) {
    $estagio = mysqli_fetch_array($query_run);
}
?>

<!DOCTYPE html>
<head>
<meta charset="ISO 8859-1">
    <link rel="stylesheet" href="../css/estagios.css">
</head>
<body>

<header>
        <div class="topo" >
            <img src="../Itens/Icons/acordo1.png" alt="logo" class="logotipo">
        </div>
        <div class="lateral">
        </div>
</header>

<?php
// imprime os itens para adicionar a um look
foreach ($query_run as $estagio) {
?>
    <tr>
        <td>
            <div class="vai">
                nome: <?= $estagio['nome']; ?><br>
                localização: <?= $estagio['localizacao']; ?><br>
                contato: <?= $estagio['contato']; ?><br>
                bolsa: <?= $estagio['bolsa']; ?><br>
                cargaHoraria: <?= $estagio['cargaHoraria']; ?><br>
                conhecomento: <?= $estagio['conhecimento']; ?><br>
                informações adicionais: <?= $estagio['informaçõesExtras']; ?><br>

                <form action="../php/deletar_estagio.php" method="POST">
                    <button name="del" value="<?= $estagio['id']; ?>">Deletar</button>
                </form>
                
                <form action="../php/atualizar_estagio.php" method="POST">
                    <button type="submit" name="atu" value="<?= $estagio['id']; ?>">Atualizar</button>
                </form>
                <form action="../php/perfil_empresa.php" class="vaim">
    <br>
    <br>
    <button>home</button>
</form>
            </div>
        </td>
    </tr>
<?php
}
?>
</body>