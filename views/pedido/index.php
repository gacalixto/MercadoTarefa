<h3>Pedidos</h3>
<table class="table table-striped" style="width:400px  " > 
       <tbody>
        <?php foreach ($data['pedidos'] as $pedido):?>
        <tr>
            <td><?=$pedido->getNome()?>
            
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

