<?php
require_once './includes/conexao.php';
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';
?>
        <h1 class="page-header">Funcionários</h1>
        
        <h2 class="sub-header">Todos funcionários</h2>
        <a class="btn btn-primary" href="funcionario_add.php?op=add">Adicionar novo</a>
        <div class="table-responsive" style="margin-top: 15px">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Departamento</th>
                        <th>Nível</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT * FROM funcionario WHERE status = "s"';
                    $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                    while ($row = mysqli_fetch_array($resultado)) {
                        //Selecionando descrição do nivel
                        $sql = 'SELECT * FROM nivel WHERE id = '.$row['id_nivel'];
                        $rnivel = mysqli_query($con, $sql);
                        $nivel = mysqli_fetch_assoc($rnivel);

                        //Selecionando descrição departamento
                        $sql = 'SELECT * FROM departamento WHERE id = '.$row['id_departamento'];
                        $rdepart = mysqli_query($con, $sql);
                        $departamento = mysqli_fetch_assoc($rdepart);

                        echo "<tr><td><a href='funcionario_edit.php?id=" . $row['id'] . "'>" . $row['id'] . " </a></td>
                            <td>" . $row['nome'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $departamento['descricao']. "</td>
                            <td>" . $nivel['descricao']. "</td>
                            <td>
                            <td>
                                <a class='btn btn-warning btn-xs' href='chamados_edit.php?id=" . $row['id'] . "'><i class='fa fa-pencil' aria-hidden='true'></i> Editar</a>
                                <a class='btn btn-danger btn-xs' href='chamados_exc.php?id=" . $row['id'] . "''><i class='fa fa-trash-o' aria-hidden='true'></i> Excluir</a></td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
<?php
include_once './includes/rodape.php';
