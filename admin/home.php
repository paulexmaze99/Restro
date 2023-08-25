<?php include('./adminHeader.php'); ?>
 <?php include('./menu.php') ?>


<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <head>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="../css/admin.css"> 
       

  </head>
</head>
      <?php 
       if(isset($_SESSION['login']))
       {
          echo $_SESSION['login'];
          unset($_SESSION['login']);
       }
      ?>
      <br><br>

			 <div class="col-4 text-center">
          <div class="card">
          <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
            <?php 
            $sql = "SELECT * FROM tbl_category";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);
            
            
            ?>

               <h1><?php echo $count; ?></h1>
            <br />
			    categories
			 </div>
        </div>


			 <div class="col-4 text-center">
          <div class="card">
          <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
            <?php
            
            $sql2 = "SELECT * FROM tbl_food";

            $res2 = mysqli_query($conn, $sql2);

            $count2 = mysqli_num_rows($res2);
            
            
            ?>

               <h1><?php echo $count2; ?></h1>
            
            
      
            <br />
			   Food
			 </div>
          </div>


          <div class="col-4 text-center">
          <div class="card">
          <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
            <?php
            
            $sql3 = "SELECT * FROM tbl_order";

            $res3 = mysqli_query($conn, $sql3);

            $count3 = mysqli_num_rows($res3);
            
            
            ?>

               <h1><?php echo $count3; ?></h1>
            
            
      
            <br />
			   Total Orders
			 </div>
          </div>
           
          
			
          
			 <div class="col-4 text-center">
            
            <div class="card">
            <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
             <?php 
             $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

             $res4 = mysqli_query($conn, $sql4);
             
             $row4 = mysqli_fetch_assoc($res4);

             $total_revenue = $row4['Total'];
             
             
             ?>

               <h1><?php echo $total_revenue; ?></h1>
               
               <br>
            Revenue Generated
			 </div>
          </div>
         <div class="clearfix"></div>
    </div>       
    

      
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-navbar.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
   
</html>
   
