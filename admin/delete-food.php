<?php
      // include the constant file
     
      include('./menu.php');  

     if(isset($_GET['id']) && isset($_GET['image_name']))
      {
           //echo "process to delete";

           $id = $_GET['id'];
           $image_name = $_GET['image_name'];

            if($image_name != "")
            {
               //image is available
              $path = "../food/".$image_name;
              //remove the image
              $remove = unlink($path);

             //if failed to remove image then add an error message and stop the process
              if($remove==false)
                {
                  //set the SESSION message
                   $_SESSION['upload'] = "<div class='error'>failed to remove image file.</div>";
                   //redirect to raph food page with message
                   header('Location:'.SITEURL. 'admin/raph.food.php');
                     //stop the process
                     die();

                }
        } 
           
               //delete data from database
               //sql query to delete data from database
               $sql = "DELETE FROM tbl_food WHERE id=$id";

 
               //execute the query
               $res = mysqli_query($conn, $sql);
               
               if($res==true)
               {
                echo"Food Item Deleted";
          
               
               }
               else
               {
                  echo"Not able to delete";    
               }
               

           }  
            else
            {
               //echo "redirect";
              $_SESSION['unauthorize'] = "<div class='error'>unauthorized access.</div>";
             
            }







?>