<?php 
/* @var $produto Models\Produto*/
$funcionario=$data['funcionario'];
?>

    <h3> Editar Funcionário</h3>
    <form method="POST" action="">
        <div class="form-group">
                   <input type="hidden" name="idFuncionario" value="<?=$funcionario->getIdFuncionario()?>"/>

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?=$funcionario->getNome()?>" placeholder="Nome"/>
        </div>
        <div class="form-group">
            <label for="ususario">Usuario</label>
            <input type="text" name="usuario" id="usuario" class="form-control" value="<?=$funcionario->getUsuario()?>" placeholder="Valor"/>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" value="<?=$funcionario->getSenha()?>" placeholder="Senha"/>
        </div>
        <div class="form-group">
            <label for="cargo">Cargo</label>
            <input type="text" name="cargo" id="cargo" class="form-control" value="<?=$funcionario->getCargo()?>" placeholder="cargo"/>
        </div>
        <input type="submit" class="btn btn-success" value="Editar"/>
        
    </form>
    

