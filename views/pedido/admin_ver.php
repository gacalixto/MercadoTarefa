<?php
$pedido=$data['pedido'];
?>
<h2>Nome do Pedido :<?=$pedido->getNome()?></h2>
<p> Endereço: <?=$pedido->getEndereco()?></p>
<p> Quantidade: <?=$pedido->getQuantidade()?></p>
<p>Nome do Produto:<?= ($pedido->getProduto()->getNome())?></p>



