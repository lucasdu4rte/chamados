<?php
require_once './includes/conexao.php';
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';

if (isset($_GET['id'])){
    $id = mysqli_escape_string($con, $_GET['id']);
    $sql = "DELETE FROM funcionario WHERE id = $id";
    
    $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
        
    if ($resultado) {
        $mensagem = '<p class="alert alert-success">Este funcionário foi excluído com sucesso!<br> Você será redirecionado... Aguarde...</p>';
    } else {
        $mensagem = '<p class="alert alert-danger">Erro no sistema!<br>Não foi possivel efetuar exclusão do funcionário, tente novamente...</p>';
    }
}

echo $mensagem.'<meta http-equiv="refresh" content="3; URL=funcionarios.php">';

include_once './includes/rodape.php';