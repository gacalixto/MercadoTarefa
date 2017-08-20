<?php
$produto=$data['produto'];
?>
<h2>Nome do Produto :<?=$produto->getNome()?></h2>
<p> Valor: R$<?=$produto->getValor()?></p>
<p> Descrição: <?=$produto->getDescricao()?></p>

