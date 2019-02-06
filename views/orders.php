<?php
/**
 * Created by IntelliJ IDEA.
 * User: ахма
 * Date: 23.01.2019
 * Time: 0:18
 */
?>
<h4>заказы</h4>
<?foreach($orders as $order):?>
    <h5><?=$order['username']?></h5><br>
    <p><?=$order['email']?></p><br>
    <a href="/orders/details/">показать детали</a>
    <button class="delete" data-id="<?= $order['id'] ?>"> Удалить</button>
    <hr>
<?endforeach;?>
