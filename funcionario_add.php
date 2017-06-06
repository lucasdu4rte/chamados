<?php    
require_once './includes/conexao.php';
include_once './includes/cabecalho.php';
include_once './includes/dashboard.php';
$mensagem = '';

if ($_POST) {
        $nome = mysqli_escape_string($con, $_POST['nome']);
        $data_nasc = mysqli_escape_string($con, $_POST['data_nasc']);
        $email = mysqli_escape_string($con, $_POST['email']);
        $senha = mysqli_escape_string($con, $_POST['senha']);
        $telefone = mysqli_escape_string($con, $_POST['telefone']);
        $ramal = mysqli_escape_string($con, $_POST['ramal']);
        $celular = mysqli_escape_string($con, $_POST['celular']);
        $departamento = mysqli_escape_string($con, $_POST['departamento']);
        $cargo = mysqli_escape_string($con, $_POST['cargo']);
        $nivel = mysqli_escape_string($con, $_POST['nivel']);
        
        $sql = "INSERT INTO funcionario (nome, data_nasc, email, senha, telefone, ramal, celular, id_departamento, cargo, id_nivel) VALUES('$nome', '$data_nasc', '$email', '$senha', '$telefone', '$ramal', '$celular', $departamento, '$cargo', $nivel)";
        
        $resultado = mysqli_query($con, $sql);
        
        if ($resultado) {
            $mensagem = '<div class="row"><p class="alert alert-success">Cadastro concluído com sucesso! 
                            
                                <a class="btn btn-default" href="funcionarios.php">Voltar</a>
                            
                        </p></div>';
        } else {
            $mensagem = '<div class="row"><p class="alert alert-danger">O cadastro não foi efetuado. <br>Por favor, tente mais tarde.</p></div>';
        }
        
    }
?>
<script>
      function valida(form)
      {
       if (form.nome.value=="")   
       {
           alert("O campo [nome] é de preenchimento obrigatório");
           form.nome.focus();
           return false;
       }
       
       if (form.data_nasc.value=="")   
       {
           alert("O campo [data de nascimento] é de preenchimento obrigatório");
           form.data_nasc.focus();
           return false;
       }
       
       if (form.email.value=="")   
       {
           alert("O campo [email] é de preenchimento obrigatório");
           form.email.focus();
           return false;
       }
       
       if (form.telefone.value=="")   
       {
           alert("O campo [telefone] é de preenchimento obrigatório");
           form.telefone.focus();
           return false;
       }
       
       if (form.celular.value=="")   
       {
           alert("O campo [celular] é de preenchimento obrigatório");
           form.celular.focus();
           return false;
       }
       
        if (form.departamento.value=="0")   
       {
           alert("Selecione seu departamento.");
           form.departamento.focus();
           return false;
       }
       
         if (form.cargo.value=="")   
       {
           alert("O campo [cargo] é de preenchimento obrigatório");
           form.cargo.focus();
           return false;
       }
       
       if (form.nivel.value=="0")   
       {
           alert("Selecione um nivel de acesso ao funcionário.");
           form.nivel.focus();
           return false;
       }
       
       if (form.senha.value=="")   
       {
           alert("O campo [senha] é de preenchimento obrigatório.");
            form.senha.focus();
            return false;
        }

    }
</script>
    <h1 class="page-header">Funcionário (Adicionar)</h1>
    
    <div class="form-horizontal" style="margin: 15px 15px 15px 15px">
        <?= $mensagem; ?>
        <form onsubmit="return valida(this);" method="post" action="funcionario_add.php" name="formulario_func">
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" value="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="data_nasc">Data de nascimento</label>
                    <input type="text" class="form-control" name="data_nasc" id="data_nasc">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="telefone">Telefone</label>
                    <input type="tel" class="form-control" name="telefone" id="telefone" placeholder="Telefone" >
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="ramal">Ramal</label>
                    <input type="text" class="form-control" name="ramal" id="ramal" placeholder="Ramal">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="celular">Celular</label>
                    <input type="tel" class="form-control" name="celular" id="celular" placeholder="Celular"  value="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="departamento">Departamento</label>
                    <select name="departamento" id="departamento" class="form-control">
                        <option selected value="0">Selecione...</option>
                        <?php
                        $sql = 'SELECT * FROM departamento';
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        while ($l_depart = mysqli_fetch_array($resultado)) {
                            echo "<option value='".$l_depart['id']."'>".$l_depart['descricao']."</option>";
                        }
                        ?>    
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="cargo">Cargo</label>
                    <input type="text" class="form-control" name="cargo" id="cargo" placeholder="Cargo">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="nivel">Nível</label>
                    <select name="nivel" id="nivel" class="form-control">
                        <option value="0">Selecione...</option>
                        <?php
                        $sql = 'SELECT * FROM nivel';
                        $resultado = mysqli_query($con, $sql) or die(mysqli_error($con));

                        while ($l_nivel = mysqli_fetch_array($resultado)) {
                            echo "<option value='".$l_nivel['id']."'>".$l_nivel['descricao']."</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-5">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" value="">
                </div>
            </div>
            <div class="row">
                <a class="btn btn-default" href="funcionarios.php">Voltar</a>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </form>
    </div>
    
<?php
include_once './includes/rodape.php';