<?php include('partials/menu.php')  ?>


<div class="main-content">
 <div class="wrapper">
    <h1>update admin</h1>

    <br><br> 

    <?php

    $id=$_GET['id'];

    $sql="SELECT * FROM tbl_admin WHERE id=$id";
    
    $res=mysqli_query($conn, $sql);

    if($res==true)
    {
        $count = mysqli_num_rows($res);

        if($count==1)
        {
         // echo "Admin Available";
         $row=mysqli_fetch_assoc($res);

         $full_name = $row['full_name'];
         $username = $row['username'];

        }
        else
        {
            header('Location:'.SITEURL. 'admin/raph.admin.php');
        }

    }
    ?>
     

    <form action="" method="POST">

    <table class="tbl-30">
        <tr>
            <td>
              <input type="text" name="full_name" value="<?php echo $full_name; ?>" class="box" required>
            </td>
        </tr>
        <tr>
            
            <td>
                
                <input type="text" name="username" value="<?php echo $username; ?>" class="box" required>
            </td>  
        </tr>
        <tr>
            
            </td>
        </tr>
        <tr>
            <td colspan="2" >
            <input type="hidden" name="id" value="<?php echo $id; ?>"> 
            <input type="submit" name="submit" value="update Admin" class="btn-secondary">
            </td>
        </tr>

    </table>

    </form>
 </div>   

</div>

<?php 
 
 if(isset($_POST['submit']))
 {
    //echo "button clicked";

     $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    $sql = "UPDATE tbl_admin SET 
     full_name = '$full_name' ,
     username = '$username' 
     WHERE id='$id'
    ";
    
 $res = mysqli_query($conn , $sql);

 if($res==true) 
 {
  $_SESSION['update'] = "<div class='sucess'>Admin Update Sucessfully.</div>";
  header('Location:'.SITEURL. 'admin/raph.admin.php');
 }
  else
  {
   
$_SESSION['delete'] = "<div class='error'>failed to delete admin.</div>";
header('Location:'.SITEURL. 'admin/raph.admin.php');
}
  }
 

?>


<?php include('partials/footer.php'); ?>