<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/admin/bills/style.css">
    <link rel="stylesheet" href="../../css/admin/detailbills/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .container {
        margin: 0 auto;
        margin-top: 50px;
        display: flex;
        justify-content: center;
        /* align-items: center; */
        background-color: white;
        height: 20%;
        width: 65%;
        flex-flow: column nowrap;
        font: 10px "Times New Roman";
        border-radius: 20px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        font-size: 16px;

    }

    strong {
        font-size: 18px;
    }

    h2 {
        padding: 20px;
    }
    </style>
</head>

<body>
    <?php
    include "../../global.php";
    include "../../dao/pdo.php";
    include "../../dao/detail_bills.php";
    $detailbills = get_detail_bill($_GET['approveid']);
    ?>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../../admin/layouts/side-bar.php"
            ?>
            <?php
            $totalBill = 0;
            foreach ($detailbills as $item) {
            ?>
            <div class="container">
                <h2 class="bill" style="text-align: center;">HOÁ ĐƠN <br>
                    <p style="font-size: 16px; ">Mã hoá đơn: <?= $item["id_bill"] ?></p>
                </h2>

                <div class="info_bill">
                    <div class="info_bill1">
                        <p><strong>Tên người mua: </strong><?= $item["receiver_name"] ?></p>
                        <p><strong>SĐT :</strong><?= $item["receiver_phone"] ?></p>

                    </div>

                    <div class="info_bill2">
                        <p><strong>Địa chỉ: </strong><?= $item["receiver_address"] ?></p>
                        <p><strong>Ngày mua: </strong><?= $item['purchase_date'] ?></p>

                    </div>

                    <?php } ?>

                </div>
                <div class="manage-list_bills">
                    <form action="" method="post">
                        <table class="bills-table-list">
                            <hr>
                            <p style="text-align: center; font-weight:bold; font-size: 30px; color:#4d1ab8">SẢN PHẨM ĐÃ
                                ĐẶT MUA</p>
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $totalBill = 0;
                                    foreach ($detailbills as $item) {
                                    ?>
                                <tr>

                                    <td style="color: black;"><?= $item["name_product"] ?></td>
                                    <td style="color: black;"><?= number_format( $item["price"], 0, ',', '.') ?></td>
                                    <td style="color: black;"><?= $item["amount"] ?></td>
                                    <td style="color: black;">
                                        <?= number_format($totalBill += ($item['price']) * $item['amount'], 0, ',', '.')  ?>
                                    </td>

                                </tr>

                                <?php
                                    }
                                    ?>
                            </tbody>

                        </table>

                        <?php
                            $totalBill = 0;
                            foreach ($detailbills as $item) {
                            ?>
                        <div class="total">
                            <p style=" font-weight:bold">Tổng tiền:</p>
                            <p style="margin-left: 30px;">
                                <?= number_format($totalBill += ($item['price']) * $item['amount'], 0, ',', '.') . ' đ' ?>
                            </p>
                        </div>
                        <?php
                            }
                            ?>
                    </form>
                    <hr>

                    <h5
                        style="text-align: center; font-family:Arial, Helvetica, sans-serif;font-style:italic;padding:50px 0px">
                        Quý khách vui lòng kiểm tra thông tin trước khi thanh toán và xác nhận</h5>
                    <h5 style="text-align: center; font-weight:bold;">Chúc quý khách vui vẻ! Hẹn gặp lại</h5>

                </div>
            </div>
        </div>
    </div>

</body>

</html>