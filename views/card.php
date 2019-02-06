<? /**
 * @var \app\model\Products $product
 */
?>
<br><a href="/">Каталог</a><br>
<hr>

    <img src="/img/<?=$product->img?>" alt="pic" width="320px" height="240px">
<h1><?=$product->name?></h1>
<p><?=$product->description?></p>
<p>Стоимость: <?=$product->price?></p>
    <button class="action" data-id="<?=$product->id?>"> Купить (ajax) </button>

