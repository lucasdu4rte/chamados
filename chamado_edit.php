<?php
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';

require_once './includes/conexao.php';
include_once './includes/funcoes.php';
$mensagem = '';

if (isset($_GET['codigo'])) {
    $id = mysqli_escape_string($con, $_GET['codigo']);
    $id_responsavel = mysqli_escape_string($con, $_GET['responsavel']);
    $data_alt = date('Y-m-d');
    $data_prazo = convertData('amd',mysqli_escape_string($con, $_GET['data_prazo']));
    $id_status = mysqli_escape_string($con, $_GET['status']);
    $id_priori = mysqli_escape_string($con, $_GET['prioridade']);

    $sql = "UPDATE chamado SET id_responsavel = '$id_responsavel', data_alt = '$data_alt', data_prazo= '$data_prazo', id_status='$id_status', id_priori='$id_priori' WHERE id = $id";

    $resultado = mysqli_query($con, $sql);

    if ($resultado) {
        $mensagem = '<p class="alert alert-success">Chamado alterado com sucesso!</p>';
    } else {
        $mensagem = '<p class="alert alert-danger">O chamado não foi alterado. <br>Por favor, tente mais tarde.</p>';
    }
}
?>
<h1 class="page-header">Chamado</h1>
<?php
echo $mensagem;
include_once './includes/rodape.php';
