
<?php include('./menu.php') ?>

<div class="main-content">
    <div class="wrapper">
      <h1>Manage Order</h1>
      
      <br><br>
           
            <a href="#" class="btn-primary">Add order</a>

            <br/><br/><br/>

            <?php
            
            if(isset($_SESSION['update']))
            {
              echo $_SESSION['update'];
              unset($_SESSION['update']);
            }
            
            
            ?>
              
            <br/><br/><br/>

            <table class="tbl-full">
               <tr>
                    <th>S.N.</th>
                   <th>food</th> 
                   <th>price</th>
                   <th>qty.</th> 
                  <th>total</th>
                  <th>date</th>
                  <th>status</th>  
                  <th>customer</th>
                   <th>contact</th> 
                   <th>email</th> 
                   <th>address</th> 
                   <th>action</th>   

               </tr>
               <?php 
                $sql = "SELECT * FROM tbl_order  ORDER BY id DESC ";

                $res = mysqli_query($conn, $sql);

                  //count rows
                  $count = mysqli_num_rows($res);

                  //create serial number variable and assign the value as 1
                  $sn=1;
                   //check whether we have data in database or not
                if($count>0)
                {
                  while($row=mysqli_fetch_assoc($res))
                  {
                    $id = $row['id'];
                    $food = $row['food'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total = $row['total'];
                    $order_date = $row['order_date'];
                    $status = $row['status'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];

                    ?>
                  
                  <tr>
                   <td><?php echo $sn++; ?></td>
                   <br>
                   <td><?php echo $food; ?></td>
                   <td><?php echo $price; ?></td>
                   <td><?php echo $qty; ?></td>
                   <td><?php echo $total; ?></td>
                   <td><?php echo $order_date; ?></td>

                   <td>
                   <?php
                      if($status=="Ordered")
                      {
                       echo "<label>$status</label>";
                      }
                      elseif($status=="on Delivery")
                      {
                        echo "<label style='color: orange;'>$status</label>";
                      }
                      elseif($status=="Delivered")
                      {
                        echo "<label style='color: green;'>$status</label>";
                      }
                      elseif($status=="Cancelled")
                      {
                        echo "<label style='color: red;'>$status</label>";
                      }
                   
                   
                   
                   ?>
                   </td>

                   <td><?php echo $customer_name; ?></td>
                   <td><?php echo $customer_contact; ?></td>
                   <td><?php echo $customer_email; ?></td>
                   <td><?php echo $customer_address; ?></td>
                   <td>
                   <a href="./update-order.php?id=<?php echo $id; ?>"  class="btn-secondary">Update</a>

                   </td>
                   

               </tr>
  
             
              
                     
                       
                  <?php


                  }
                
                }
                else
                {
                  echo "<tr><td colspan='12'>Orders not available.</td></tr>";
                }
               
               
               ?>
              
             

            </table>
    </div>
   
</div>

