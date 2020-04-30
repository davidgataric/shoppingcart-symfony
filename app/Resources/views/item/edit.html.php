<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link rel="stylesheet" href="item.style.css" type="text/css">
    <title>Shopping Cart edit</title>
</head>
<body>
<div class="mr-20 mr-30-md mr-40-lg mr-50-xl ml-20 ml-30-md ml-40-lg ml-50-xl">

    <h1>Edit</h1>

    <form action="add" method="post">
        <label>Product</label>
        <input type="text" data-role="input" id="name" name="name" value="<?php echo $item['name'] ?>">

        <label>Amount</label>
        <input type="text" data-role="input" id="amount" name="amount" value="<?php echo $item['amount'] ?>">

        <button type="submit" class="button primary  mt-5">Submit</button>
    </form>

</div>
</body>
</html>
