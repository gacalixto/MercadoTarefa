<h3>Funcionarios</h3>

<table class="table table-striped" style="width:400px  " > 
       <tbody>
        <?php foreach ($data['funcionarios'] as $funcionario):?>
        <tr>
            <td><?=$funcionario->getNome()?></td>
            <td class="text-right">
               <a href="<?= Lib\App::getRouter()->getUrl('funcionario','editar',[$funcionario->getidFuncionario()])?>"
                   class="btn btn-sm btn-warning">
                   Editar
               </a>
             
             
               <a href="<?= Lib\App::getRouter()->getUrl('funcionario','excluir',[$funcionario->getidFuncionario()])?>"
                   class="btn btn-sm btn-danger"
                   onclick="return confirmaExcluir()">
                   
                   Excluir
               </a>
             </td>
        </tr>
              <?php endforeach; ?>
            </tbody> 
</table>


<div>
       <a href="<?= Lib\App::getRouter()->getUrl('funcionario','nova')?>"
                   class="btn btn-sm btn-success">
                   Novo Funcionário
               </a>
   </div>
