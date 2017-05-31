<?php    
require_once './includes/conexao.php';
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';
$op = (isset($_GET['id']) ? "Editar" : "Adicionar");
$mensagem = '';

    if (isset($_GET['id'])) {
        if (isset($_GET['enviou'])) {
            $id = mysqli_escape_string($con, $_GET['id']);
            $nome = mysqli_escape_string($con, $_GET['nome']);
            $data_nasc = mysqli_escape_string($con, $_GET['data_nasc']);
            $email = mysqli_escape_string($con, $_GET['email']);
            $senha = mysqli_escape_string($con, $_GET['senha']);
            $telefone = mysqli_escape_string($con, $_GET['telefone']);
            $ramal = mysqli_escape_string($con, $_GET['ramal']);
            $celular = mysqli_escape_string($con, $_GET['celular']);
            $departamento = mysqli_escape_string($con, $_GET['departamento']);
            $cargo = mysqli_escape_string($con, $_GET['cargo']);
            $nivel = mysqli_escape_string($con, $_GET['nivel']);

            $sql = "UPDATE funcionario SET nome = '$nome', data_nasc = '$data_nasc', email= '$email', senha='$senha', telefone='$telefone', ramal='$ramal', celular='$celular', id_departamento=$departamento, cargo='$cargo', id_nivel=$nivel WHERE id = $id";

            
            $resultado = mysqli_query($con, $sql);

            if ($resultado) {
                $mensagem = '<p class="alert alert-success">Cadastro concluído com sucesso!</p>';
            } else {
                $mensagem = '<p class="alert alert-danger">O cadastro não foi efetuado. <br>Por favor, tente mais tarde.</p>';
            }
        }
    
    $sql = 'SELECT * FROM funcionario WHERE id ='.$_GET['id'];
    
    $resultado = mysqli_query($con, $sql);
    $funcionario = mysqli_fetch_assoc($resultado);
}
?>
    <h1 class="page-header">Funcionário (<?= $op; ?>)</h1>
    <?php
    echo $mensagem;
    ?>
    
    <div class="form-horizontal" style="margin: 15px 15px 15px 15px">
        <form method="get" action="funcionario_edit.php">
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="<?= $funcionario['nome']; ?>" placeholder="Nome">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="data_nasc">Data de nascimento</label>
                    <input type="date" class="form-control" name="data_nasc" id="data_nasc" value="<?= $funcionario['data_nasc']; ?>" >
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $funcionario['email']; ?>" placeholder="Email">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha" value="<?= $funcionario['senha']; ?>" placeholder="Senha">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="telefone">Telefone</label>
                    <input type="tel" class="form-control" name="telefone" id="telefone" value="<?= $funcionario['telefone']; ?>" placeholder="Telefone">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="ramal">Ramal</label>
                    <input type="text" class="form-control" name="ramal" id="ramal" value="<?= $funcionario['ramal']; ?>" placeholder="Ramal">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="celular">Celular</label>
                    <input type="tel" class="form-control" name="celular" id="celular" value="<?= $funcionario['celular']; ?>" placeholder="Celular">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="departamento">Departamento</label>
                    <select name="departamento" id="departamento" class="form-control">
                        <option>Selecione...</option>
                        <?php
                        $sql = 'SELECT * FROM departamento';
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        while ($l_depart = mysqli_fetch_array($resultado)) {
                            echo '<option value="'.$l_depart['id'].'" '.($funcionario['id_nivel'] == $l_depart['id'] ? "selected='true'" : "").'>'.$l_depart['descricao'].'</option>';
                        }
                        ?>    
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="cargo">Cargo</label>
                    <input type="text" class="form-control" name="cargo" id="cargo" value="<?= $funcionario['cargo']; ?>" placeholder="Cargo">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="nivel">Nível</label>
                    <select name="nivel" id="nivel" class="form-control">
                        <option>Selecione...</option>
                        <?php
                        $sql = 'SELECT * FROM nivel';
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        while ($l_nivel = mysqli_fetch_array($resultado)) {
                            echo '<option value="'.$l_nivel['id'].'" '.($funcionario['id_nivel'] == $l_nivel['id'] ? "selected='true'" : "").'>'.$l_nivel['descricao'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <input type="hidden" name="id" id="id" value="<?= $_GET['id']; ?>">
            <input type="hidden" name="enviou" id="enviou" value="true">
            <div class="row">
                <a class="btn btn-default" href="funcionarios.php">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
<?php
include_once './includes/rodape.php';