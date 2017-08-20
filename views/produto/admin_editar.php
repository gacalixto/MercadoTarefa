<?php 
/* @var $produto Models\Produto*/
$produto=$data['produto'];
?>

    <h3> Editar Produto</h3>
    <form method="POST" action="">
        <input type="hidden" name="idProduto" value="<?=$produto->getIdProduto()?>"/>
        <div class="form-group">
            <label for="titulo">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?=$produto->getNome()?>" placeholder="Nome"/>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="value" class="form-control" value="<?=$produto->getValor()?>" placeholder="Valor"/>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="<?=$produto->getDescricao()?>" placeholder="Descrição"/>
        </div>
        <div class="form-group">
            
            <input type="checkbox" name="disponivel" id=""  <?=($produto->getNome() ?'checked=""': '')?>/>
            <label for="disponivel">Disponível</label>
        </div>
        <input type="submit" class="btn btn-success" value="Editar"/>
        
    </form>
    

