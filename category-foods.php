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


    <?php 
  if(isset($_GET['category_id']))
  {
    $category_id = $_GET['category_id'];

    $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

    $res = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($res);

    $category_title = $row['title'];
  }
  else
  {
    header('Location:'.SITEURL);
  }

?>

   <!-- search form  -->

<form action="./food-search.php" method="POST" id="search-form">
    <input type="search" placeholder="search here..." name="search" id="search-box" value="<?php echo  $category_title;  ?>">
    <input type="submit" name="submit">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>

            

        <section class="menu" id="menu">

<h3 class="sub-heading"> our menu </h3>
<h1 class="heading"> today's speciality </h1>

<div class="box-container">
    <?php 
    
    $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";


    $res2 = mysqli_query($conn, $sql2);

    $count = mysqli_num_rows($res2);

    if($count)
    {
        while($row=mysqli_fetch_assoc($res2))
        {
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $description = $row['description'];
            $image_name = $row['image_name'];
            ?>
        <div class="box">
        <div class="image">
            <img src="./food/<?php echo $image_name; ?>" alt="">
            <a href="#" class="fas fa-heart"></a>
            
        </div>
        <div class="content-b">
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <h3><?php  echo $title; ?></h3>
            <p><?php echo $description; ?></p>
            <span class="price">$<?php echo $price; ?></span>
            <a href="./order.php?food_id=<?php echo $id; ?>" class="btn">Order Now</a>
        </div>
        </div>
  
        
            <?php
        }
        

    }
    else{
        echo "<div class='error'>Food Not Available.</div>";
    }
    
    
    ?>

   
       
    
    
</div>


</section>
<div class="loader-container">
    <img src="images/loader.gif" alt="">
</div>
  

   
       
    
    
</div>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


</body>
</html>
    

