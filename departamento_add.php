<?php    
require_once './includes/conexao.php';
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';
$mensagem = '';

if ($_POST) {
        $descricao = mysqli_escape_string($con, $_POST['descricao']);
        
        $sql = "INSERT INTO departamento (descricao) VALUES('$descricao')";
        
        $resultado = mysqli_query($con, $sql);
        
        if ($resultado) {
            $mensagem = '<div class="row"><p class="alert alert-success">Departamento cadastrado com sucesso! 
                            <a class="btn btn-default" href="departamentos.php">Voltar</a>
                        </p></div>';
        } else {
            $mensagem = '<div class="row"><p class="alert alert-danger">O cadastro do departamento não foi efetuado. <br>Por favor, tente mais tarde.</p></div>';
        }
        
    }
?>
    <h1 class="page-header">Departamento (Adicionar)</h1>
    
    <div class="form-horizontal" style="margin: 15px 15px 15px 15px">
        <?= $mensagem; ?>
        <form method="post" action="departamento_add.php">
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição">
                </div>
            </div>
            <div class="row">
                <a class="btn btn-default" href="departamentos.php">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
<?php
include_once './includes/rodape.php';