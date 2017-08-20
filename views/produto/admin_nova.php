
<!--   private $idProduto;
    private $nome;
    private $valor;
    private $descricao;
    private $disponivel;-->
    <h3> Novo Produto</h3>
    <form method="POST" action="">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="titulo" class="form-control" value="" placeholder="Nome"/>
        </div>
        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" id="valor" class="form-control" value="" placeholder="Valor"/>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="" placeholder="Descrição"/>
        </div>
        <div class="form-group">
            
            <input type="checkbox" name="disponivel" id="disponivel"  value="" placeholder="disponivel"/>
            <label for="disponivel">Disponível</label>
        </div>
        <input type="submit" class="btn btn-success" value="Criar"/>
        
   </form>
    