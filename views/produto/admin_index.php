<h3>Produtos</h3>
<table class="table table-striped" style="width:400px  " > 
       <tbody>
        <?php foreach ($data['produtos'] as $produto):?>
        <tr>
            <td><?=$produto->getNome()?></td>
            <td class="text-right">
               <a href="<?= Lib\App::getRouter()->getUrl('produto','editar',[$produto->getidProduto()])?>"
                   class="btn btn-sm btn-warning">
                   Editar
               </a>
             
             
               <a href="<?= Lib\App::getRouter()->getUrl('produto','excluir',[$produto->getidProduto()])?>"
                   class="btn btn-sm btn-danger"
                   onclick="return confirmaExcluir()">
                   
                   Excluir
               </a>
             </td>
        </tr>
              <?php endforeach; ?>
            </tbody> 
</table>
<br/>
   <div>
       <a href="<?= Lib\App::getRouter()->getUrl('produto','nova')?>"
                   class="btn btn-sm btn-success">
                   Novo Produto
               </a>
   </div>

