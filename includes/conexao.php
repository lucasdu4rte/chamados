<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'ticket';

// Conecta-se ao banco de dados MySQL
$con = mysqli_connect($servidor, $usuario, $senha, $banco) or die(mysqli_error());
