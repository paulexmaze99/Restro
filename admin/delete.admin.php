<?php 
include('../config/constants.php');

 $id = $_GET['id'];

 $sql = "DELETE FROM tbl_admin WHERE id=$id ";

 $res = mysqli_query($conn , $sql);

 if($res==true)
{
  // echo "admin deleted";
  $_SESSION['delete'] = "<div class='sucess'>Admin deleted sucessfully.</div>";
  header('Location:'.SITEURL. 'admin/raph.admin.php');
}
else
{
// echo "failed to delete admin";

$_SESSION['delete'] = "<div class='error'failed to delete admin try again.</div>";
header('Location:'.SITEURL. 'admin/raph.admin.php');
}



  


?>