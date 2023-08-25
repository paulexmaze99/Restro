<?php include('./admin/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="./admin/favicon_io/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="./admin/favicon_io/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="./admin/favicon_io/favicon.ico">
		<link rel="manifest" href="./admin/favicon_io/site.webmanifest">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/home.css">
   

</head>
<body>
    


<header>

    <a href="<?php echo SITEURL; ?>" class="logo"><i class="fas fa-utensils"></i>restro.</a>


   

</header>
<?php
    if(isset($_GET['food_id']))
    {
      $food_id = ($_GET['food_id']);

      $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
       //execute the query
       $res = mysqli_query($conn, $sql);
        //count the Rows to check whether the id is valid or not
        $count = mysqli_num_rows($res);
        if($count==1)
               {
                 //get all the data
                 $row = mysqli_fetch_assoc($res);
                 $title = $row['title'];
                 $price = $row['price'];
                 $image_name = $row['image_name'];
                
               }
               else
               {
                //redirect to manage category with session message
               
                header('location:' .SITEURL);
               }

    }
    else
    {
        //redirect to manage category page
        header('location:' .SITEURL);
    }
   
   
    ?>





<section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" method="POST"  enctype="multipart/form-data" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                            
                    <?php
             if($image_name=="")
             {
            echo "<div class='error'>Image Not Available.</div>";
             }
             else
             {
                ?>
                   <img src="./food/<?php echo $image_name; ?>" alt="menu-image">
                 <?php
             }
             ?>
                 </div>
    
    <div class="food-menu-desc">
        <h3><?php echo $title; ?></h3>
        <input type="hidden" name="food" value="<?php echo $title; ?>">
        <p class="food-price">$<?php echo $price; ?></p>
        <input type="hidden" name="price" value="<?php echo $price; ?>">
        <div class="order-label">Quantity</div>
        <input type="number" name="qty" class="input-responsive" value="1" required>
        
    </div>
                   

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name"  class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            <?php 

if(isset($_POST['submit']))
{
 
  //1. get all the value from the form
   $food = $_POST['food'];
   $price = $_POST['price'];
   $qty = $_POST['qty'];
   $total = $price * $qty;

   $order_date = date("y-m-d h:i:sa");

   $status = "Ordered";

   $customer_name = $_POST['full-name'];
   $customer_contact = $_POST['contact'];
   $customer_email = $_POST['email'];
   $customer_address = $_POST['address'];

   
   //3. update the database
   $sql2 = "INSERT INTO tbl_order SET
     food = '$food',
     price = $price,
     qty = $qty,
     total = $total,
     order_date = '$order_date',
     status = '$status',
     customer_name = '$customer_name',
     customer_contact = '$customer_contact',
     customer_email = '$customer_email',
     customer_address = '$customer_address'




   
   
   
   ";
  //echo $sql2; die();
     
   //execute the query
   $res2 = mysqli_query($conn, $sql2);

   //4. redirect to manage category page with message
   //check whether query executed or not
   if($res2==true)
   {
     //category updated
     $_SESSION['order'] = "<div class='sucess text-center'>
     food odered Successfully.</div>";
     header('location:' .SITEURL);
     
   }
   else
   {
     //failed to update category
     $_SESSION['order'] = "<div class='error text-center'>Failed To order food.</div>";
     header('location:' .SITEURL);
   }
}


?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

        </div>
    </section>
    </body>
</html>