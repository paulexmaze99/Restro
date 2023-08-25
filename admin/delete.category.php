<?php
// include the constant file
 include('./menu.php');
//echo "Delete Page";
// check whether the id and image_name is set or not
if(isset($_GET['id']) && isset($_GET['image_name']))
{
  // get the value and delete
 //echo"Get Value and Delete";
 $id = $_GET['id'];
 $image_name = $_GET['image_name'];


 //remove the physical image if available
 if($image_name != "")
 {
   //image is available
   $path = "../category/".$image_name;
   //remove the image
   $remove = unlink($path);

   //if failed to remove image then add an error message and stop the process
   if($remove==false)
   {
      //set the SESSION message
      $_SESSION['remove'] = "<div class='error'>failed to remove image.</div>";
      //redirect to raph category page with message
      header('Location:'.SITEURL. './raph.category.php');
      //stop the process
      die();

   }
 }


  //delete data from database
  //sql query to delete data from database
   $sql = "DELETE FROM tbl_category WHERE id=$id";


   //execute the query
   $res = mysqli_query($conn, $sql);

   //check whether data is deleted from database or not
   if($res==true)
   {
  
    echo"Category Item Deleted";
   }
   else
   {
    echo"Not able to delete"; 
     
   }



}
else
{
    // redirect to raph category page
 // echo "failed to delete admin";

 header('Location:'.SITEURL. 'admin/raph.category.php');

}

 


 




?>