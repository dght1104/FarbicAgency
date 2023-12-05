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
    <link rel="stylesheet" href="../css/categories.css">
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
               <div class="page">    
                    <h2 class="heading">Categories</h2>
                    <hr class="top">
                <div class="main-strip">
                    <h6>Supplier No</h6>
                    <h6>Name</h6>
                    <h6>Address</h6>
                </div>
                <?php 
                     $sqlbolt="SELECT * FROM  `category`  ";
                     $querybolt = mysqli_query($conn, $sqlbolt);
                     while($row = mysqli_fetch_array($querybolt)){
                ?>
                <hr class="bottom">
                <div class="shipping">
                    <p><?php echo $row['cate_code']?></p>
                    <p><?php echo $row['name']?></p>
                    <p><?php echo $row['color']?></p>
                </div>
                <?php }?> 
                <a href="properties_form.php" >
                    <button class="Btn" name="btnsubmit">
                        <span class="btnIcon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">Add</span>
                    </button>
                </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>