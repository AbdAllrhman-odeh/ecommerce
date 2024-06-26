<?php
	require_once('../configration/config.php');
    include('../links.php');
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <title>
        Be With Us!
    </title>
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><img src="../public/img/logo.png" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login/Register</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login/Register</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="../public/img/login.jpg" alt="">
						<div class="hover">
							<h4>Alredy have an acount?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="login.php">Login to your acount</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
                        <?php
                        if(isset($_GET['result']))
                        {
                            $result = json_decode($_GET['result'], true);
                            if (isset($result['msgEmpty']))
                            {
                                ?>
                                <div class="alert alert-warning" role="alert">
                                    <?php echo $result['msgEmpty']; ?>
                                </div>
                                <?php
                            }
                            else if(isset($result['msgExistsEmail']))
                            {
                                ?>
                                <div class="alert alert-warning" role="alert">
                                    <?php echo $result['msgExistsEmail']; ?>
                                </div>
                                <?php
                            }
                        }                               
                        ?>
						<h3>Give us your info</h3>
						<form class="row login_form" action="functions/registrationFunction.php" method="POST" id="contactForm" novalidate="novalidate">
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control"  name="name" placeholder="Your Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Name Please!'">
							</div>
                            <!-- error msg for name -->
                            <?php
                                if(isset($_GET['result']))
                                {
                                    $result = json_decode($_GET['result'], true);
                                    if (isset($result['msgLengthName']))
                                    {
                                        ?>
                                        <div class="alert alert-warning" role="alert">
                                            <?php echo $result['msgLengthName']; ?>
                                        </div>
                                        <?php
                                    }
                                }                               
                            ?>
                            <div class="col-md-12 form-group">
								<input type="email" class="form-control"  name="email" placeholder="Your Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Please!'">
							</div>
                             <!-- error msg for Email -->
                             <?php
                                if(isset($_GET['result']))
                                {
                                    $result = json_decode($_GET['result'], true);
                                    if (isset($result['msgLengthEmail']))
                                    {
                                        ?>
                                        <div class="alert alert-warning" role="alert">
                                            <?php echo $result['msgLengthEmail']; ?>
                                        </div>
                                        <?php
                                    }
                                    else if(isset($result['msgInvalidEmail']))
                                    {
                                        ?>
                                        <div class="alert alert-warning" role="alert">
                                            <?php echo $result['msgInvalidEmail']; ?>
                                        </div>
                                        <?php
                                    }
                                }                               
                            ?>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control"  name="password" placeholder="Your Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Password Please!'">
							</div>
                             <!-- error msg for Password -->
                             <?php
                                if(isset($_GET['result']))
                                {
                                    $result = json_decode($_GET['result'], true);
                                    if (isset($result['msgLengthPassword']))
                                    {
                                        ?>
                                        <div class="alert alert-warning" role="alert">
                                            <?php echo $result['msgLengthPassword']; ?>
                                        </div>
                                        <?php
                                    }
                                }                               
                            ?>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Sign Up</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
							magna aliqua.
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Newsletter</h6>
						<p>Stay update with our latest</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
									 required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>

									<!-- <div class="col-lg-4 col-md-4">
													<button class="bb-btn btn"><span class="lnr lnr-arrow-right"></span></button>
												</div>  -->
								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Instragram Feed</h6>
						<ul class="instafeed d-flex flex-wrap">
							<li><img src="../public/img/i1.jpg" alt=""></li>
							<li><img src="../public/img/i2.jpg" alt=""></li>
							<li><img src="../public/img/i3.jpg" alt=""></li>
							<li><img src="../public/img/i4.jpg" alt=""></li>
							<li><img src="../public/img/i5.jpg" alt=""></li>
							<li><img src="../public/img/i6.jpg" alt=""></li>
							<li><img src="../public/img/i7.jpg" alt=""></li>
							<li><img src="../public/img/i8.jpg" alt=""></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->



</body>

</html>