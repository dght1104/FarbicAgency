<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><link rel="stylesheet" href="../css/button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/supplier_form.css">
    <link rel="stylesheet" href="../css/prd.css">
    <title>Product</title>
</head>
<body>
<?php
 include '../php/db_conn.php';
?>
    <div class="container-scroller">
        <?php include '../base/navbar.php'; ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="content-product">
            <?php 
                $sqlbolt="SELECT * FROM `bolt` INNER JOIN `category` WHERE `bolt`.`cate_code`=`category`.`cate_code`; ";
                $querybolt = mysqli_query($conn, $sqlbolt);
                while($row = mysqli_fetch_array($querybolt)){
            ?>
                <a href="checkout.php">
                    <div class="prd">
                        <div class="ctn">
                            <div class="name">
                                <?php echo $row['name']?>
                            </div>
                            <div class="price">
                                <div class="box">
                                    <?php echo $row['cost']?>
                                </div>
                            </div>
                        </div>
                        <div class="blur">
                            <i class="fa fa-gear" style="font-size:24px"></i>
                        </div>
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>