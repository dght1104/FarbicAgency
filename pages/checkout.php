<?php include '../php/db_conn.php'; ?>
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
    <link rel="stylesheet" href="../css/navbar_sidebar.css">
    <link rel="stylesheet" href="../css/prd_detail.css">
    <link rel="stylesheet" href="../css/checkout.css">
    <title>Product</title>
</head>
<body>
    <div class="container-scroller">
        <?php include '../base/navbar.php'; ?>
        <div class="page-body-wraper">
            <?php include '../base/sidebar.php'; ?>
            <div class="content">
                <div class="page">
                    <h1 class="header" >CHI TIẾT ĐƠN HÀNG</h1>
                        <?php 
                            $id=$_GET['id'];
                            $sqlcus ="SELECT * FROM `order` INNER JOIN `customer` INNER JOIN `cusphone` WHERE `order`.`cus_code`= `customer`.`cus_code` AND `order`.`cus_code`= `cusphone`.`cus_code`AND `order`.`order_code`=$id ;  ";
                            $querybolt = mysqli_query($conn, $sqlcus);
                            while($row = mysqli_fetch_array($querybolt)){
                        ?>
                        <p class="address"><b>ORDER NO: </b><?php echo $row['order_code']?></p>
                        <div class="shipping-info-head">
                            <h6>Name</h6>
                            <p><?php echo $row['fname']?> <?php echo $row['lname']?> </p>
                            <h6>Phone Number</h6>
                            <p><?php echo $row['cus_phone']?></p>
                        </div>
                        <div class="shipping-info">
                            <h6>Address</h6>
                            <p><?php echo $row['address']?></p>
                            <h6>RECEIPT DATE</h6>
                            <p><?php echo $row['date']?></p>
                        </div>
                        <div class="shipping-info">
                            <h6>Arrearage</h6>
                            <p><?php echo $row['arrears']?></p>
                            <h6>Status</h6>
                            <p>
                            <div class="form-group mb-9">
                                <select name="status" id="selectSupplier" class="select-supplier" >
                                    <?php 
                                    
                                        $status=$row['status'];
                                        if($status=="new"){?>
                                            <option value="default" ><?php echo $row['status']?></option>
                                            <option value="ordered">ordered</option>
                                            <option value="partial">partial</option>   
                                            <option value="fullpaid">full paid</option>   
                                            <option value="cancelled">cancelled</option>   
                                        <?php
                                        } 
                                        else if($status=="partial paid"||$status=="fullpaid"){?>
                                            <option value="default" ><?php echo $row['status']?></option>  
                                            <option value="cancelled">cancelled</option>   
                                        <?php
                                        } 
                                        else if($status=="warning") {?>
                                            <option value="default" ><?php echo $row['status']?></option>
                                            <option value="partial">partial</option>   
                                            <option value="fullpaid">full paid</option>   
                                            <option value="cancelled">cancelled</option>   
                                        <?php
                                        } 
                                        else if($status=="ordered") {?>
                                            <option value="default" ><?php echo $row['status']?></option>
                                            <option value="partial">partial</option>   
                                            <option value="fullpaid">full paid</option>   
                                            <option value="cancelled">cancelled</option>   
                                        <?php
                                        } ?>
                                </select>
                            </div>
                            </p>
                        </div>
                    <?php }?>
                    <hr class="top">
                    <div class="main-strip">
                        <h6>CATEGORY</h6>
                        <h6>LENGTH</h6>
                        <h6>COLOR</h6>
                        <h6>AMOUNT</h6>
                    </div>
                    <hr class="bottom">
                    <?php 
                        $id=$_GET['id'];
                        $sqlcuspr ="SELECT * FROM `order` INNER JOIN `bolt` INNER JOIN `category` WHERE `order`.`order_code`=`bolt`.`order_code`and `bolt`.`cate_code`=`category`.`cate_code` and `order`.`order_code`=$id ;  ";
                        $querypr = mysqli_query($conn, $sqlcuspr);
                        while($row = mysqli_fetch_array($querypr)){
                    ?>
                    <div class="shipping">
                        <p><?php echo $row['name']?></p>
                        <p><?php echo $row['length']?></p>
                        <p><?php echo $row['color']?></p>
                        <p><?php echo $row['quantity']?></p>
       
                    </div><?php } ?>
                    <total>
                    <?php 
                        $id=$_GET['id'];
                        $sql="SELECT * FROM `order` WHERE `order`.`order_code`=$id ;  ";
                        $querypr = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($querypr)){
                    ?>

                        <div class="shipping-total-2">
                            <h6>TOTAL</h6>
                            <h6>$
                            <?php 
                                echo $row['total_price']
                            ?>
                            </h6>
                        </div><?php } ?>
                    </total>
                    <table border="1">    
                        <tr>
                            <th colspan="2">Partial Payment</th>
                        </tr>
                        <tr>
                            <td>Money</td>
                            <td>Date</td>
                         </tr>
                        <?php 
                            $id=$_GET['id'];
                            $sqlcuspr ="SELECT * FROM `order` INNER JOIN `partialpayment` WHERE `order`.`order_code`=`partialpayment`.`order_code` and `order`.`order_code`= $id;  ";
                            $querypr = mysqli_query($conn, $sqlcuspr);
                            while($row = mysqli_fetch_array($querypr)){
                        ?>
                        <tr> <br> 
                        <td><?php echo $row['money']?></td>
                        <td><?php echo $row['date_pay']?></td>
                        </tr><?php } ?>
                    </table>
                </div>
            </div>  
        </div> <button class="Btn" name="btnsubmit">
    <span class="btnIcon">
        <i class="fa fa-plus"></i>
    </span>
    <span class="text">Copy</span> 
</button>
    </div>
</body>
</html>