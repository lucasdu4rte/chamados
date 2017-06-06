<?php
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';

require_once './includes/conexao.php';
include_once './includes/funcoes.php';
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6 " style="border: #bcddff solid 1px;  min-width: 300px; min-height: 200px;">
                <h4>Chamados Abertos</h4>
                <div class="table-responsive" style="margin-top: 15px">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Código Chamado</th>
                                <th>Solicitante</th>
                                <th>Abertura</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = 'SELECT * FROM chamado WHERE id_status = 1';
                            $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));
                            if (mysqli_num_rows($resultado) > 0) {
                                while ($row = mysqli_fetch_array($resultado)) {
                                    // Selecionando informações do solicitante
                                    $sql = 'SELECT * FROM funcionario WHERE id = ' . $row['id_solicitante'];
                                    $rsolicitante = mysqli_query($con, $sql);
                                    $solicitante = mysqli_fetch_assoc($rsolicitante);

                                    // Selecionando status do chamado 
                                    $sql = 'SELECT * FROM status_chamado WHERE id = ' . $row['id_status'];
                                    $rstatus = mysqli_query($con, $sql);
                                    $status = mysqli_fetch_assoc($rstatus);

                                    echo "<tr><td>" . $row['id'] . "</td>
                                    <td>" . $solicitante['nome'] . "</td>
                                    <td>" . convertData('dma', $row['data_inc']) . "</td>
                                    <td>" . $row['descricao'] . "</td>
                                    <td>" . $status['descricao'] . "</td>
                                    <td><a class='btn btn-default btn-xs' href='chamado_visual.php?id=" . $row['id'] . "'><i class='fa fa-eye'></i> Visualizar</a></td>
                                </tr>";
                                }
                            } else {
                                echo '<tr><td>Nenhum resultado foi encontrado.</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6" style="border: #bcddff solid 1px; min-width: 300px; min-height: 200px;">
                <h4>Chamados em atendimento</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6" style="border: #bcddff solid 1px;  min-width: 300px; min-height: 200px;">
                <h4>Chamados concluídos está semana</h4>
                
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6" style="border: #bcddff solid 1px;  min-width: 300px; min-height: 200px;">
                <h4>Pesquisar Chamado</h4>
                <div class="col-md-6">
                    <label for="codigo">Código do chamado</label>
                    <input type="text" name="codigo" id="codigo" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="row">

        </div>
        <a href="#top" class="fa fa-arrow-circle-up" aria-hidden="true"></a>
    </div>
</div>

<?php
include_once './includes/rodape.php';
