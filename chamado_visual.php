<?php
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';

require_once './includes/conexao.php';
include_once './includes/funcoes.php';

if (isset($_POST['salvar'])){
    $id_chamado = $_POST['id_chamado'];
    
    $sql = 'UPDATE chamado SET ';
    
    if($_POST['status'] <> ''){
        $sql .= ' id_status = "'.$_POST['status'].'"';
    }
    
    if($_POST['solicitante'] <> ''){
        $sql .= ', id_solicitante = "'.$_POST['solicitante'].'"';
    }
    
    if($_POST['responsavel'] <> ''){
        $sql .= ', id_responsavel = "'.$_POST['responsavel'].'"';
    }
    
    if($_POST['prioridade'] <> ''){
        $sql .= ', id_priori = "'.$_POST['prioridade'].'"';
    }
    
    if($_POST['responsavel'] <> ''){
        $sql .= ', id_responsavel = "'.$_POST['responsavel'].'"';
    }
    
    if($_POST['data_prazo'] <> ''){
        $sql .= ', data_prazo = "'.convertData('amd', $_POST['data_prazo']).'"';
    }
    
    $sql .= ' WHERE id = '.$id_chamado;
    
    $resultado = mysqli_query($con, $sql);

    if ($resultado) {
        $mensagem = '<p class="alert alert-success">Chamado alterado com sucesso!</p>';
    } else {
        $mensagem = '<p class="alert alert-danger">O chamado não foi alterado. <br>Por favor, tente mais tarde.</p>';
    }
    
    $_GET['id'] = $id_chamado;
    
    echo $mensagem;
}

if (isset($_GET['id'])) {
    
    $codigo = mysqli_real_escape_string($con, $_GET['id']);
    
    $sql = 'SELECT * FROM chamado WHERE id = '. $codigo;
    
    $resultado = mysqli_query($con, $sql);
    
    $chamado = mysqli_fetch_assoc($resultado);
?>

<h1 class="page-header">Visualizar chamado</h1>

 <div class="form-horizontal" style="margin: 15px 15px 15px 15px">
        <form method="post" action="chamado_visual.php">
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="codigo">Código do chamado</label>
                        <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $chamado['id']; ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="status">Status</label>
                        <?php
                            $sql = 'SELECT * FROM status_chamado';
                            $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
                            echo '<select name="status" id="status" class="form-control" '.(($_SESSION['nivel'] == 2) || ($chamado['id_status'] == 4) ? 'disabled' : '').'> <option>Selecione...</option>';
                            while ($row = mysqli_fetch_array($resultado)) {
                                echo "<option value='".$row['id']."' ".($chamado['id_status'] == $row['id'] ? 'selected' : '').">".$row['descricao']."</option>";
                            }
                            echo '</select>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-4">
                        <label for="solicitante">Solicitante</label>
                        <?php
                        
                        $sql = 'SELECT * FROM funcionario';
                        
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
                        echo '<select name="solicitante" id="solicitante" class="form-control" '.(($_SESSION['nivel'] == 2) || ($chamado['id_status'] == 4) ? 'disabled' : '').'> <option>Selecione...</option>';
                        
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo "<option value='".$row['id']."' ".($chamado['id_solicitante'] == $row['id'] ? 'selected' : '').">".$row['nome']."</option>";
                        }
                        echo '</select>';
                        
                        ?>
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
                        
                        $sql = 'SELECT * FROM funcionario WHERE id_nivel = 1';
                        
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
                        echo '<select name="responsavel" id="responsavel" class="form-control" '.(($_SESSION['nivel'] == 2) || ($chamado['id_status'] == 4) ? 'disabled' : '').'> <option>Selecione...</option>';
                        
                        while ($row = mysqli_fetch_array($resultado)) {
                            echo "<option value='".$row['id']."' ".($chamado['id_responsavel'] == $row['id'] ? 'selected' : '').">".$row['nome']."</option>";
                        }
                        echo '</select>';
                        
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <div class="col-md-2">
                    <label for="prioridade">Prioridade</label>                    
                    <?php

                    $sql = 'SELECT * FROM prioridade';

                    $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
                    echo '<select name="prioridade" id="prioridade" class="form-control" '.(($_SESSION['nivel'] == 2) || ($chamado['id_status'] == 4) ? 'disabled' : '').'> <option>Selecione...</option>';

                    while ($row = mysqli_fetch_array($resultado)) {
                        echo "<option value='".$row['id']."' ".($chamado['id_priori'] == $row['id'] ? 'selected' : '').">".$row['descricao']."</option>";
                    }
                    echo '</select>';

                    ?>
                    </div>
                    <div class="col-md-2">
                        <label for="data_inc">Abertura</label>
                        <input type="text" class="form-control" name="data_inc" id="data_inc" value="<?php echo convertData('dma', $chamado['data_inc']); ?>" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="data_prazo">Prazo</label>
                        <input type="text" class="form-control" name="data_prazo" id="data_prazo" value="<?php echo convertData('dma', $chamado['data_prazo']); ?>" <?= (($_SESSION['nivel'] == 2) || ($chamado['id_status'] == 4) ? 'readonly' : ''); ?>>
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
                    <textarea class="form-control" name="observacao" id="observacao" readonly><?php echo $chamado['observacao']; ?></textarea>
                </div>
            </div>
            <?php if (($_SESSION['nivel'] == 2) || ($chamado['id_status'] <> 4)) {
                echo '<div class="row">
                    <div class="form-group col-md-5">
                        <a class="btn btn-default" href="dashboard_index.php">Voltar</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </div>';
            }
            ?>
            <input type="hidden" name="salvar" value="1">
            <input type="hidden" name="id_chamado" value="<?= $chamado['id'];?>">
        </form>
            <div class="row">
                <div class="panel panel-default">
                    <h4 class="panel-heading"><i class="fa fa-history" aria-hidden="true"></i> Histórico do chamado</h4>
                    <?php
                        echo '<div class="panel-body">';
                        
                        if ($_SESSION['id_usuario'] == $chamado['id_solicitante'] OR $_SESSION['id_usuario'] == $chamado['id_responsavel']){
                        echo '  <div class="panel-heading">
                                    <form id="form_historico" class="form-vertical">
                                        <div class="row">
                                            <div class="form-group col-md-5">
                                                <label for="descricao_hist">Descrição</label>
                                                <input type="text" class="form-control" name="descricao_hist" id="descricao_hist" placeholder="Descrição">
                                            </div>
                                        </div>
                                        <input type="hidden" name="id_chamado" id="id_chamado" value="'.$chamado['id'].'">
                                        <div id="div_result">
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-2">
                                            <button class="btn btn-primary" onclick="return enviarHistorico()">Incluir histórico</button>
                                            </div>
                                        </div>                                    
                                    </form>
                                </div>';
                        }
                        $sql = 'SELECT * FROM historico WHERE id_chamado = '.$chamado['id'].' ORDER BY data_inc DESC, hora_inc DESC';
                        $rhistorico = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($rhistorico)) {
                            $sql = 'SELECT * FROM funcionario WHERE id = '.$row['id_funcionario'];
                            $resultado = mysqli_query($con, $sql);
                            $funcionario = mysqli_fetch_assoc($resultado);
                            echo '<div class="list-group-item"> <h4 class="list-group-item-heading "><strong>'.$funcionario['nome'].'</strong></h4> <h6 class="list-group-item-heading text-muted">'.convertData('dma', $row['data_inc']).' '. $row['hora_inc'] .'</h6> <p class="list-group-item-text">'.$row['descricao'].'</p> </div>';
                        }
                        echo'</div>';
                    ?>
                </div>
            </div>
    </div>
    <script>
        function enviarHistorico() {
            if ($("#descricao_hist").val() == '') {
                $("#descricao_hist").focus();
            } else {
                $.ajax({
                    type: "POST",
                    url: "historico_save.php",
                    data: {
                        descricao_hist: $('#descricao_hist').val(),
                        id_chamado: $('#id_chamado').val(),
                        id_funcionario: $('#id_funcionario').val()
                    },
                    success: function( data )
                    {
                        if (data == 'OK') {
                            alert('Histórico inserido com sucesso!');
                            location.reload();
                        } else if (data == 'ERROR') {
                            alert('Falha ao cadastrar histórico...');
                        }
                    }
                });
            }
            return false;
        }
    </script>
<?php
}else {
    include_once './includes/error_content.php';
}
include_once './includes/rodape.php';