<?php include('./admin/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

   
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="./admin/favicon_io/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="./admin/favicon_io/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="./admin/favicon_io/favicon.ico">
		<link rel="manifest" href="./admin/favicon_io/site.webmanifest">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    

</head>
<body>
    
<!-- header section starts      -->

<header>

    <a href="<?php echo SITEURL; ?>" class="logo"><i class="fas fa-utensils"></i>restro.</a>

    <nav class="navbar">
        <a href="./foods.php">Foods</a>
        <a href="./about.php">about</a>
        <a href="./categories.php">Categories</a>
        <a href="#order">order</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
    </div>

</header>

<!-- header section ends-->

<!-- search form  -->

<form action="./food-search.php" method="POST" id="search-form">
    <input type="search" placeholder="search here..." name="search" id="search-box">
    <input type="submit" name="submit">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>
<section class="categories">
    <h1 class="heading">our Popular items  </h1>
    <div class="container">
             <?php
    
             $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 6";
                //execute the query
                $res = mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                          
                               <?php 
                                
                                  //check whether image name is available or not
                                  if($image_name=="")
                                  {
                                    echo "<div class='error'>Image Not Available.</div>";
                                  }
                                  else
                                  {
                                    ?>
                                    
                                       <img src="./category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">  
                                    
                                    <?php
                                  }
                               
                               
                               
                               ?>
                             

                             <h3 class="float-text text-white"><?php echo $title; ?></h3>
                       
                       </a>
                        <?php
                    }
                }
                else
                {
                    echo " '<div class='error'>Category not added.</div>'";
                }
     

            ?>


</div>
</section>
<div class="loader-container">
    <img src="images/loader.gif" alt="">
</div>




<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>
