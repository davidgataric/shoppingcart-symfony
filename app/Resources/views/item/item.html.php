<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">
    <link rel="stylesheet" href="item.style.css" type="text/css">
    <title>Shopping Cart</title>
</head>
<body>
<div class="mr-20 mr-30-md mr-40-lg mr-50-xl ml-20 ml-30-md ml-40-lg ml-50-xl">
    <table class="table">
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Amount</th>
            <th>Detail</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        foreach ($items as $item) {
            ?>
            <tr>
                <td class="text-center"><?php echo $item[0] ?></td>
                <td class="text-center"><?php echo $item[2] ?></td>
                <td class="text-center"><?php echo $item[1] ?></td>
                <td class="text-center">
                    <a href="detail?id=<?php echo $item[0] ?>" class="button primary">Detail</a>
                </td>
                <td class="text-center">
                    <a href="edit?id=<?php echo $item[0] ?>" class="button primary">Edit</a>
                </td>
                <td class="text-center">
                    <a href="delete?id=<?php echo $item[0] ?>" class="button alert">X</a>
                </td>
            </tr>
        <?php } ?>


    </table>

    <form action="add" method="post">
        <label>Product</label>
        <input type="text" data-role="input" id="name" name="name">

        <label>Amount</label>
        <input type="text" data-role="input" id="amount" name="amount">

        <button type="submit" class="button primary  mt-5">Add to Cart</button>
    </form>

</div>
</body>
</html>
