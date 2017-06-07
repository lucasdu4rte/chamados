<?php
// Inicia sessões 
session_start();

include_once './includes/cabecalho.php';
include_once './includes/dashboard_inativo.php';

require_once './includes/conexao.php';
include_once './includes/funcoes.php';

// Recupera o login 
$email = mysqli_real_escape_string($con, $_POST['email']);
// Recupera a senha
$senha = mysqli_real_escape_string($con, $_POST['senha']);

// Usuário não forneceu a senha ou o login 
if ($email == '' || $senha == '') {
    echo "<p class='alert alert-danger'>Você esqueceu de digitar seu email ou sua senha!</p>";
}

/**
 * Executa a consulta no banco de dados. 
 * Caso o número de linhas retornadas seja 1 o login é válido, 
 * caso 0, inválido. 
 */
$SQL = "SELECT id, nome, email, senha, id_nivel FROM funcionario WHERE email = '" . $email . "' AND senha = " . $senha;
$result_id = mysqli_query($con, $SQL) or die("Erro no banco de dados!");
$total = mysqli_num_rows($result_id);

// Caso o usuário tenha digitado um email ou senha válido o número de linhas será 1.. 
if ($total) {
// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
    $dados = mysqli_fetch_array($result_id);
    
// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
    $_SESSION["id_usuario"] = $dados["id"];
    $_SESSION["nome_usuario"] = stripslashes($dados["nome"]);
    $_SESSION["nivel"] = $dados["id_nivel"];
    echo '<script>window.location.assign("http://localhost/chamados/dashboard_index.php");</script>';
    exit;
}
// Login inválido 
else {
    echo "O email ou senha fornecido são inválidos!";
    exit;
}


include_once './includes/rodape.php';
?>