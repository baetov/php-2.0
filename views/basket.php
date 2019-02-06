<?php

?>

<h1>Корзина</h1>
<? foreach ($products as $product): ?>

    <a href="/product/card/?id=<?=$product['id_prod'] ?>"><img src="/img/<?=$product['img']?>" height="50px"width="80px" alt="img"></a>
    <br>
    <b><a href="/product/card/?id=<?=$product['id_prod'] ?>"><?= $product['name'] ?> </a></b>
    <p><?= $product['description'] ?></p>
    <p>Стоимость: <?= $product['price'] ?></p>
    <button class="delete" data-id="<?=$product['id_basket'] ?>"> Удалить (ajax)</button>
    <hr>
<? endforeach; ?>
<h4>чтобы продолжить покупку заполните форму</h4>
<form action="/orders/add/" method="post">
    <input type="text" placeholder="ваше имя" name="userName">
    <input type="email" name="email">
    <input type="submit"  value="оформить заказ">
</form>
<br>
<br>
<a href="/">Каталог</a>




