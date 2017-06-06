<?php
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';
require_once './includes/conexao.php';
?>  

<h1 class="page-header">Pesquisar Chamado</h1>
<div class="form-horizontal" style="margin: 15px 15px 15px">
    <form id="pesq_chamado" method="post" action="chamados_resultado.php">
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label for="codigo">Código do chamado</label>
                    <input type="text" name="codigo" id="codigo" class="form-control"/>
                </div>
                <div class="col-md-3">
                    <label for="status">Status do chamado</label>
                    <select name="status" id="status" class="form-control">
                        <option selected>Selecione...</option>
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
                    <input type="text" name="nome_solicitante" id="nome_solicitante" class="form-control"/>
                </div>
            </div>
        </div>        
        <div class="row">
            <div class="form-group">
                <div class="col-md-3">
                    <label>Data de abertura de</label>
                    <input type="date" name="inicio_chamado" id="inicio_chamado" class="form-control"/>
                </div>
                <div class="col-md-3">
                    <label>Data de abertura ate</label>
                    <input type="date" name="fim_chamado" id="fim_chamado" class="form-control" value="<?php echo date('d/m/Y'); ?>"/>
                </div>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form> 
</div>    


<?php
include_once './includes/cabecalho.php';
?>
