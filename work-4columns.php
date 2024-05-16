<?php 
  include 'admin/db.php';

		$recent_select = "select * from `post` ";
		$recent_res = mysqli_query($con,$recent_select);

		$cat = "select * from `category`";
		$cat_res = mysqli_query($con,$cat);
?>

<!DOCTYPE html>
<!--[if IE 9]>
<html class="ie ie9" lang="en-US">
<![endif]-->
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

	<title>YOM- Multipurpose HTML Theme</title>


	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>

	

	<link rel="stylesheet" href="files/css/bootstrap.css">
	<link rel="stylesheet" href="files/css/animate.css">
	<link rel="stylesheet" href="files/css/simple-line-icons.css">
	<link rel="stylesheet" href="files/css/font-awesome.min.css">
	<link rel="stylesheet" href="files/css/style.css">

	<link rel="stylesheet" href="files/rs-plugin/css/settings.css">

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

</head>
<body>

	
	<div class="sidebar-menu-container" id="sidebar-menu-container">

		<div class="sidebar-menu-push">

			<div class="sidebar-menu-overlay"></div>

			<div class="sidebar-menu-inner">

				
<header class="site-header">
					<div id="main-header" class="main-header header-sticky">
						<div class="inner-header clearfix">
							<div class="logo">
								<a href="index.php">YOM</a>
							</div>
							<div class="header-right-toggle pull-right hidden-md hidden-lg">
								<a href="javascript:void(0)" class="side-menu-button"><i class="fa fa-bars"></i></a>
							</div>
							<nav class="main-navigation pull-right hidden-xs hidden-sm">
								<ul>
									<li><a href="index.php">Home</a></li>
									<li><a href="#" class="has-submenu">Pages</a>
										<ul class="sub-menu">
											<li><a href="services.php">Services</a></li>
											<li><a href="clients.php">Clients</a></li>
										</ul>
									</li>
									<li><a href="#" class="has-submenu">Blog</a>
										<ul class="sub-menu">
											<li><a href="blog.php">Blog Classic</a></li>
											<li><a href="blog.php">Blog Grid</a></li>
											<li><a href="single_post.php">Single Post</a></li>
										</ul>
									</li>
									<li><a href="about.php">About</a></li>
									<li><a href="#" class="has-submenu">Work</a>
										<ul class="sub-menu">
											<li><a href="portfolio.php">Three Columns</a></li>
											<li><a href="work-4columns.php">Four Columns</a></li>
											<li><a href="single_post.php">Single Project</a></li>
										</ul>
									</li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</header>
				<section class="page-heading wow fadeIn" data-wow-duration="1.5s" style="background-image: url(files/images/01-heading.jpg)">
					<div class="container">
						<div class="page-name">
							<h1>Latest Photos</h1>
							<span>Lovely layout of heading</span>
						</div>
					</div>
				</section>
<!-- 
				<section class="portfolio on-portfolio">
					<div class="container">
						<div class="col-sm-12 text-center">
							<div id="projects-filter">
								<a href="#" data-filter="*" class="active">Show All</a>
								<a href="#" data-filter=".furniture">Furniture</a>
								<a href="#" data-filter=".wallpaper">Wallpaper</a>
								<a href="#" data-filter=".nature">Nature</a>
								<a href="#" data-filter=".branding">Branding</a>
							</div>
						</div>
						<div class="row">
							<div class="row" id="portfolio-grid">
								<div class="item col-md-3 col-sm-6 col-xs-12 furniture">
							  		<figure>
			        					<img alt="1-image" src="files/images/01-portfolio.jpg">
			        					<figcaption>
			            					<h3>Plaid Authentic</h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							    <div class="item col-md-3 col-sm-6 col-xs-12 wallpaper">
							  		<figure>
			        					<img alt="2-image" src="files/images/02-portfolio.jpg">
			        					<figcaption>
			            					<h3>Portland Neutral</h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							    <div class="item col-md-3 col-sm-6 col-xs-12 furniture">
							  		<figure>
			        					<img alt="3-image" src="files/images/03-portfolio.jpg">
			        					<figcaption>
			            					<h3>Synth Thundercats</h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							    <div class="item col-md-3 col-sm-6 col-xs-12 wallpaper">
							  		<figure>
			        					<img alt="4-image" src="files/images/04-portfolio.jpg">
			        					<figcaption>
			            					<h3>Bushwick Letterpress</h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							    <div class="item col-md-3 col-sm-6 col-xs-12 furniture">
							  		<figure>
			        					<img alt="5-image" src="files/images/05-portfolio.jpg">
			        					<figcaption>
			            					<h3>Fashion Heirloom</h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							    <div class="item col-md-3 col-sm-6 col-xs-12 nature">
							  		<figure>
			        					<img alt="6-image" src="files/images/06-portfolio.jpg">
			        					<figcaption>
			            					<h3>Locavore Brooklyn</h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							    <div class="item col-md-3 col-sm-6 col-xs-12 branding">
							  		<figure>
			        					<img alt="7-image" src="files/images/07-portfolio.jpg">
			        					<figcaption>
			            					<h3>Meggings Mixtape</h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							    <div class="item col-md-3 col-sm-6 col-xs-12 branding">
							  		<figure>
			        					<img alt="8-image" src="files/images/08-portfolio.jpg">
			        					<figcaption>
			            					<h3>Normcore Dreamcatcher</h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							    <div class="item col-md-3 col-sm-6 col-xs-12 nature">
							  		<figure>
			        					<img alt="9-image" src="files/images/09-portfolio.jpg">
			        					<figcaption>
			            					<h3>Street Fanny</h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							    <div class="item col-md-3 col-sm-6 col-xs-12 wallpaper furniture">
							  		<figure>
			        					<img alt="10-image" src="files/images/10-portfolio.jpg">
			        					<figcaption>
			            					<h3>Crucifix Ethical</h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							    <div class="item col-md-3 col-sm-6 col-xs-12 branding nature">
							  		<figure>
			        					<img alt="11-image" src="files/images/11-portfolio.jpg">
			        					<figcaption>
			            					<h3>Park Bicycle</h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							    <div class="item col-md-3 col-sm-6 col-xs-12 nature wallpaper">
							  		<figure>
			        					<img alt="12-image" src="files/images/12-portfolio.jpg">
			        					<figcaption>
			            					<h3>Readymade Eatsy </h3>
			            					<p>Lorem ipsum dolor sit amet consete.</p>
			        					</figcaption>
			    					</figure>
							    </div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="portfolio-page-nav text-center">
								<ul>
									<li><a href="#" class="current">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</section> -->
							<section class="portfolio on-portfolio">
					<div class="container">
						<div class="col-sm-12 text-center">
							<div id="projects-filter">
								<a href="#" data-filter="*" class="active">Show All</a>

								<?php 
									while($catdata = mysqli_fetch_assoc($cat_res))
									{
								 ?>

								<a href="#" data-filter=".<?php echo $catdata['category']; ?>"><?php echo $catdata['category']; ?></a>
								<?php } ?>
							</div>
						</div>
						<div class="row">
							<div class="row" id="portfolio-grid">
<?php 
							while($recent = mysqli_fetch_assoc($recent_res)) 
							{

?>
								<div class="item col-md-3 col-sm-6 col-xs-12 <?php echo @$recent['category'] ?>">
							  	<figure>
			        			<img style="width: 350px; height:250px;" alt="1-image" src="./image/latest_posts/<?php echo @$recent['image']; ?>">
			        			<figcaption>
			            		<h3><?php echo @$recent['titel']; ?></h3>
			            		<p><?php echo @$recent['description']; ?></p>
			        			</figcaption>
			    				</figure>	
							  </div >
<?php 
							}
?>	
							</div>
						</div>
						
					</div>
				</section>

				<footer class="footer">
      <div class="three spacing"></div>
	  <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h1>
            <a href="index.html">
             YOM
            </a>
          </h1>
          <p>©2015 Yom. All rights reserved.</p>
          <div class="spacing"></div>
          <ul class="socials">
            <li>
              <a href="http://facebook.com">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li>
              <a href="http://twitter.com">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li>
              <a href="http://dribbble.com">
                <i class="fa fa-dribbble"></i>
              </a>
            </li>
            <li>
              <a href="http://tumblr.com">
                <i class="fa fa-tumblr"></i>
              </a>
            </li>
          </ul>
          <div class="spacing"></div>
        </div>
        <div class="col-md-3">
          <div class="spacing"></div>
          <div class="links">
            <h4>Some pages</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">View some works here</a></li>
              <li><a href="#">Follow our blog</a></li>
              <li><a href="#">Contact us</a></li>
              <li><a href="#">Our services</a></li>
            </ul>
          </div>
          <div class="spacing"></div>
        </div>
        <div class="col-md-3">
          <div class="spacing"></div>
          <div class="links">
            <h4>Recent posts</h4>
            <ul>
              <li><a href="#">Hello World!</a></li>
              <li><a href="#">This is the post title here</a></li>
              <li><a href="#">Our happy day</a></li>
              <li><a href="#">The first works done</a></li>
              <li><a href="#">The cats and dogs</a></li>
            </ul>
          </div>
          <div class="spacing"></div>
        </div>
        <div class="col-md-3">
          <div class="spacing"></div>
          <h4>Email updats</h4>
          <p>We want to share our latest trends, news and insights with you.</p>
          <form>
            <input class="email-address" placeholder="Your email address" type="text">
            <input class="button boxed small" type="submit">
          </form>
          <div class="spacing"></div>
        </div>
      </div>
	  </div>
      <div class="two spacing"></div>
    </footer>

				<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>

			</div>

		</div>

		<nav class="sidebar-menu slide-from-left">
			<div class="nano">
				<div class="content">
					<nav class="responsive-menu">
						<ul>
							<li><a href="index-2.html">Home</a></li>
							<li class="menu-item-has-children"><a href="#">Pages</a>
								<ul class="sub-menu">
									<li><a href="services.html">Services</a></li>
									<li><a href="clients.html">Clients</a></li>
								</ul>
							</li>
							<li class="menu-item-has-children"><a href="#">Blog</a>
								<ul class="sub-menu">
									<li><a href="blog.html">Blog Classic</a></li>
									<li><a href="blog-grid.html">Blog Grid</a></li>
									<li><a href="blog-single.html">Single Post</a></li>
								</ul>
							</li>
							<li><a href="about.html">About</a></li>
							<li class="menu-item-has-children"><a href="#">Works</a>
								<ul class="sub-menu">
									<li><a href="work-3columns.html">Three Columns</a></li>
									<li><a href="work-4columns.html">Four Columns</a></li>
									<li><a href="single-project.html">Single Project</a></li>
								</ul>
							</li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</nav>

	</div>


	

	<script type="text/javascript" src="files/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="files/js/bootstrap.min.js"></script>
	<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script src="files/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script src="files/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

	<script type="text/javascript" src="files/js/plugins.js"></script>
	<script type="text/javascript" src="files/js/custom.js"></script>

</body>
</html>