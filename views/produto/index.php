<?php foreach ($data['produtos'] as $produto):?>
<div >
    <a href="<?= Lib\App::getRouter()->getUrl('produto','ver',[$produto->getIdProduto()]);?>"><?=$produto->getNome()?></a>
</div>
<?php endforeach; ?>


