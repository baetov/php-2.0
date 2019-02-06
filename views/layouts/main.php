<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

Хедер<br>
<? if ($auth) : ?>
    Добро пожаловать: <?= $username ?> <a href="/auth/logout/">Выход</a>
    <br>
    <? if ($isAdmin) : ?>
        <a href="/orders/">Админка</a>
    <? endif; ?>
<? else: ?>
    <form action="/auth/login/" method="post">
        <input type="text" name="login">
        <input type="password" name="pass">
        <input type="submit" value="Войти">
    </form>
<? endif; ?>
<br>
<br>
В <a href="/basket/">корзине </a> <?= $count ?>
<hr>
<?=$content;?>
<p>футер</p>

<script>
    $(document).ready(function(){
        $(".action").on('click', function(){
            var id = $(this).attr('data-id')
            $.ajax({
                url: "/product/buy/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id
                },
                error: function() {alert('error');},
                success: function(answer){
                    {window.location.reload()}
                }

            })
        });
    });

    $(document).ready(function(){
        $(".delete").on('click', function(){
            var id = $(this).attr('data-id')
            $.ajax({
                url: "/basket/delete/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id
                },
                error: function() {alert('error');},
                success: function(answer){
                    {window.location.reload()}
                }

            })
        });
    });

    $(document).ready(function(){
        $(".delete").on('click', function(){
            var id = $(this).attr('data-id')
            $.ajax({
                url: "/orders/delete/",
                type: "POST",
                dataType : "json",
                data:{
                    id: id
                },
                error: function() {alert('error');},
                success: function(answer){
                    {window.location.reload()}
                }

            })
        });
    });

</script>
</body>
</html>