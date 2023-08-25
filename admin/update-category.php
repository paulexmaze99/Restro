<?php include('./menu.php') ?> 

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>


         <br><br>

         <link rel="stylesheet"href="../css/admin.css">

        <?php 

            //check whether id is set or not
            if(isset($_GET['id']))
            {
                //get the id and all other details
               // echo "Getting the data";
               $id = $_GET['id'];
               //create SQL query to get all other details
               $sql = "SELECT * FROM tbl_category WHERE id=$id ";
               //execute the query
               $res = mysqli_query($conn, $sql);

               //count the Rows to check whether the id is valid or not
               $count = mysqli_num_rows($res);

               if($count==1)
               {
                 //get all the data
                 $row = mysqli_fetch_assoc($res);
                 $title = $row['title'];
                 $current_image = $row['image_name'];
                 $featured = $row['featured'];
                 $active = $row['active'];
               }
               else
               {
                //redirect to manage category with session message
                $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                header('location:' .SITEURL.'admin/raph.category.php');
               }
            }
            else
            {
                //redirect to manage category page
                
            }
         
        ?>

       <form action="" method="POST" enctype="multipart/form-data">
         <table class="tbl-30">
             <tr>
                 
                 <td><input type="text" name="title" value="<?php echo $title; ?>"></td> 
              </tr>
               <tr>
                 <td>
                 <?php 

         if($current_image != "")
        {
          //display the image
             ?>
                <img src="../category/<?php echo $current_image; ?>" width="150px">
             <?php
        }
       else
       {
           //display message
          echo "<div class='error'>Image Not Added.</div>";
       }

       ?>
                 </td> 
               </tr>
                <tr>
                    
                  <td>
                     <input type="file" name="image">
                  </td>  
               </tr>
                <tr>
                   <td>
                     <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" name="featured" value="Yes"> Yes

                     <input <?php if($featured=="No"){echo "checked";} ?> type="radio" name="featured" value="No"> No
                  </td>  
                </tr>
               <tr>
                   <td>
                     <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes

                     <input <?php if($active=="No"){echo "checked";} ?> type="radio" name="active" value="No"> No
                  </td>  
                </tr>
                <tr>
                   <td>
                     <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                     
                     <input type="hidden" name="id" value="<?php echo $id; ?>">
                     <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                   </td>
                 </tr>
         
           </table>
        </form>
        
        <?php 

           if(isset($_POST['submit']))
           {
             // echo "clicked";
             //1. get all the value from the form
              $id = $_POST['id'];
              $title = $_POST['title'];
              $current_image = $_POST['current_image'];
              $featured = $_POST['featured'];
              $active = $_POST['active'];
              
              //2. updating new image if selected
              //check whether image is selected or not
              if(isset($_FILES['image']['name']))
              {
                //get the image details
                $image_name = $_FILES['image']['name'];

                //check whether the image is available or not
                if($image_name != "")
                {
                     //image Available
                     //A. upload the new image
                      //Auto Rename Image 
                        $ext = end(explode('.', $image_name));
                        //rename the image

                         $image_name = "food_category_".rand(000, 999).'.'.$ext;

                         $source_path = $_FILES['image']['tmp_name'];

                         $destination_path ="../category/".$image_name;

                         //finaaly upload the image

                        $upload = move_uploaded_file($source_path, $destination_path);

                         if($upload==false)
                     {
                       $_SESSION['upload'] = "<div class='error'>failed to upload image.</div>";
                       header('Location:'.SITEURL. 'admin/raph.category.php');
                        die();
                     }
                  //B. remove the current image if available
                  if($current_image!="")
                  {
                    $remove_path = "../category/".$current_image;
                    $remove = unlink($remove_path);
  
                    //check whether the image is removed or not
                    //if failed to remove then display message and stop the process
                    if($remove==false)
                    {
                      //failed to remove image
                      $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                      header('Location:'.SITEURL. 'admin/raph.category.php');
                      die();//stop process
                    }
                  }
                  
                }
                else
                {
                  $image_name = $current_image;
                }
              }
              else
              {
                $image_name = $current_image;
              }
              
              //3. update the database
              $sql2 = "UPDATE tbl_category SET 
                title = '$title',
                image_name = '$image_name',
                featured = '$featured',
                active = '$active'
                WHERE id=$id
              
              ";
              //execute the query
              $res2 = mysqli_query($conn, $sql2);

              //4. redirect to manage category page with message
              //check whether query executed or not
              if($res2==true)
              {
                //category updated
                $_SESSION['update'] = "<div class='sucess'>Category Updated Successfully.</div>";
                
              }
              else
              {
                //failed to update category
                $_SESSION['update'] = "<div class='error'>Failed To Update Category.</div>";
                header('location:' .SITEURL.'admin/raph.category.php');
              }
           }
        
        
        ?>

      </div>
  </div>
