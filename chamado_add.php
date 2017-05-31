<?php    
require_once './includes/conexao.php';
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';
$mensagem = '';

if ($_POST) {
        $solicitante = mysqli_escape_string($con, $_POST['solicitante']);
        $telefone = mysqli_escape_string($con, $_POST['telefone']);
        $ramal = mysqli_escape_string($con, $_POST['ramal']);
        $abertura = mysqli_escape_string($con, $_POST['data_inc']);
        $prazo = mysqli_escape_string($con, $_POST['data_prazo']);
        $descricao = mysqli_escape_string($con, $_POST['descricao']);
        $tipo = mysqli_escape_string($con, $_POST['tipo']);
        $observacao = mysqli_escape_string($con, $_POST['observacao']);
        $anexo = mysqli_escape_string($con, $_POST['anexo']);
        
        $sql = "INSERT INTO chamado (id, id_responsavel, id_solicitante, data_inc, data_alt, 
        data_prazo, descricao, observacao, id_status, id_tipo) VALUES (NULL, NULL, $solicitante, '$abertura', 
         NULL, '$prazo', '$descricao', '$observacao', 1, $tipo)";
        
        $resultado = mysqli_query($con, $sql);
        
        if ($resultado) {
            $mensagem = '<div class="row"><p class="alert alert-success">Cadastro concluído com sucesso! 
                            
                                <a class="btn btn-default" href="funcionarios.php">Voltar</a>
                            
                        </p></div>';
        } else {
            $mensagem = '<div class="row"><p class="alert alert-danger">O cadastro não foi efetuado. <br>Por favor, tente mais tarde.</p></div>';
        }
        
    }
?>
    <h1 class="page-header">Chamado (Adicionar)</h1>
    
    <div class="form-horizontal" style="margin: 15px 15px 15px 15px">
        <?= $mensagem; ?>
        <form method="post" action="chamado_add.php">
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="solicitante">Solicitante</label>
                    <select name="solicitante" id="departamento" class="form-control">
                        <option selected>Selecione...</option>
                        <?php
                        $sql = 'SELECT * FROM funcionario WHERE status = "s"';
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        while ($row = mysqli_fetch_array($resultado)) {
                            echo "<option value='".$row['id']."'>".$row['nome']."</option>";
                        }
                        ?>    
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="telefone">Telefone</label>
                    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="(00) 0000-0000">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="ramal">Ramal</label>
                    <input type="text" class="form-control" name="ramal" id="ramal" placeholder="0000">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="data_inc">Abertura</label>
                    <input type="date" class="form-control" name="data_inc" id="data_inc" value="<?php echo date('d/m/Y'); ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="data_prazo">Prazo</label>
                    <input type="date" class="form-control" name="data_prazo" id="data_prazo">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição">
                </div>
            </div>            
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="tipo">Tipo do chamado</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option selected>Selecione...</option>
                        <?php
                        $sql = 'SELECT * FROM tipo';
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        while ($row = mysqli_fetch_array($resultado)) {
                            echo "<option value='".$row['id']."'>".$row['descricao']."</option>";
                        }
                        ?>    
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="observacao">Observação</label>
                    <textarea class="form-control" name="observacao" id="observacao">
                    </textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="observacao">Anexo</label>
                    <input type="file" name="anexo" value="" >
                </div>
            </div>
            <div class="row">
                <a class="btn btn-default" href="chamados.php">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
<?php
include_once './includes/rodape.php';