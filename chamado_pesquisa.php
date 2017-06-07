<?php
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';

require_once './includes/conexao.php';
include_once './includes/funcoes.php';
?>  

<script>
    function valida(form)
    {
        if (form.codigo.value == "") ||
            (form.solicitante.value == "")
        {
            alert("Digite um código ou o nome do solicitante.")
            form.codigo.focus();
            return false;
        }
    }

</script> 
<script src="http:js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery.noConflict();
    jQuery(function ($) {
        $("#inicio_abertura").mask("99/99/9999");
        $("#fim_abertura").mask("99/99/9999");
    });
</script> 

<h1 class="page-header">Pesquisar Chamado</h1>
<div class="form-horizontal" style="margin: 15px 15px 15px">
    <form id="pesq_chamado"  onsubmit="return valida(this);" method="post" action="chamados_resultado.php">
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label for="codigo">Código do chamado</label>
                    <input type="text" name="codigo" id="codigo" class="form-control"/>
                </div>
                <div class="col-md-3">
                    <label for="status">Status do chamado</label>
                    <select name="status" id="status" class="form-control">
                        <option value="0" selected>Selecione...</option>
                        <?php
                        $sql = 'SELECT * FROM status_chamado';
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        while ($l_status_chamado = mysqli_fetch_array($resultado)) {
                            echo "<option value='" . $l_status_chamado['id'] . "'>" . $l_status_chamado['descricao'] . "</option>";
                        }
                        ?>    
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-6">
                    <label>Nome do solicitante</label>
                    <select name="id_solicitante" id="id_solicitante" class="form-control">
                        <option value="0" selected>Selecione...</option>
                        <?php
                        $sql = 'SELECT * FROM funcionario';
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        while ($row = mysqli_fetch_array($resultado)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
                        }
                        ?>    
                    </select>
                </div>
            </div>
        </div>        
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label>Data de abertura inicial</label>
                    <input type="text" name="inicio_abertura" id="inicio_abertura" class="form-control"/>
                </div>
                <div class="col-md-3">
                    <label>Data de abertura final</label>
                    <input type="text" name="fim_abertura" id="fim_abertura" class="form-control" value="<?php echo date('d/m/Y'); ?>"/>
                </div>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form> 
</div>    


<?php
include_once './includes/rodape.php';
