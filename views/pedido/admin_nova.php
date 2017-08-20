
<!--   private $idProduto;
    private $nome;
    private $valor;
    private $descricao;
    private $disponivel;-->
    <h3> Novo Pedido</h3>
    <form method="POST" action="">
        <div class="form-group">
            <label for="titulo">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="" placeholder="Nome"/>
        </div>
        <div class="form-group">
            <label for="valor">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" value="" placeholder="Endereço"/>
        </div>
        <div class="form-group">
            <label for="descricao">Quantidade</label>
            <input type="text" name="quantidade" id="quantidade" class="form-control" value="" placeholder="Quantidade"/>
        </div>
        <div class="form-group">
            <label for="descricao">Código do Produto</label>
            <input type="text" name="prod" id="quantidade" class="form-control" value="" placeholder="cód.produto"/>
        </div>
        <input type="submit" class="btn btn-success" value="Criar"/>
        
    </form>

    