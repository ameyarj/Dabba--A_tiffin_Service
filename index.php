<?php  include('partials-front/menu.php'); ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>


    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Tiffins Categories</h2>
                <?php
                    $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3" ;
                    $res=mysqli_query($conn,$sql);
                    $count=mysqli_num_rows($res);
                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id=$row['id'];
                            $title=$row['title'];
                            $image_name=$row['image_name'];
                            ?>
                                <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php
                                echo $id;?>">
                                <div class="box-3 float-container">
                                    <?php
                                        if($image_name == "")
                                        {
                                            echo "<div class='error'>Image Not Available.</div>";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="t1" class="img-responsive img-curve" width="250px" height="250px">
                                            <?php
                                        }
                                    ?>
                                    

                                    <h3 class="float-text text-white"><?php echo $title; ?></h3>
                                </div>
                                </a>

                            <?php
                        }
                    }
                    else
                    {
                        echo "<div class='error'> Category Not Added.</div>";
                    }
                ?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- Tiffin MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Tiffin Menu</h2>
            <?php
                $sql2="SELECT * FROM tbl_food WHERE active='Yes' AND featured ='Yes' LIMIT 6";
                $res2=mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res);
                if($count2>0)
                {
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id=$row2['id'];
                        $title=$row2['title'];
                        $price=$row2['price'];
                        $description=$row2['description'];
                        $image_name=$row2['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                <?php
                                        if($image_name == "")
                                        {
                                            echo "<div class='error'>Image Not Available.</div>";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="t1" class="img-responsive img-curve" width="100px" height="100px">
                                            <?php
                                        }
                                    ?>
                                   
                                </div>

                                <div class="food-menu-desc">
                                    <img src="images/veg.png" alt="veg" width="25" height="20">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price">₹<?php echo $price; ?></p>
                                    <p class="food-detail"><?php echo $description; ?></p>
                                    <br>

                                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        <?php
                    }
                }
                else
                {
                    echo "<div class='error'> No Food Available.</div>";
                }

            ?>



        </div>


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="<?php echo SITEURL;?>foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php 
    include('partials-front/footer.php');
?>