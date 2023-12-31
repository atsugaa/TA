<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("Location: ../index.php");
        exit();
    }
    require_once("../base.php");
    require_once(BASEPATH . "/app/database.php");
    $orders = getOrderDetailData($_GET['p']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOYStore</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body class="order_body">
    <?php include("../../assets/inc/navbar.inc") ?>
    <div class="order_detail">
        <table>
            <tr>
                <th>
                    Produk
                </th>
                <th>
                    Harga
                </th>
                <th>
                    Jumlah
                </th>
                <th>
                    Total
                </th>
            </tr>
            <?php foreach($orders as $order){ $products = getAllData("product",$order["PRODUCT_ID"]);?>
            <tr class="row_order_detail">
                <td>
                    <div class="img_order_detail">
                        <div class="img_icon_order_detail">
                            <img src="<?= BASEURL; ?>/assets/images/products/<?= $products[0]["PRODUCT_IMG"]; ?>">
                        </div>
                        <div class="namapro_order_detail">
                            <?= $products[0]["PRODUCT_NAME"]?>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="price_order_detail">
                        <?= $products[0]["PRODUCT_PRICE"]?>
                    </div>
                </td>
                <td>
                    <div class="qty_order_detail">
                        <?= $order["QTY"]?>
                    </div>
                </td>
                <td>
                    <div class="total_order_detail">
                        <?php $sum = $products[0]["PRODUCT_PRICE"]*$order["QTY"]?>
                        <?= "Rp " . number_format($sum, 0, ',', '.'); ?>
                    </div>
                </td>
                <td class="del_order"><a class="x_order" href="removeOrder_detail.php?id=<?= $order["ORDER_DETAIL_ID"] ?>">&#x292c;</a></td>
            </tr>
            <?php }; ?>
        </table>
    </div>

    <?php include("../../assets/inc/footer.inc");?>
</body>
</html>