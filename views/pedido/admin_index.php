<h3>Pedidos</h3>
<table class="table table-striped" style="width:400px  " > 
       <tbody>
        <?php foreach ($data['pedidos'] as $pedido):?>
        <tr>
            <td><?=$pedido->getNome()?></td>
            <td class="text-right">
               <a href="<?= Lib\App::getRouter()->getUrl('pedido','editar',[$pedido->getidPedido()])?>"
                   class="btn btn-sm btn-warning">
                   Editar
               </a>
             
             
               <a href="<?= Lib\App::getRouter()->getUrl('pedido','excluir',[$pedido->getidPedido()])?>"
                   class="btn btn-sm btn-danger"
                   onclick="return confirmaExcluir()">
                   
                   Excluir
               </a>
                <a href="<?= Lib\App::getRouter()->getUrl('pedido','ver',[$pedido->getidPedido()])?>"
                   class="btn btn-sm btn-danger">
              
                   
                   Ver
               </a>
             </td>
        </tr>
              <?php endforeach; ?>
            </tbody> 
</table>
<br/>
   <div>
       <a href="<?= Lib\App::getRouter()->getUrl('pedido','nova')?>"
                   class="btn btn-sm btn-success">
                   Novo Pedido
               </a>
   </div>

