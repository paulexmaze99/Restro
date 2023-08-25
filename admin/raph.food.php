<?php include('./menu.php') ?>


<div class="main-content">
     <div class="wrapper">
          <h1>Manage Food</h1>
      
          <br><br>

            
            <a href="./add.food.php" class="btn-primary">Add food</a>

            <br><br><br>

                                                                                  <link rel="stylesheet"href="../css/admin.css">

             <?php
              

                if(isset($_SESSION['success']))
                  {
                   echo $_SESSION['success'];
                   unset($_SESSION['success']);
                  }
                if(isset($_SESSION['delete']))
                    {
                     echo $_SESSION['delete'];
                     unset($_SESSION['delete']);
                    }
                  if(isset($_SESSION['upload']))
                   {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                   }
                  if(isset($_SESSION['unauthorize']))
                  {
                    echo $_SESSION['unauthorize'];
                    unset($_SESSION['unauthorize']);
                  }
                  if(isset($_SESSION['update']))
                  {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                  }
                  if(isset($_SESSION['failed-remove']))
                  {
                    echo $_SESSION['failed-remove'];
                    unset($_SESSION['failed-remove']);
                  }

               
            
                
              ?>
            
           
          

            <table class="tbl-full">
                    <tr>
                      <th>S.N.</th>
                       <th>Title</th> 
                      <th>Price</th>
                      <th>Image</th>
                      <th>Featured</th> 
                      <th>Active</th>
                      <th>Action</th>   
                    </tr>
                       
                     <?php 

                      $sql = "SELECT * FROM tbl_food";

                      $result=$conn-> query($sql);

                      $count=1;

                       //create serial number variable and assign the value as 1
                       $sn=1;
                       if ($result-> num_rows > 0){
                        while ($row=$result-> fetch_assoc())
                         {
                           $id = $row['id'];
                           $title = $row['title'];
                           $price = $row['price'];
                           $image_name = $row['image_name'];
                           $featured = $row['featured'];
                           $active = $row['active'];
                           ?>

                             
                    <tr> 
                        <td><?php echo $sn++; ?> </td>
                        <td><?php echo $title; ?></td>
                       <td>$<?php echo $price; ?></td>
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

                                  <img src="../food/<?php echo   $image_name; ?>" width="100px">
                             
                                 <?php
                               }
                              

                        

                            ?>  
                          
                           </td>
                            <td><?php echo $featured; ?></td>
                             <td><?php echo $active; ?></td>
                          <td>
                          <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete</a>
                         </td>
                      </tr>




                           <?php
                         }
                      }
                      else
                      {
                         echo "<tr> <td colspan='7' class='error'> Food Not Added Yet.</td> </tr>";
                      }
                         

                            
                             
                    
                    ?>


                  
               
           </table>
     </div>
   
</div>

