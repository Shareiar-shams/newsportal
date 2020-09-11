<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include 'include/head.php';?>
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li class="colorlib-active"><a href="index.php">Home</a></li>
					<li><a href="login.php">Login</a></li>
				</ul>
			</nav>

			<div class="colorlib-footer">
				
				<p class="pfooter">
				  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="#" target="_blank">Shareiar</a>
				</p>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
		    	<div class="container">
		    		<div class="row d-flex">
		    			<div class="col-xl-8 py-5 px-md-5">
		    				<div class="row pt-md-4">
		    					<?php
								$portals = json_decode(file_get_contents('demo.json'));
								foreach($portals as $news)
								{
								?>
					    			<div class="col-md-12">
										<div class="blog-entry ftco-animate d-md-flex">
											<a href="#" class="img img-2"></a>
											<div class="text text-2 pl-md-4">
						              			<h3 class="mb-2"><a href="#"><?php
						              			echo ucfirst($news->webTitle); ?></a></h3>
						              			<div class="meta-wrap">
													<p class="meta">
									              		<span><i class="icon-calendar mr-2"></i><?php
						              					echo $news->webPublicationDate; ?></span>
									              		<span><a href="single.html"><i class="icon-folder-o mr-2"><?php
						              					echo $news->sectionName; ?></i></a></span>
						              					<span><p>PillarName : <?php
						              					echo $news->pillarName; ?></p></span>
									              		
						              				</p>
					              				</div>
						              			<p class="mb-4"> <?php echo htmlspecialchars($news->webUrl); ?>
						              			</p>
						              			<p>Click this link for more information </p>
						            		</div>
										</div>
									</div>
									<?php  
					            	}
			            		?>									
				    		</div><!-- END-->
				        	<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
				        		<div class="sidebar-box ftco-animate">
					            	<h3 class="sidebar-heading">Categories</h3>
					            	<?php
					            	$portals = json_decode(file_get_contents('demo.json'));
									foreach($portals as $blogs)
									{
									?>
							            <ul class="categories">
							                <li><a href="#<?php echo $blogs->sectionId ;?>"><?php echo $blogs->sectionName; ?> <span>(<?php echo str_word_count($blogs->sectionName); ?>)</span></a></li>
							                
							            </ul>

							            <?php
							        }
						            ?>
					            </div>

				        	</div>
				    	</div>
		    		</div>
		    	</div>
	    	</section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  
    
  </body>
</html>