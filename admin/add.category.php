

<?php

include('./menu.php')
?>


<div class="main-content">
<div class="wrapper">
    <h1>Add Category</h1>


    <br><br>                                                                                                                                    <link rel="stylesheet"href="../css/admin.css">                           

    <?php 
     if(isset($_SESSION['add']))
     {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
     }
     if(isset($_SESSION['upload']))
     {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
     }
     ?>

     <br><br>
      

    <form action="" method="POST" enctype="multipart/form-data">

    <table class="tbl-30">
        <tr>
         
          <td><input type="text" name="title" placeholder="category title"></td> 
        </tr>
        <tr>
         
          <td><input type="file" name="image"></td> 
        </tr>
        <tr>
            <td>
                <input type="radio" name="featured" value="Yes"> Yes
                <input type="radio" name="featured" value="No"> No
            </td>  
        </tr>
        <tr>
            <td>
            <input type="radio" name="active" value="Yes"> Yes
            <input type="radio" name="active" value="No"> No
            </td>  
        </tr>
        
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" value="Add Category" class="btn-secondary">
            </td>
        </tr>

    </table>

    </form>

   <?php 
   
   if(isset($_POST['submit']))
   {
     //echo "clicked";

     $title = $_POST['title'];
     
    
     if(isset($_POST['featured']))
     {
       $featured = $_POST['featured'];
     }
     else
     {
       $featured = "No";
     }
     if(isset($_POST['active']))
     {
       $active = $_POST['active'];
     }
     else
     {
       $active = "No";
     }

     //print_r($_FILES['image']);

     //die();
     
     if(isset($_FILES['image']['name']))
      {
        $image_name = $_FILES['image']['name'];
        
        //upload the image if its is selected
        if($image_name != "")
        {

       
          //Auto Rename Image 
          $ext = end(explode('.', $image_name));

           $image_name = "food_category_".rand(000, 999).'.'.$ext;

          $source_path = $_FILES['image']['tmp_name'];

          $destination_path ="../category/".$image_name;

          $upload = move_uploaded_file($source_path, $destination_path);

          if($upload==false)
          {
            $_SESSION['upload'] = "<div class='error'>failed to upload image.</div>";
               header('Location:'.SITEURL. 'admin/add.category.php');


            die();
          }
       }
       
      }
      else
      {
        $image_name="";
      }
     
      
     $sql = "INSERT INTO tbl_category SET
      title='$title',
      image_name='$image_name',
      featured='$featured',
      active='$active'
   ";

   $res = mysqli_query($conn, $sql);

   if($res==true)
   {
   //echo "data inserted";
    echo "Records added successfully.";
   
   }
   else{
    echo mysqli_error($conn);
           

   }
     
   }
   
   
   ?>


    </div>
</div>

<?php include('./partials/footer.php') ?>


<script type="text/javascript" src="../assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="../assets/js/script.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-navbar.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    </body>
   
    </html>
