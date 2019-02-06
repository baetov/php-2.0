<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 23.01.2019
 * Time: 1:18
 */
?>
<h3>детали заказа</h3>
<? foreach ($products as $product): ?>
    <p><a href="/product/card/?id=<?=$product['id_prod'] ?>"><?= $product['name'] ?> </a></p>
    <p>Стоимость: <?= $product['price'] ?></p>
    <hr>
<? endforeach; ?>
