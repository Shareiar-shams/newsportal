
<?php

include('config.php');

$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  //Below you can find Get profile data and store into $_SESSION variable
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a href="'.$google_client->createAuthUrl().'"> <button class="btn btn-info">Login with Google</button> </a>';
}

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Online Newsportal</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

  <?php include 'include/head.php';?>
  
 </head>
 <body>
  <div class="container">
   <br />
   <br />
   <div class="panel panel-default">
   <?php
   if($login_button == '')
   {
    ?>
    <div id="colorlib-page">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
    <aside id="colorlib-aside" role="complementary" class="js-fullheight">
      <nav id="colorlib-main-menu" role="navigation">
        <ul>
          <li class="colorlib-active"><h3><?php echo $_SESSION['user_first_name']; ?></h3></li>
          <li><a href="logout.php">Logout</a></li>
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
  <?php
   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>
   </div>
  </div>

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
