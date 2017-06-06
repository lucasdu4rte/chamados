<?php
// Inicia sessões 
session_start();

print_r($_POST);

// Recupera o login 
$email = $_POST['email'];
// Recupera a senha
$senha = $_POST['senha'];

include_once './includes/cabecalho.php';
include_once './includes/dashboard_inativo.php';

require_once './includes/conexao.php';
include_once './includes/funcoes.php';

// Usuário não forneceu a senha ou o login 
if ($email == '' || $senha == '') {
    echo "<p class='alert alert-danger'>Você esqueceu de digitar seu email ou sua senha!</p>";
    exit;
}

/**
 * Executa a consulta no banco de dados. 
 * Caso o número de linhas retornadas seja 1 o login é válido, 
 * caso 0, inválido. 
 */
$SQL = "SELECT id, nome, email, senha, id_nivel FROM funcionario WHERE email = '" . $email . "' AND senha = " . $senha;
$result_id = mysqli_query($SQL) or die("Erro no banco de dados!");
$total = mysqli_num_rows($result_id);

// Caso o usuário tenha digitado um email ou senha válido o número de linhas será 1.. 
if ($total) {
// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
    $dados = mysqli_fetch_array($result_id);
    
// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
    $_SESSION["id_usuario"] = $dados["id"];
    $_SESSION["nome_usuario"] = stripslashes($dados["nome"]);
    $_SESSION["nivel"] = $dados["id_nivel"];
    header("Location: dashboard_index.php");
    exit;
}
// Login inválido 
else {
    echo "O email ou senha fornecido são inválidos!";
    exit;
}


include_once './includes/rodape.php';
?>