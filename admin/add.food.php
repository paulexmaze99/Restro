<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Food</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet"href="../css/admin.css">
</head>
<body>
 

<?php include('./menu.php') ?>





<div class="main-content">
     <div class="wrapper">
          <h1>Add Food</h1>

          <br><br>
            
                
             <?php
                if(isset($_SESSION['upload']))
                 {
                   echo $_SESSION['upload'];
                   unset($_SESSION['upload']);
                 }
                 if(isset($_SESSION['failed']))
                 {
                   echo $_SESSION['failed'];
                   unset($_SESSION['failed']);
                 }
              
              
             
              ?>    


          <form action="" method="POST" enctype="multipart/form-data">
         
                <table class="tbl-30">
        
                     <input type="text" name="title" placeholder="your title" class="box" required>
           
                      <tr>
                         
                         <td>
                             <textarea name="description"  cols="30" rows="5" placeholder="Description  of the food."></textarea>
                         </td>
                       </tr>

                      <tr>
                          <td>
                             <input type="number" name="price">
                          </td>
                      </tr>

                        <tr>
                           
                              <td>
                               <input type="file" name="image">
                            </td>
                       </tr>

                       <tr>
                        
                          <td>
                             <select name="category">
                                  
                                    <?php 
                                       
                                       $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                       $res = mysqli_query($conn, $sql);

                                       $count = mysqli_num_rows($res);

                                       if($count>0)
                                       {
                                          while($row=mysqli_fetch_assoc($res))
                                           {
                                             $id = $row['id'];
                                             $title = $row['title'];

                                             ?>
                                              
                                              <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                              
                                               
                                             <?php
                                             
                                               
                                           }
                                       }
                                       else
                                       {
                                         ?>
                                         <option value="0">No category found</option>
                                         <?php
                                       }
                                    ?>

                             </select>
                          </td>
                       </tr>

                       <tr>
                           
                           <td>
                              <input type="radio" name="featured" value="Yes"> Yes
                              <input type="radio" name="featured" value="NO"> NO
                           </td>
                       </tr>

                       <tr>
                           
                           <td>
                              <input type="radio" name="active" value="Yes"> Yes
                              <input type="radio" name="active" value="NO"> NO
                           </td>
                       </tr>
                       <tr>
                          <td colspan="2">
                             <input type="submit" name="submit" value="Add Food" class="btn">
                          </td>
                       </tr>
                     
                     
                </table>     
                  
            </form>

            <?php
            
               if(isset($_POST['submit']))
               {
                  // echo "clicked";

                 $title = $_POST['title'];
                 $description = $_POST['description'];
                 $price = $_POST['price']; 
                 $category = $_POST['category']; 

                 
                  if(isset($_POST['featured']))
                   {
                     $featured = $_POST['featured'];
                   }
                   else
                    {
                      $featured = "NO";
                    }
                    if(isset($_POST['active']))
                    {
                      $active = $_POST['active'];
                    }
                    else
                    {
                      $active = "NO";
                    }

                    if(isset($_FILES['image']['name']))
                    {
                        $image_name = $_FILES['image']['name'];

                        if($image_name!="")
                        {
                            $extension = end(explode('.', $image_name));

                            $image_name = "Food-Name_".rand(0000,9999).".".$extension;


                            $src = $_FILES['image']['tmp_name'];

                            $dest = "../food/".$image_name;

                            $upload = move_uploaded_file($src, $dest);

                            if($upload==false)
                            {
                              $_SESSION['upload'] = "<div class='error'>failed to upload Image.</div>";
                              header('Location:'.SITEURL. 'admin/add.food.php');
                  
                              die();
                            }
                        }
                    } 
                    else
                    {
                        $image_name = "";
                    }

                    $sql2 = "INSERT INTO tbl_food SET
                    
                           title ='$title',
                           description ='$description',
                            price = $price,
                           image_name = '$image_name',
                           category_id = $category,
                           featured='$featured',
                           active ='$active'
                       ";
                    
                     $res2 = mysqli_query($conn, $sql2);

                     if($res2==true)
                     {
                      $_SESSION['success'] = "<div class='sucess'>Food Added Sucessfully.</div>";
                      
                    
                      
                     }
                     else
                     {
                     
                       $_SESSION['failed'] = "<div class='error'> failed to Add Food...</div>";
                      
                     header('location:'.SITEURL.'admin/raph.food.php');
          }

              }

            ?>
     
      </div>
</div>

<?php include('partials/footer.php'); ?>





           

    <script type="text/javascript" src="../assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-navbar.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    </body>
   
    </html>




