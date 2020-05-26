<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link rel="stylesheet" href="item.style.css" type="text/css">
    <title>Document</title>
</head>
<body>
<div class="mr-20 mr-30-md mr-40-lg mr-50-xl ml-20 ml-30-md ml-40-lg ml-50-xl">
    <h1><?php echo $item["name"] ?></h1>

    <div>
        <?php echo $item["description"] ?>
    </div>

    <div>
        <h2>Comments:</h2>
        <h4>Make a comment</h4>
        <form action="comment" method="post">

            <input type="text" data-role="input" id="itemId" name="itemId" value="<?php echo $item["id"] ?>"
                   style="width: 5%" disabled>

            <label>Username</label>
            <input type="text" data-role="input" id="username" name="username" style="width: 20%">

            <label>Password</label>
            <input type="password" data-role="input" id="password" name="password" style="width: 20%">

            <label>Comment</label>
            <textarea data-role="textarea" id="comment" name="comment" style="width: 20%"></textarea>

            <button class="button mt-5" style="width: 20%%;" type="submit">Post</button>
        </form>
    </div>
</div>
</body>
</html>
