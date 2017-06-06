<?php
    include_once './includes/cabecalho.php';
    include_once './includes/dashboard.php';
    require_once './includes/conexao.php';
    
    if ($_POST) {
        $custom = '';
        if (!empty($_POST['codigo'])) {
            $cod = mysqli_escape_string($con, $_POST['codigo']);
            $custom .= ' id = ' . $cod;
        } else {
            if (!empty($_POST['status'])) {
                $status = mysqli_escape_string($con, $_POST['status']);
                $custom .= ' AND id_status = ' . $status;
            }
             if (!empty($_POST['nome_solicitante'])) {
                $solicitante = mysqli_escape_string($con, $_POST['nome_solicitante']);
                $custom .= ' AND id_solicitante = ' . $solicitante;
            }
            if (!empty($_POST['inicio_chamado'])) {
                $inicio_chamado = mysqli_escape_string($con, $_POST['inicio_chamado']);
                $custom .= ' AND id_solicitante = ' . $solicitante;
            }          
        }
    




 
    
    $iniciochamado = mysqli_escape_string($con, $_POST['inicio_chamado']);
    $fimchamado = mysqli_escape_string($con, $_POST['fim_chamado']);

    $sql = "SELECT * FROM chamado WHERE ";
    }


include_once './includes/rodape.php';