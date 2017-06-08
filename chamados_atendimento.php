<?php
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';

require_once './includes/conexao.php';
include_once './includes/funcoes.php';
?>
<h1 class="page-header">Chamados em atendimento</h1>

<div class="table-responsive" style="margin-top: 15px">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Código Chamado</th>
                <th>Solicitante</th>
                <th>Data Abertura</th>
                <th>Descrição</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = 'SELECT * FROM chamado WHERE id_status = 2 AND id_status = 3';
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
                                    <td><a class='btn btn-default btn-xs' href='chamado_visual.php?id=".$row['id']."'><i class='fa fa-eye'></i> Visualizar</a></td>
                                </tr>";
                }
            } else {
                echo '<tr><td>Nenhum resultado foi encontrado.</td></tr>';
            }
            
            ?>
        </tbody>
    </table>
</div>
<?php
include_once './includes/rodape.php';
