<?php
/**
 * @var \app\model\Products $product
 */
?>

<?foreach($products as $product):?>

<b><a href="/product/card/?id=<?=$product['id']?>"><?=$product['name']?><br>
        <img src="/img/<?=$product['img']?>" alt="pic" height="240px" width="320px">
        </a></b>

<p><?=$product['description']?></p>
<p>Стоимость: <?=$product['price']?></p>
    <button class="action" data-id="<?= $product['id'] ?>"> Купить (ajax)</button>
<hr>
<?endforeach;?>