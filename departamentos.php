<?php
require_once './includes/conexao.php';
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';
?>
        <h1 class="page-header">Departamentos</h1>
        
        <h2 class="sub-header">Todos departamentos</h2>
        <a class="btn btn-primary" href="departamento_add.php">Adicionar novo</a>
        <div class="table-responsive" style="margin-top: 15px; min-width: 270px; max-width: 50%">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Descrição</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT * FROM departamento';
                    $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                    while ($row = mysqli_fetch_array($resultado)) {
                        echo "<tr><td><a href='departamento_edit.php?id=" . $row['id'] . "'>" . $row['id'] . " </a></td>
                            <td>" . $row['descricao'] . "</td>
                            <td>
                            <a class='btn btn-warning btn-xs' href='departamento_edit.php?id=" . $row['id'] . "'><i class='fa fa-trash-o' aria-hidden='true'></i> Editar</a>
                            <a class='btn btn-danger btn-xs' href='departamento_exc.php?id=" . $row['id'] . "''><i class='fa fa-pencil' aria-hidden='true'></i> Excluir</a></td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
<?php
include_once './includes/rodape.php';
