<?php
session_start();
require_once './includes/conexao.php';
include_once './includes/funcoes.php';

$descricao = $_POST['descricao_hist'];
$data_inc = date('Y-m-d');
$hora_inc = date('H:i:s');
$id_chamado = $_POST['id_chamado']; 
$id_funcionario = $_SESSION["id_usuario"]; 

$sql = "INSERT INTO historico (id, descricao, data_inc, hora_inc, id_funcionario, id_chamado) VALUES(NULL, '$descricao', '$data_inc', '$hora_inc', $id_funcionario, $id_chamado)";
$resultado = mysqli_query($con, $sql);


if ($resultado) {
    echo 'OK';
} else {
    echo 'ERROR';
}


