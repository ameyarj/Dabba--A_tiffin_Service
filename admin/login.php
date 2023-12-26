<?php
    include('../config/constants.php');
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">  
    <link rel="stylesheet" href="../css/login.css">                        
    <title>Login-Tiffin</title>
</head>
<body>
<div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="manage-order.php">Order</a></li>
            </ul>
        </div>
     
    </div>
    <div class="login">
        <h1 class="text-center login-text">Login</h1>
        <br> <br>
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-=login-message']))
        {
            echo $_SESSION['no-=login-message'];
            unset($_SESSION['no-=login-message']);
        }

        ?>
        <br> <br>
        <!-- login form -->
        <form action="" method="POST" class="text-center">
            <span class="login-text"> Username: </span> <br>
            <input type="text" name="username" placeholder="Enter Username"> <br><br>

            <sapn class="login-text">Password: </sapn>   <br>
            <input type="password" name="password" placeholder="Enter Password"> <br><br>
            <input type="submit" name="submit" value="login" class="btn-primary"> <br> <br>
        </form>

        <p class="text-center">Created By - <a href="#">Ameya Raj</a></p>
    </div>
</body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $username=mysqli_real_escape_string($conn,$_POST['username']);

        $raw_password=md5($_POST['password']);
        $password = mysqli_real_escape_string($conn,$raw_password);
        
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        $res=mysqli_query($conn,$sql);

       $count=mysqli_num_rows($res);

       if($count==0)
       {
        $_SESSION['login']="<div class='success text-center'> Login Successfull. </div>";
        $_SESSION['user']=$username;
        header('location:'.SITEURL.'admin/');
       }
       else
       {
        $_SESSION['login']="<div class='error text-center'> Username or Password did not match. </div>";
        header('location:'.SITEURL.'admin/login.php');
       }
    }

?>