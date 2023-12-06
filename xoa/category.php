<?php include '../php/db_conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/category.css">
    <!-- <link rel="stylesheet" href="../js/search_option.js"> -->
    <title>Category</title>
    <link rel="stylesheet" href="../css/button.css">
</head>
<body>
    <div class="container-scroller">
        <?php include '../base/navbar.php';
        ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="content">
                <div class="search-field1">
                    <form action="../php/search_supplier.php" method="post" class="form-search-box">
                        <span style="padding-right: 5px;">Supplier:</span>
                        <select name="supplier" id="selectSupplier" class="select-supplier" >
                                <option value="-1"  >Select a supplier</option>
                                <?php
                                    $sqlsup ="SELECT `supplier`.`sup_code`, `supplier`.`name` FROM `supplier`;";
                                    $querysup = mysqli_query($conn, $sqlsup);
                                    while($row = mysqli_fetch_array($querysup)){
                                ?>    
                                    <option value="<?php echo $row['sup_code']?>"><?php echo $row['name']?></option>
                                 <?php     
                                }?>
                            </select>
                        <button type="submit" class="search-icon" style="margin-left: 5px;" id="searchButton" name="false">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
                <div class="result_receipt">
                    <div class="heading" style="font-size: 28px; font-weight:450;">Categories</div>
                    <hr class="top">
                    <div class="col-name">
                        <h6>Category No</h6>
                        <h6>Name</h6>
                        <h6>Color</h6>
                        <h6>Supplier</h6>
                    </div>
                    <?php 

                    if($idSupplier==1){
                        echo "fsdfsd";
                    }
                    
                     $sqlbolt="SELECT `category`.`cate_code`,`category`.`name`,`category`.`color`,`supplier`.`name` as sub_name 
                     FROM `category` INNER JOIN `supplier` WHERE `category`.`sup_code`=`supplier`.`sup_code`;";
                     $querybolt = mysqli_query($conn, $sqlbolt);
                     while($row = mysqli_fetch_array($querybolt)){
                ?>
                <hr class="bottom">       
                <a href="#">
                    <div class="shipping" style="background-color: <?php echo $row['color']?>;">
                        <p><?php echo $row['cate_code']?></p>
                        <p><?php echo $row['name']?></p>
                        <p><?php echo $row['color']?></p>
                        <p><?php echo $row['sub_name']?></p>
                    </div>
                </a>
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



    <script src="../js/search_option.js"></script>
</body>
</html>