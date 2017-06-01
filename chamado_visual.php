<?php
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';

require_once './includes/conexao.php';
include_once './includes/funcoes.php';

if ($_GET['id']) {
    $codigo = mysqli_real_escape_string($con, $_GET['id']);
    
    $sql = 'SELECT * FROM chamado WHERE id = '. $codigo;
    
    $resultado = mysqli_query($con, $sql);
    
    $chamado = mysqli_fetch_assoc($resultado);
}
?>

<h1 class="page-header">Visualisar chamado</h1>

 <div class="form-horizontal" style="margin: 15px 15px 15px 15px">
        <form method="post" action="">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="codigo">Código do chamado</label>
                        <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $chamado['id']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="solicitante">Solicitante</label>
                        <?php
                        $sql = 'SELECT * FROM funcionario WHERE id = '.$chamado['id_solicitante'];
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        $solicitante = mysqli_fetch_assoc($resultado);
                        ?>
                        <input type="text" class="form-control" name="solicitante" id="solicitante" value="<?php echo $solicitante['nome']; ?>" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="telefone">Telefone</label>
                        <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="(00) 0000-0000" value="<?php echo $chamado['telefone']; ?>" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="ramal">Ramal</label>
                        <input type="text" class="form-control" name="ramal" id="ramal" placeholder="0000" value="<?php echo $chamado['ramal']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="responsavel">Responsável</label>
                        <?php
                        $sql = 'SELECT * FROM funcionario WHERE id = '.$chamado['id_responsavel'];
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        $responsavel = mysqli_fetch_assoc($resultado);
                        ?>
                        <input type="text" class="form-control" name="responsavel" id="responsavel" value="<?php echo $responsavel['nome']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-2">
                    <label for="prioridade">Prioridade</label>
                    <?php
                    $sql = 'SELECT * FROM prioridade WHERE id = '.$chamado['id_priori'];
                    $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                    $prioridade = mysqli_fetch_assoc($resultado);
                    ?>
                    <input type="text" class="form-control" name="prioridade" id="prioridade" value="<?php echo $prioridade['descricao']; ?>" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="data_inc">Abertura</label>
                        <input type="text" class="form-control" name="data_inc" id="data_inc" value="<?php echo convertData('dma', $chamado['data_inc']); ?>" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="data_prazo">Prazo</label>
                        <input type="text" class="form-control" name="data_prazo" id="data_prazo" value="<?php echo convertData('dma', $chamado['data_prazo']); ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição" value="<?php echo $chamado['descricao']; ?>" readonly>
                </div>
            </div>            
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="tipo">Tipo do chamado</label>
                    <?php
                    $sql = 'SELECT * FROM tipo WHERE id = '.$chamado['id_priori'];
                    $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                    $tipo = mysqli_fetch_assoc($resultado);
                    ?>
                    <input type="text" class="form-control" name="tipo" id="tipo" value="<?php echo $tipo['descricao']; ?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="observacao">Observação</label>
                    <textarea class="form-control" name="observacao" id="observacao" readonly>
                        <?php echo $chamado['observacao']; ?>
                    </textarea>
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