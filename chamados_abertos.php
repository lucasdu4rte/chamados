<?php
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';

require_once './includes/conexao.php';
include_once './includes/funcoes.php';
?>

<h1 class="page-header">Chamados Abertos</h1>

<div class="table-responsive" style="margin-top: 15px">
    <table class="table table-striped" id="mytable">
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery(table).DataTable();
} );
</script>
<?php
include_once './includes/rodape.php';
