<?php
include('partials/menu.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiffin_Service-HomePage</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    
    <!-- main content section starts -->
    <div class="main-content">
        <div class="wrapper">
            <h1>DASHBOARD</h1>
            <br><br>
            <?php
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

            ?>
            <br><br>
            <div class="col-4 text-center">
                <?php
                    $sql="SELECT * FROM tbl_category";
                    $res=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($res);
                ?>
                <h1><?php echo $count; ?></h1>
                <br>
                Cateories
            </div>

            <div class="col-4 text-center">
            <?php
                    $sql2="SELECT * FROM tbl_food";
                    $res2=mysqli_query($conn,$sql2);
                    $count2=mysqli_num_rows($res2);
                ?>
                <h1><?php echo $count2; ?></h1>
                <br>
                Foods
            </div>

            <div class="col-4 text-center">
            <?php
                    $sql3="SELECT * FROM tbl_order";
                    $res3=mysqli_query($conn,$sql3);
                    $count3=mysqli_num_rows($res3);
                ?>
                <h1><?php echo $count3; ?></h1>
                <br>
                Total Orders
            </div>

           
            <div class="col-4 text-center">
            <?php
                    $sql4="SELECT  SUM(total) AS Total FROM tbl_order WHERE status='Delievered'";
                    $res4=mysqli_query($conn,$sql4);
                    $row4=mysqli_fetch_assoc($res4);
                    $total_revenu=$row4['Total']
                ?>
                <h1>₹<?php echo $total_revenu; ?></h1>
                <br>
                Revenue Generated
            </div>

            <div class="clearfix"></div>
        </div>
        
    </div>
    <!-- main content section ends -->
<?php
    include('partials/footer.php');
?>
</body>
</html>