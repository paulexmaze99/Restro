<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet"href="../css/admin.css">
</head>
<body>
<?php include('./menu.php') ?>

<div class="main-content">
    <div class="wrapper">
      <h1>Manage Category</h1>
      
      <br><br>
      <?php 
       if(isset($_SESSION['add']))
       {
         echo $_SESSION['add'];
         unset($_SESSION['add']);
       }
       if(isset($_SESSION['remove']))
       {
          echo $_SESSION['remove'];
          unset($_SESSION['remove']);
       }
       if(isset($_SESSION['delete']))
       {
          echo $_SESSION['delete'];
          unset($_SESSION['delete']);
       }
       if(isset($_SESSION['no-category-found']))
       {
         echo $_SESSION['no-category-found'];
         unset($_SESSION['no-category-found']);
       }
       if(isset($_SESSION['update']))
       {
         echo $_SESSION['update'];
         unset($_SESSION['update']);
       }
       if(isset($_SESSION['upload']))
       {
         echo $_SESSION['upload'];
         unset($_SESSION['upload']);
       }
       if(isset( $_SESSION['failed-remove']))
       {
        echo  $_SESSION['failed-remove'];
        unset( $_SESSION['failed-remove']);
       }
     
     
     ?>
     <br><br>
           
           
            <a href="./add.category.php" class="btn-primary">Add category</a>

            <br><br><br>

            <table class="tbl-full">
               <tr>
                 <th>S.N.</th>
                 <th>Title</th> 
                 <th>image</th>
                 <th>Featured</th>
                 <th>Active</th>
                 <th>Actions</th>    
               </tr>

              <?php 
               
                $sql = "SELECT * FROM tbl_category";
                
                //execute the query
                $res = mysqli_query($conn, $sql);
                
                //count rows
                $count = mysqli_num_rows($res);

                //create serial number variable and assign the value as 1
                $sn=1;

                //check whether we have data in database or not
                if($count>0)
                {
                  //we have data in database
                  //get the data and display
                  while($row=mysqli_fetch_assoc($res))
                  {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];

                    ?>
                                
                    <tr> 
                        <td><?php echo $sn++; ?> </td>
                        <td><?php echo $title; ?></td>
                     
                       <td>
                          <?php
                                //check whether image name is available or not
                             if($image_name=="")
                               {
                                 //we do not have image
                                 echo "<div class='error'>Image not Added.</div>";
                               } 
                               else
                               {
                                   //display the image
                                 ?>

                                  <img src="../category/<?php echo   $image_name; ?>" width="100px">
                             
                                 <?php
                               }
                              

                        

                            ?>  
                          
                      </td>

                       <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                       <td>
                       <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                         <a href="<?php echo SITEURL; ?>admin/delete.category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>  
                       </td>
                     </tr>
                  <?php


                  }
                
                }
                else
                {
                  //we don't have data
                  //display the message in the table
                  ?>
                    <tr>
                      <td colspan="6"><div class="error">No Category Added.</div></td>
                    </tr>

                  <?php

                }
               
              ?>


               
          

            </table>
    </div>
   
</div>


<script type="text/javascript" src="../assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-navbar.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>


