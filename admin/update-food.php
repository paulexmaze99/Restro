<?php include('./menu.php') ?>

<?php 
 
    if(isset($_GET['id']))
    {
       $id = $_GET['id'];

       $sql2 = "SELECT * FROM tbl_food WHERE id=$id";

       $res2 = mysqli_query($conn, $sql2);

       $row2 = mysqli_fetch_assoc($res2);

       $title = $row2['title'];
       $description = $row2['description'];
       $price = $row2['price'];
       $current_image = $row2['image_name'];
       $current_category = $row2['category_id'];
       $featured = $row2['featured'];
       $active = $row2['active'];
    }
    else
    {
        header('location:'.SITEURL.'admin/raph.food.php');
    }
   

?>


<div class="main-content">
    <div class="wrapper">
        <h1>update food</h1>
        <br><br>
        <link rel="stylesheet"href="../css/admin.css">

        <form action="" method="POST" enctype="multipart/form-data">

        <table class="tbl-30">

         <tr>
            <td>Title: </td>
            <td>
               <input type="text"  name="title" value="<?php echo $title; ?>">
            </td>
         </tr>
         <tr>
            <td>Description: </td>
            <td>
                <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea> 
            </td>
         </tr>
         <tr>
            <td>Price: </td>
            <td>
            <input type="number" name="price" value="<?php echo $price; ?>">
            </td>
         </tr>
         <tr>
            <td>current_image: </td>
            <td>
            <?php 

       if($current_image != "")
       {
         //display the image
       ?>
        <img src="../food/<?php echo $current_image; ?>" width="150px">
        <?php
       }
        else
      {
        //display message
        echo "<div class='error'>Image Not Available.</div>";
      }

      ?>
            </td>
         </tr>
         <tr>
            <td>Select New Image: </td>
            <td>
               <input type="file" name="image"
            </td>
         </tr>
         <tr>
            <td>Category: </td>
            <td>
                 <select>
                 <?php 
                                $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                                $res = mysqli_query($conn, $sql);

                                $count = mysqli_num_rows($res);

                                if($count>0)
                                {
                                   while($row=mysqli_fetch_assoc($res))
                                   {
                                      $category_title = $row['title'];
                                      $category_id = $row['id'];
                                      ?>
                                       <option <?php if($current_category==$category_id){echo "yes";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                     <?php
                                   }
                                }
                                else
                                {
                                    echo "<option value='0'>No category Available.</option>";
                                }



                           ?>
                 </select>
            </td>
         </tr>
         <tr>
          <td>featured: </td>
            <td>
                   <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio"     name="featured" value="Yes"> Yes
                   <input <?php if($featured=="NO"){echo "checked";} ?> type="radio" name="featured" value="NO"> NO
            </td>
         </tr>
         <tr>
          <td>active: </td>
            <td>
                <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" name="active" value="Yes"> Yes
                   <input <?php if($active=="NO"){echo "checked";} ?> type="radio" name="active" value="NO"> NO
            </td>
         </tr>
         <tr>
            <td>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                   <input type="hidden" name="current_image" value="<?php echo $current_image; ?>"> 
            <input type="submit" name="submit" value="Update Food" class="btn-secondary">
            </td>
         </tr>









         </table>
        </form>
        <?php 
            if(isset($_POST['submit']))
            {
                //echo "Button Clicked";
                //1. get all the value from the form
              $id = $_POST['id'];
              $title = $_POST['title'];
              $description = $_POST['description'];
              $price = $_POST['price'];
              $current_image = $_POST['current_image'];
              $category = $_POST['category'];

              $featured = $_POST['featured'];
              $active = $_POST['active'];
              //2. updating new image if selected
              //check whether upload button is selected or not
              if(isset($_FILES['image']['name']))
              {
                //get the image details
                $image_name = $_FILES['image']['name'];

                //check whether the image is available or not
                if($image_name!="")
                {
                     //image Available
                     //A. upload the new image
                      //Auto Rename Image 
                        $ext = end(explode('.', $image_name));
                        //rename the image

                         $image_name = "food-Name_".rand(0000, 9999).'.'.$ext;

                         $source_path = $_FILES['image']['tmp_name'];

                         $destination_path ="../food/".$image_name;

                         //finaaly upload the image

                        $upload = move_uploaded_file($source_path, $destination_path);

                         if($upload==false)
                     {
                       $_SESSION['upload'] = "<div class='error'>failed to upload image.</div>";
                       header('Location:'.SITEURL. 'admin/raph.food.php');
                        die();
                     }
                  //B. remove the current image if available
                  if($current_image!="")
                  {
                    $remove_path = "../food/".$current_image;
                    $remove = unlink($remove_path);
  
                    //check whether the image is removed or not
                    //if failed to remove then display message and stop the process
                    if($remove==false)
                    {
                      //failed to remove image
                      $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                      header('Location:'.SITEURL. 'admin/raph.food.php');
                      die();//stop process
                    }
                  }
                  
                }
                else
                {
                  $image_name = $current_image;
                }
            }

              
              //3. update the database

              $sql3 = "UPDATE tbl_food SET
                   title = '$title',
                   description = '$description',
                   price = $price,
                   image_name = '$image_name',
                   category_id = '$category',
                   featured = '$featured',
                   active = '$active'
                   WHERE id=$id

              
              ";
              //execute the query
              $res3 = mysqli_query($conn, $sql3);

               //check whether query executed or not
               if($res3==true)
               {
                 //food updated
                 $_SESSION['update'] = "<div class='sucess'>Food Updated Successfully.</div>";
                 header('location:' .SITEURL.'admin/raph.food.php');
               }
               else
               {
                  //failed to update food
                  $_SESSION['update'] = "<div class='error'>Failed to Update Food.</div>";
                 header('location:' .SITEURL.'admin/raph.food.php');
               }

              
            }
