<?php 
/* @var $pedido Models\Pedido*/
$pedido=$data['pedido'];
?>
<!--   private $idProduto;
    private $nome;
    private $valor;
    private $descricao;
    private $disponivel;-->
    <h3> Editar Pedido</h3>
    <form method="POST" action="">
        
        <div class="form-group">
            <input type="hidden" name="idProduto" value="<?=$pedido->getIdPedido()?>"/>
            <label for="titulo">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="<?=$pedido->getNome()?>" placeholder="Nome"/>
        </div>
        <div class="form-group">
            <label for="valor">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" value="<?=$pedido->getEndereco()?>" placeholder="Endereço"/>
        </div>
        <div class="form-group">
            <label for="descricao">Quantidade</label>
            <input type="text" name="quantidade" id="quantidade" class="form-control" value="<?=$pedido->getQuantidade()?>" placeholder="Quantidade"/>
        </div>
         <div class="form-group">
            <label for="descricao">Código do Produto</label>
            <input type="text" name="prod" id="quantidade" class="form-control" value="" placeholder="cód.produto"/>
        </div>
      
        <input type="submit" class="btn btn-success" value="Editar"/>
        
    </form>
    

