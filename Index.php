<?php include('./admin/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="./admin/favicon_io/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="./admin/favicon_io/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="./admin/favicon_io/favicon.ico">
		<link rel="manifest" href="./admin/favicon_io/site.webmanifest">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">



</head>
<body>
    
<!-- header section starts      -->

<header>

    <a href="<?php echo SITEURL; ?>" class="logo"><i class="fas fa-utensils"></i>restro.</a>

    <nav class="navbar">
   
        <a href="./foods.php">Foods</a>
        <a href="./categories.php">Categories</a>
        <a href="./order.php">order</a>
    </nav>

    <div class="icons">
        <i class="fas fa-bars" id="menu-bars"></i>
        <i class="fas fa-search" id="search-icon"></i>
        <a href="#" class="fas fa-heart"></a>
        <a href="#" class="fas fa-shopping-cart"></a>
    </div>

</header>

<!-- header section ends-->

<!-- search form  -->

<form action="./food-search.php" method="POST" id="search-form">
    <input type="search" placeholder="search here..." name="search" id="search-box">
    <input type="submit" name="submit">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>

<!-- home section starts  -->

<div class="home" id="home">
		<div class="swiper home-slider">
			<div class="swiper-wrapper wrapper-box">
				<div class="swiper-slide slide slide1">
					<div class="content-box">
						<img src="./images/crown-symbol.png">
						<h3>Welcome To</h3>
						<h1>The Restro</h1>
						<p>
							Choosing Quality Food
						</p>
						<a href="#" class="btn">Visit Us now</a>
					</div>
				</div>

				<div class="swiper-slide slide slide2">
					<div class="content-box">
						<img src="./images/crown-symbol.png">

						<h3>Newest Restaurant</h3>
						<h1>perfect meals</h1>
						<p>
							Best Dinning Quality
						</p>
						<a href="#reservation" class="btn">Book Now</a>
					</div>
				</div>

				<div class="swiper-slide slide slide3">
					<div class="content-box">
						<img src="./images/crown-symbol.png">

						<h3>sale of dishes 10% off</h3>
						<h1>Special Menus</h1>
						<p>
							you will love it
						</p>
						<a href="#menu-box" class="btn">View Menu</a>
					</div>
				</div>
			</div>

			<div class="swiper-pagination"></div>
		</div>
	</div>	

  <section class="categories">
    <h1 class="heading">our Popular items  </h1>
    <div class="container">
             <?php
    
             $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 4";
                //execute the query
                $res = mysqli_query($conn, $sql);

                //count rows
                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        ?>
                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                          
                               <?php 
                                
                                  //check whether image name is available or not
                                  if($image_name=="")
                                  {
                                    echo "<div class='error'>Image Not Available.</div>";
                                  }
                                  else
                                  {
                                    ?>
                                    
                                       <img src="./category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">  
                                    
                                    <?php
                                  }
                               
                               
                               
                               ?>
                             

                             <h3 class="float-text text-white"><?php echo $title; ?></h3>
                       
                       </a>
                        <?php
                    }
                }
                else
                {
                    echo " '<div class='error'>Category not added.</div>'";
                }
     

            ?>


</div>
</section>

<!-- about section starts  -->

<section class="about" id="about">

    <h3 class="sub-heading"> about us </h3>
    <h1 class="heading"> why choose us? </h1>

    <div class="row">

        <div class="image">
            <img src="./images/Restaurant-PNG.png" alt="">
        </div>

        <div class="content-a">
            <h3>best food in the country</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, sequi corrupti corporis quaerat voluptatem ipsam neque labore modi autem, saepe numquam quod reprehenderit rem? Tempora aut soluta odio corporis nihil!</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam, nemo. Sit porro illo eos cumque deleniti iste alias, eum natus.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>free delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>easy payments</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 service</span>
                </div>
            </div>
            <a href="#" class="btn">learn more</a>
        </div>

    </div>

</section>

<!-- about section ends -->

<section class="menu" id="menu">

    <h3 class="sub-heading"> our menu </h3>
    <h1 class="heading"> today's speciality </h1>

    <div class="box-container">
        <?php 
        
        $sql = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 4";

        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);

        if($count)
        {
            while($row=mysqli_fetch_assoc($res))
            {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>
            <div class="box">
            <div class="image">
                <img src="./food/<?php echo $image_name; ?>" alt="">
                <a href="#" class="fas fa-heart"></a>
                
            </div>
            <div class="content-b">
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3><?php  echo $title; ?></h3>
                <p><?php echo $description; ?></p>
                <span class="price">$<?php echo $price; ?></span>
                <a href="./order.php?food_id=<?php echo $id; ?>" class="btn">Order Now</a>
            </div>
            </div>
      
            
                <?php
            }
            

        }
        else{
            echo "<div class='error'>Food Not Available.</div>";
        }
        
        
        ?>

       
           
        
        
    </div>
    

</section>




	<!--TEAM SECTION-->
  <section class="team" id="team">
			<h4 class="heading-h">our talented chef</h4>
			<p id="para">
				~ Experience $ Enthusiasm ~
			</p>
			<div id="container-t">
				<div class="single-team">
					<img src="./images/team-1.jpg" class="img" />
					<div class="team-text">
						<h3>adam phillips</h3>
						<p>CEO, co founder</p>
						<p>
							<a href=""><i class="fab fa-twitter"></i></a>
							<a href=""><i class="fab fa-facebook"></i></a>
							<a href=""><i class="fab fa-instagram"></i></a>
						</p>
					</div>
				</div>
				<div class="single-team">
					<img src="./images/team-2.jpg" class="img" />
					<div class="team-text">
						<h3>dylan peter's</h3>
						<p>Master Chef</p>
						<p>
							<a href=""><i class="fab fa-twitter"></i></a>
							<a href=""><i class="fab fa-facebook"></i></a>
							<a href=""><i class="fab fa-instagram"></i></a>
						</p>
					</div>
				</div>
				<div class="single-team">
					<img src="./images/team-3.jpg" class="img" />
					<div class="team-text">
						<h3>john doe</h3>
						<p>Waiter</p>
						<p>
							<a href=""><i class="fab fa-twitter"></i></a>
							<a href=""><i class="fab fa-facebook"></i></a>
							<a href=""><i class="fab fa-instagram"></i></a>
						</p>
					</div>
				</div>
				<div class="single-team">
					<img src="./images/team-4.jpg" class="img" />
					<div class="team-text">
						<h3>josh dunn</h3>
						<p>Chef</p>
						<p>
							<a href=""><i class="fab fa-twitter"></i></a>
							<a href=""><i class="fab fa-facebook"></i></a>
							<a href=""><i class="fab fa-instagram"></i></a>
						</p>
					</div>
				</div>
			</div>
		</section>
		<div class="reservation" id="reservation">
			<div class="image">
				
			</div>

			<div class="form">
				<h1 class="heading-t">book a table</h1>
				<center><h3 class="sub-heading-h">~ check out our place ~ </h3></center>

				<form>
					<div class="form-holder">
						<div>
							<select>
								<option>1 people</option>
								<option>2 people</option>
								<option>3 people</option>
								<option>4 people</option>
							</select>
							<input type="text" name="" placeholder="Name" required>
							<input type="text" name="" placeholder="Phone" required>

							<select name = "days">
													<option value = "day-select">Select Day</option>
													<option value = "sunday">Sunday</option>
													<option value = "monday">Monday</option>
													<option value = "tuesday">Tuesday</option>
													<option value = "wednesday">Wednesday</option>
													<option value = "thursday">Thursday</option>
													<option value = "friday">Friday</option>
													<option value = "saturday">Saturday</option>
											</select>
						</div>

						<div>
							<input type="text" name="" placeholder="Date" required>
							<input type="text" name="" placeholder="Time" required>
							<input type="email" name="" placeholder="email" required>

							<select name="preferred_food" id="preferred_food" class="selectpicker">
								<option selected disabled>preferred food</option>
								<option>Indian</option>
								<option>Continental</option>
								<option>Mexican</option>
								<option>American</option>
						</select>
						</div>
					</div>
					<center><a href="#" class="btn">Book now</a></center>
				</form>
			</div>
		</div>
	<!-- reservation section ends -->

<div class = "wrapper" id="testimonials">
			<div class = "testimonials">
							<div class = "title">
											<h2>Our <span>Testimonials</span></h2>
											<h3>Our Clients</h3>
							</div>
							<div class = "content">
											<div class = "clients-list">
															<div class = "clients-tabs">
				<!-- item -->
				<div class = "client-item">
					<div class = "client-thumbnail">
									<img src = "./images/client-1.jpg" alt = "">
					</div>
					<div class = "client-intro">
						<h5 class = "client-name">Erick Jones</h5>
						<small class = "client-designation">Managing Director, USA</small>
						<p class = "client-description">“Visited  the Restro with friends last Sunday. Really lovely meal and very warm welcome we would
							recommend this lovely restaurant and will try to go back again”</p>
		</div>				
	</div>
	<!-- end of item  -->															

<!-- item -->
<div class = "client-item">
	<div class = "client-thumbnail">
					<img src = "./images/client-2.jpg" alt = "">
	</div>
	<div class = "client-intro">
					<h5 class = "client-name">Ben Smith</h5>
					<small class = "client-designation">Developer, USA</small>
					<p class = "client-description">"from start to finish, lovely experience. Hostess very pleasant, Waiter john was wonderful and
						attentive, food plentiful and delicious, desserts out of this world"</p>
	</div>
</div>																			
	<!-- end of item  -->

<!-- item -->
<div class = "client-item">
	<div class = "client-thumbnail">
					<img src = "./images/client-3.jpg" alt = "">
	</div>
	<div class = "client-intro">
					<h5 class = "client-name">Ellen Harper</h5>
					<small class = "client-designation">Content Writer, USA</small>
					<p class = "client-description">“A warm and friendly welcome with fantastic customer service. Always great, tasty food served piping
						hot- just the way we love it . Would definitely recommend. We have been repeatedly and it's consistently
						exceeded our expectations"</p>
	</div>
</div>
<!-- end of item  -->																			
	<!-- item -->
	<div class = "client-item">
		<div class = "client-thumbnail">
						<img src = "./images/client-4.jpg" alt = "">
		</div>
		<div class = "client-intro">
						<h5 class = "client-name">Jonathan Doe</h5>
						<small class = "client-designation">Designer, USA</small>
						<p class = "client-description">“I would just like to say thank you for the excellent service i received in your restaurant last night.
							i had an excellent time and really appreciated the live
							entertainment too!“</p>
		</div>
</div>
<!-- end of item  -->
	<!-- item -->
	<div class = "client-item">
		<div class = "client-thumbnail">
						<img src = "./images/client-5.jpg" alt = "">
		</div>
		<div class = "client-intro">
			<h5 class = "client-name">Emiley McArthur</h5>
			<small class = "client-designation">Business Owner, USA</small>
			<p class = "client-description">“My meals was delivered on time and at and affortable rate, excellent place to get your meals, Absolutely spot on Excellent service Highly recommended.“</p>
</div>		
</div>
<!-- end of item  -->
</div>
</div>																								

<div class = "show-info">
	<div class = "show-img">
					<img src = "./images/client-1.jpg" alt = "client image">
	</div>

	<div class = "show-text">
					<div>
									<h4 class = "show-name">Erick Jones</h4>
									<small class = "show-designation">Managing Director</small>
					</div>
					<p class = "show-description"><!--Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt assumenda nostrum dignissimos et repellat illum omnis repudiandae atque, ducimus quo, est delectus tempore facilis odit ullam magnam accusantium cumque ipsa!--></p>
					<a href = "#">Make Review</a>
	</div>
</div>
</div>
</div>
</div>


<section class="footer">
	<img src="./images/footer-logo.png" class="logo">

	<div class="container">
		<div>
			<h3>ABOUT US</h3>
			<p>We are a multi-cuisine restaurant offering a wide variety of food experience in both casual and fine dining environment.</p>
		</div>

		<div>
			<h3>GET NEWS & OFFERS</h3>
			<input type="email" name="" placeholder="enter your email">
			<ul>
				<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
				<li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
				<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
			</ul>
		</div>
    

		<div>
			<h3>CONTACT US</h3>
			<span>Los Angeles, California USA</span>
			<span>+(91) 176 543 2100</span>
			<span>Abc@gmail.com</span>
		</div>
	</div>

	<p class="para">Copyright &copy; <span id="parag">Restro</span> 2022</p>
</section>


<a href="#" class="scrollup" style="display: none;">Scroll</a>

<!-- loader part -->
<div class="loader-container">
    <img src="images/loader.gif" alt="">
</div>
 





<script>
  
  
const clientTabItems = document.querySelectorAll('.client-item');
const showDiv = document.querySelector('.show-info');

clientTabItems.forEach((item) => {
				item.addEventListener('click', () => {
								showInfo(item);
				});
});

function showInfo(item){
				showDiv.querySelector('.show-img img').src = item.querySelector('.client-thumbnail img').src;
				showDiv.querySelector('.show-name').innerHTML = item.querySelector('.client-name').innerHTML;
				showDiv.querySelector('.show-designation').innerHTML = item.querySelector('.client-designation').innerHTML;
				showDiv.querySelector('.show-description').innerHTML = item.querySelector('.client-description').innerHTML;
				setActiveTab(item);
}

function setActiveTab(item){
				clientTabItems.forEach((item) => {
								item.classList.remove('active'); // resetting active tab
				});
				item.classList.add('active');
}

showInfo(clientTabItems[0]); // default active tab





</script>














<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://kit.fontawesome.com/33ea5aa112.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>