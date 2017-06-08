<?php
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';

require_once './includes/conexao.php';
include_once './includes/funcoes.php';
$mensagem = '';

if ($_POST) {
    $solicitante = mysqli_escape_string($con, $_POST['solicitante']);
    $telefone = mysqli_escape_string($con, $_POST['telefone']);
    $ramal = mysqli_escape_string($con, $_POST['ramal']);
    $abertura = convertData('amd', mysqli_escape_string($con, $_POST['data_inc']));
    $prazo = convertData('amd', mysqli_escape_string($con, $_POST['data_prazo']));
    $descricao = mysqli_escape_string($con, $_POST['descricao']);
    $tipo = mysqli_escape_string($con, $_POST['tipo']);
    $observacao = mysqli_escape_string($con, $_POST['observacao']);
    $anexo = mysqli_escape_string($con, $_POST['anexo']);

    $sql = "INSERT INTO chamado (id, id_responsavel, id_solicitante, telefone, ramal, data_inc, data_alt, 
        data_prazo, descricao, observacao, id_status, id_tipo) VALUES (NULL, NULL, $solicitante, '$telefone', '$ramal', '$abertura', 
         NULL, '$prazo', '$descricao', '$observacao', 1, $tipo)";

    $resultado = mysqli_query($con, $sql);

    if ($resultado) {
        $mensagem = '<div class="row"><p class="alert alert-success">Cadastro concluído com sucesso! 
                            
                                <a class="btn btn-default" href="painel.php">Voltar</a>
                            
                        </p></div>';
    } else {
        $mensagem = '<div class="row"><p class="alert alert-danger">O cadastro não foi efetuado. <br>Por favor, tente mais tarde.</p></div>';
    }
}
?>
<script>
    function valida(form)
    {
        if (form.solicitante.value == "0")
        {
            alert("Selecione o nome do solicitante.");
            form.solicitante.focus();
            return false;
        }

        if (form.prioridade.value == "0")
        {
            alert("Selecione um nivel de prioridade.");
            form.prioridade.focus();
            return false;
        }

        if (form.tipo.value == "0")
        {
            alert("Selecione um tipo de chamado.");
            form.tipo.focus();
            return false;
        }

        if (form.telefone.value == "")
        {
            alert("O campo [telefone] é de preenchimento obrigatório");
            form.telefone.focus();
            return false;
        }



        if (form.descricao.value == "")
        {
            alert("O campo [descricao] é de preenchimento obrigatório.");
            form.descricao.focus();
            return false;
        }



        if (form.observacao.value == "")
        {
            alert("O campo [observação] é de preenchimento obrigatório.");
            form.observacao.focus();
            return false;
        }
    }

</script>

 <script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
 <script src="js/jquery.maskedinput.js" type="text/javascript"></script>
 <script type="text/javascript">
    jQuery.noConflict();
    jQuery(function ($) {
        $("#telefone").mask("(99)9999-9999");
        $("#data_prazo").mask("99/99/9999");
    });
</script> 



<h1 class="page-header">Chamado (Adicionar)</h1>

<div class="form-horizontal" style="margin: 15px 15px 15px 15px">
    <?= $mensagem; ?>
    <form method="post" onsubmit="return valida(this);" action="chamado_add.php">
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label for="solicitante">Solicitante</label>
                    <?php
                        echo "<select name='solicitante' id='solicitante' class='form-control' ".($_SESSION['nivel'] <> 1 ? 'readonly' : ''). ">
                            <option selected value='0'>Selecione...</option>";

                            $sql = 'SELECT * FROM funcionario WHERE status = "s"';
                            $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                            while ($row = mysqli_fetch_array($resultado)) {
                                echo "<option value='" . $row['id'] . "'>". $row['nome'] . "</option>";
                            }
                        echo '</select>';
                    ?>
                </div>                          
            </div>
        </div>
        <div class="row">
            <div class="form-group">	
                <div class="col-md-3">
                    <label for="prioridade">Prioridade</label>
                    <select name="prioridade" id="prioridade" class="form-control">
                        <option selected value="0">Selecione...</option>
                        <?php
                        $sql = 'SELECT * FROM prioridade';
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        while ($row = mysqli_fetch_array($resultado)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['descricao'] . "</option>";
                        }
                        ?>    
                    </select>
                </div>      

                <div class="col-md-3">
                    <label for="tipo">Tipo do chamado</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option selected value="0">Selecione...</option>
                        <?php
                        $sql = 'SELECT * FROM tipo';
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        while ($row = mysqli_fetch_array($resultado)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['descricao'] . "</option>";
                        }
                        ?>    
                    </select>
                </div>
            </div>								
        </div>		                  
        <div class="row">    
            <div class="form-group">
                <div class="col-md-3">
                    <label for="telefone">Telefone</label>
                    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="(00) 0000-0000">
                </div>
                <div class="col-md-3">
                    <label for="ramal">Ramal</label>
                    <input type="text" class="form-control" name="ramal" id="ramal" placeholder="0000">
                </div>
            </div>
        </div>             
        <div class="row">
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label for="data_inc">Abertura</label>
                    <input type="text" class="form-control" name="data_inc" id="data_inc" value="<?php echo date('d/m/Y'); ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label for="data_prazo">Prazo</label>
                    <input type="text" class="form-control" name="data_prazo" id="data_prazo">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">       
                    <label for="descricao">Descrição</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Descrição">
                </div>
            </div>    
        </div>                    
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label for="observacao">Observação</label>
                    <textarea class="form-control" name="observacao" id="observacao"></textarea>
                </div>
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
